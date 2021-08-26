<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Auth_layout');
	}

	public function index($flag = null)
	{

		$redirect = $this->check_users_group();
		if($redirect != FALSE){
			redirect($redirect);
		}
		$data['message'] = "";
		if($flag == 'logout'){
			$data['message'] = array(
				'message' => 'Kamu Berhasil Logout',
				'title' => 'Info',
				'status' => 'success',
				'autohide' => 'true',
				'delay' => '5000'
			);
		}
		
		// if not, load login form
		$data['title'] = APP_NAME ;
		$data['menu'] = "Login" ;
		$data['action'] = base_url('auth/login_process');
		
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_login', $data);
	}

	// process user's submission from login form
	public function login_process()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		// set rules for form validation
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		// check whether validation ends up with no error
		if($this->form_validation->run() === TRUE)
		{

			// get input from user
			$input = $this->input->post(null, true);

			$username = $input['username'];
			$password = $input['password'];

			// check apakah akun aktif?
			$check = $this->crud->get_where('users', '*', array('username' => $username, 'verified !=' => '1'))->num_rows();
			if($check > 0){
				$response = array(
					'status' => 0,
					'message' => 'Akun belum aktif. Silahkan cek inbox atau spam pada email Kamu untuk memulai aktivasi',
					'csrf' => $csrf,
					'return_url' => '#'
				);
				echo json_encode($response);
				die();
			}
			
			// check login
			$login = $this->check_login($username, $password);

			if($login)
			{
				//check rule from table
				$redirect = $this->check_users_group();

				$response = array(
					'status' => 1,
					'message' => 'Authentication Success',
					'csrf' => $csrf,
					'return_url' => site_url($redirect)
				);

			} else {
				$response = array(
					'status' => 0,
					'message' => 'Username atau Password salah!',
					'csrf' => $csrf,
					'return_url' => '#'
				);
			}
		} else {

			//set response status with failed code (0)
			$response = array(
				'status' => 0,
				'csrf' => $csrf,
				'message' => strip_tags(validation_errors()),
				'return_url' => '#'
			);

		}

		echo json_encode($response);
	}

	// method for checking login is valid or not
	public function check_login($username = null, $password = null)
	{

		// get data from database based on user input
		$data = $this->crud->get_where('users', '*', array('username' => $username, 'verified' => '1'))->row();
		
		//check username 
		if(isset($data->username))
		{
			if (password_verify($password, $data->password)) {
				$data->group = $this->crud->get_where('users_group', '*', array('id_group' => $data->id_group))->row();
				// set session
				$session = array(
					'logged_in' => true,
					'userid' => $data->userid,
					'email' => $data->email,
					'username' => $data->username,
					'verified' => $data->verified,
					'name' => $data->name,
					'pict' => 'avatar.png',
					'id_group' => $data->id_group,
					'group' => $data->group,
				);
				$this->session->set_userdata($session);
				$this->crud->update('users', ['last_login' => date('Y-m-d h:i:s'), 'ip' => @get_ip_user()], ['username' => $data->username]);

				//last_login update
				return true;
			} else {
				// login failed
				return false;
			}
		}else {
            /*
                AKUN SSO UNTUK PETUGAS ADMIN
                fitur di versi 1.2
            */
			// login failed
			return false;

		}
	}

	public function check_users_group(){
		if($this->session->userdata('id_group')) {
			if($this->session->userdata('group')->group == "superadmin") {
				return $this->session->userdata('group')->group.'/dashboard';
			}else if($this->session->userdata('group')->group == "admin") {
				return $this->session->userdata('group')->group.'/dashboard';
			}else if($this->session->userdata('group')->group == "user") {
				return 'account';
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth/index/logout'));
    }
    
    public function recovery()
	{
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$data['title'] = APP_NAME ;
		$data['menu'] = "Forgot Password" ;
		$data['action'] = base_url('auth/recovery_process');
		
		$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_forgot', $data);
	}

	public function recovery_process()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		// set rules for form validation
		$this->form_validation->set_rules('email', 'Email address', 'required');

		//csrf init
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		// check whether validation ends up with no error
		if($this->form_validation->run() === TRUE AND $this->input->post('email') != "")
		{

			// get input from user
			$input = $this->input->post(null, true);

			$email = $input['email'];

			// check email
			$check = $this->crud->get_where('users', 'username', ['email' => $email, 'id_group' => '3'])->num_rows();

			if($check)
			{
				// get IP address user
				$ip = get_ip_user();

				//send email instruction
					// $config = [
					// 	'mailtype'  => 'html',
					// 	// 'charset'   => 'utf-8',
					// 	'charset' => 'iso-8859-1',
					// 	'protocol'  => 'smtp',
					// 	'smtp_host' =>  SMTP_HOST,
					// 	'smtp_user' => SMTP_USER,  
					// 	'smtp_pass'   => SMTP_PASS,  
					// 	'smtp_crypto' => SMTP_CRYPTO,
					// 	'smtp_port'   => SMTP_PORT,
					// 	// 'crlf'    => "\r\n",
					// 	'newline' => "\r\n"
					// ];

					// // Load library email dan konfigurasinya
					// $this->load->library('email', $config);
					// $this->email->from(SMTP_USER, 'Rekrutmen Pupuk Kujang');
					// $this->email->to($email); 
					// $this->email->subject('');

					//get token
					$get_account = $this->crud->get_where('users', 'username,name', ['email' => $email])->row_array();
					$token = date('Hi').substr(md5($get_account['username'].date('Y-m-d H:i:s')), 0, -8).date('id');
					$param = [
						'name' => $get_account['name'],
						'key' => $token
					];
				//change to _mail_send services
				$insert = $this->crud->insert('_mail_send', 
                    [
                        'to' => $email,
                        'subject' => 'Permintaan Perubahan Password',
                        'text' => mail_text_forgot($param),
                        'status' => '0',
                        'date' => date('Y-m-d H:i:s'),		
                    ]
				);
				
				// $this->email->message(mail_text_forgot($param));
				if($insert) {
					//add log
					$this->crud->insert('_log_forgot_pass', ['status' => '0','token' => $token, 'ip_address' => $ip, 'username' => $get_account['username'], 'log_time' => date('Y-m-d H:i:s'), 'token_exp' => date('Y-m-d H:i:s', strtotime("+2 hours", strtotime(date('Y-m-d H:i:s'))))]);
					
					//set response status with success code (1)
					$response = array(
						'status' => 1,
						'title' => 'Validation Email Sent',
						'message' => 'The password reset process has now been started. Please check your email for instructions on what to do next.',
						'csrf' => $csrf,
						'return_url' => '#'
					);
				} else {
					$response = array(
						'status' => 0,
						'message' => 'Failed to send email. Please try again',
						'csrf' => $csrf,
						'return_url' => '#'
					);
				}
			} else {
				$response = array(
					'status' => 0,
					'message' => 'No client account was found with the email address you entered',
					'csrf' => $csrf,
					'return_url' => '#'
				);
			}
		} else {

			//set response status with failed code (0)
			$response = array(
				'status' => 0,
				'message' => strip_tags(validation_errors()),
				'csrf' => $csrf,
				'return_url' => '#'
			);

		}

		echo json_encode($response);
	}

	public function recovery_page()
	{

		$data['title'] = APP_NAME ;
		$data['menu'] = "Recovery Password Page" ;
		
		
		$token = $this->input->get('key');
		if($token == ""){
			$data['message'] = "Token invalid";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			return;
		}

		//check apakah token terdaftar
		$check = $this->crud->get_where('_log_forgot_pass', 'log_id', ['token' => $token, 'status' => '0'])->num_rows();
		if($check == 0){
			$data['message'] = "Token invalid";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			return;
		}

		$check = $this->crud->get_where('_log_forgot_pass', '*', ['token' => $token, 'status' => '0'])->row_array();
		$token_exp = $check['token_exp'];
		
		$akhir  = strtotime($token_exp);
		$awal = strtotime('now');
		$diff  = $akhir - $awal;

		$durasi   = abs(floor($diff / (60 * 60)));

		if($durasi > 2){
			$data['message'] = "Token expired ";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			return;
		}
		
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;
		$data['durasi'] = $durasi; 
		
		$data['action'] = base_url('auth/recovery_page_process?key='.$token);
		
		$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery', $data);
	}


	public function recovery_page_process()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);

		$token = $this->input->get('key');
		if($token == ""){
			$response = array(
				'status' => 0,
				'message' => 'Token invalid',
				'csrf' => $csrf,
				'return_url' => '#'
			);
			echo json_encode($response);
			die();
		}

		//check apakah token terdaftar
		$check = $this->crud->get_where('_log_forgot_pass', 'log_id', ['token' => $token, 'status' => '0'])->num_rows();
		if($check == 0){
			$response = array(
				'status' => 0,
				'message' => 'Token invalid',
				'csrf' => $csrf,
				'return_url' => '#'
			);
			echo json_encode($response);
			die();
		}

		$check = $this->crud->get_where('_log_forgot_pass', '*', ['token' => $token, 'status' => '0'])->row_array();
		$token_exp = $check['token_exp'];
		//date diff
		$akhir  = strtotime($token_exp);
		$awal = strtotime('now');
		$diff  = $akhir - $awal;

		$durasi   = abs(floor($diff / (60 * 60)));

		if($durasi > 2){
			$response = array(
				'status' => 0,
				'message' => 'Token expired',
				'csrf' => $csrf,
				'return_url' => '#'
			);
			echo json_encode($response);
			die();
		}
		
        // set rules for form validation
		$this->form_validation->set_rules('password-new', 'Enter New Password', 'required');
		$this->form_validation->set_rules('password-new-confirm', 'Re-enter New Password', 'required');

		// check whether validation ends up with no error
		if($this->form_validation->run() === TRUE)
		{

			// get input from user
			$input = $this->input->post(null, true);

			$password_new = $input['password-new'];
			$password_new_confirm = $input['password-new-confirm'];
			
			$password_new = password_hash($password_new, PASSWORD_BCRYPT);

			$update = $this->crud->update('users', ['password' => $password_new,  'updated_at' => date('Y-m-d h:i:s')], array('username' => $check['username']));
			if($update){
				$this->session->set_userdata(['default_password' => '0']);
				
				//update token
				$this->crud->update('_log_forgot_pass', ['status' => '1'], ['token' => $token]);

				//set response status with success code (1)
				$response = array(
					'status' => 1,
					'title' => 'Reset Sukses',
					'message' => 'Password baru berhasil disimpan',
					'csrf' => $csrf,
					'return_url' => site_url('auth')
				);
			}else{
				$response = array(
					'status' => 0,
					'message' => 'Perubahan Gagal!. Silahkan diulang kembali',
					'csrf' => $csrf,
					'return_url' => '#'
				);
			}
		} else {
			//set response status with failed code (0)
			$response = array(
				'status' => 0,
				'message' => strip_tags(validation_errors()),
				'csrf' => $csrf,
				'return_url' => '#'
			);
		}

		echo json_encode($response);
	}

}
