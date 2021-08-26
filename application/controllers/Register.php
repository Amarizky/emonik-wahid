<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Auth_layout');
	}

	public function index()
	{
		$data['title'] = APP_NAME ;
		$data['menu'] = "Register" ;
		$data['action'] = base_url('register/register_process');
		
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_register', $data);
	}

	// process user's submission from login form
	public function register_process()
	{
        if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		// set rules for form validation
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('name', 'Nama', 'required');
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

			$email = $input['email'];
			$name = $input['name'];
			$password = $input['password'];
            $password = password_hash($password, PASSWORD_BCRYPT);

            //check email 
            $check = $this->crud->get_where('users', 'username', ['username' => $email])->num_rows();
            if($check > 0){
                $response = array(
                    'status' => 0,
                    'title' => 'Register failed',
                    'message' => 'Alamat email sudah terdaftar. Gunakan alamat email lain.',
                    'csrf' => $csrf,
                    'return_url' => '#'
                );
		        echo json_encode($response);
                die();
            }
            
            //mengirimkan dulu email, sebelum insert data
           
            // get IP address user
            $ip = get_ip_user();

            //send email instruction
                // $config = [
                //     'mailtype'  => 'html',
                //     // 'charset'   => 'utf-8',
                //     'charset' => 'iso-8859-1',
                //     'protocol'  => 'smtp',
                //     'smtp_host' =>  SMTP_HOST,
                //     'smtp_user' => SMTP_USER,  
                //     'smtp_pass'   => SMTP_PASS,  
                //     'smtp_crypto' => SMTP_CRYPTO,
                //     'smtp_port'   => SMTP_PORT,
                //     // 'crlf'    => "\r\n",
                //     'newline' => "\r\n"
                // ];

                // Load library email dan konfigurasinya
                // $this->load->library('email', $config);
                // $this->email->from(SMTP_USER, 'Rekrutmen Pupuk Kujang');
                // $this->email->to($email); 
                // $this->email->subject('');

                //get token
                $token = date('Hi').substr(md5(date('Y-m-d H:i:s').@$email), 0, -8).date('id');
                $token_exp = date('Y-m-d H:i:s', strtotime("+12 hours", strtotime(date('Y-m-d H:i:s'))));
                $param = [
                    'token' => $token,
                    'link' => site_url('register/verify/'.$token),
                    'name' => $name,
                ];
                // $this->email->message(mail_text_verify($param));
                // if(!$this->email->send()){
                //     $response = array(
                //         'status' => 0,
                //         'title' => 'Register failed',
                //         'message' => 'Sepertinya sistem kami sedang trouble. Untuk sementara Kamu tidak dapat melakukan pendaftaran akun baru',
                //         'csrf' => $csrf,
                //         'return_url' => '#'
                //     );
                //     die();
                // }

                //change to mail_send with service
                $this->crud->insert('_mail_send', 
                    [
                        'to' => $email,
                        'subject' => 'Verifikasi Akun Baru',
                        'text' => mail_text_verify($param),
                        'status' => '0',
                        'date' => date('Y-m-d H:i:s'),		
                    ]
                );
            //end send email

            //insert data to users
            $insert = $this->crud->insert('users', [
                'id_group' => '3', //pengguna
                'name' => $name,
                'username' => $email,
                'email' => $email,
                'password' => $password,
                'token' => $token,
                'token_exp' => $token_exp,
                'verified' => '0',
                'ip' =>  get_ip_user(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            if($insert)
            {
                //insert data to peserta
                $this->crud->insert('peserta', [
                    'nama' => $name,
                    'email' => $email,
                ]);
                $response = array(
                    'status' => 1,
                    'title' => 'Register Success',
                    'message' => "Kami telah mengirimkan email untuk verifikasi ke alamat email <b>$email</b>. Silahkan cek inbox/spam pada email tersebut untuk memulai aktivasi akun Kamu.",
                    'csrf' => $csrf,
                    'return_url' => '#'
                );

            } else {
                $response = array(
                    'status' => 0,
                    'title' => 'Register failed',
                    'message' => 'Request kamu tidak dapat dilakukan. Silahkan ulang proses pendaftaran. Jika masalah masih berlanjut mohon hubungi administrator.',
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

    public function verify($token = null)
	{
        
		$data['title'] = APP_NAME ;
		$data['menu'] = "Register Verify" ;
		
        //check token
		if($token == ""){
			$data['message'] = "Token activation invalid";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			die();
		}

		//check apakah token terdaftar
		$check = $this->crud->get_where('users', 'token', ['token' => $token])->num_rows();
		if($check == 0){
			$data['message'] = "Token activation invalid";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			die();
		}

		$check = $this->crud->get_where('users', '*', ['token' => $token])->row_array();
		$token_exp = $check['token_exp'];
		
		$akhir  = strtotime($token_exp);
		$awal = strtotime('now');
		$diff  = $akhir - $awal;

		$durasi   = abs(floor($diff / (60 * 60)));

		if($durasi > 12){
			$data['message'] = "Token activation expired ";
			$this->auth_layout->load('layout/auth/v_layout','pages/auth/v_recovery_fail', $data);
			die();
        }else{
			$data['message'] = "Selamat, akun kamu berhasil di aktivasi. Silahkan login dan lengkapi data diri sebelum melakukan pendaftaran";
            $this->crud->update('users', ['verified' => '1'], ['token' => $token]);
            $this->auth_layout->load('layout/auth/v_layout','pages/auth/v_activation', $data);
        }
        


	}
}