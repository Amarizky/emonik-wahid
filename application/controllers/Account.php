<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Landing_layout');
		$this->load->library('Panel_layout');
		if(!check_session('superadmin') && !check_session('admin') && !check_session('user')){
			redirect('auth/logout');
			die();
		}
	}

	public function index()
	{
		if(check_session('user') == false){
			redirect('auth/logout');
			die();
		}
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

        $data['title'] = "Data Diri";
		$data['menu'] = "Your Account";
		$data['sub_menu'] = "" ;
        $data['sub_title'] = "";
        $data['icon'] = '';
		$data['settings'] = get_settings();
		$data['row'] = $this->crud->get_where('peserta', '*', ['email' => current_ses('username')])->row();
		$data['action'] = site_url('/account/update_process');

		$this->landing_layout->load('layout/landing/v_layout','pages/landing/user/v_index', $data);
	}

    public function change_password()
	{
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

        $data['title'] = "Change Password";
		$data['menu'] = "Your Account";
		$data['sub_menu'] = "Change Password" ;
        $data['sub_title'] = "";
        $data['icon'] = 'icon-user-tie';
		// $data['settings'] = get_settings();
		$data['action'] = site_url('/account/change_password_process');
		if(check_session('user')){
			$this->landing_layout->load('layout/landing/v_layout','pages/landing/user/v_change_password', $data);
		}else{
			$this->panel_layout->load('layout/panel/v_layout','pages/v_change_password', $data);
		}
		
	}

	public function change_password_process()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		
        // set rules for form validation
		$this->form_validation->set_rules('password-old', 'Password Old', 'required');
		$this->form_validation->set_rules('password-new', 'Enter New Password', 'required');
		$this->form_validation->set_rules('password-new-confirm', 'Re-enter New Password', 'required');

		// check whether validation ends up with no error
		if($this->form_validation->run() === TRUE)
		{

			// get input from user
			$input = $this->input->post(null, true);

			$password_old = $input['password-old'];
			$password_new = $input['password-new'];
			$password_new_confirm = $input['password-new-confirm'];

			// check login
			$check = $this->check_old_password($password_old);

			if($check)
			{
				$password_new = password_hash($password_new, PASSWORD_BCRYPT);

				$update = $this->crud->update('users', ['password' => $password_new, 'updated_at' => date('Y-m-d h:i:s') ], array('username' => current_ses('username')));
				if($update){
					//set response status with success code (1)
					$response = array(
						'status' => 1,
						'message' => 'Password baru berhasil disimpan',
						'csrf' => $csrf,
						// 'return_url' => site_url('/account/change_password')
						'return_url' => '#'
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
					'message' => 'Current Password Salah!',
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
    
    private function check_old_password($password = null)
	{
		if(isset($password))
		{
			$data = $this->crud->get_where('users', '*', array('username' => current_ses('username')))->row();
			if (password_verify($password, $data->password)) {
				return true;
			} else {
				return false;
			}
		}else {
			return false;

		}
	}
	
}