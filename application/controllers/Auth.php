<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Auth_layout');
	}

	public function index($flag = null)
	{

		$redirect = $this->check_role();
		if ($redirect != FALSE) {
			redirect($redirect);
		}
		$data['message'] = "";
		if ($flag == 'logout') {
			$data['message'] = array(
				'message' => 'Kamu Berhasil Logout',
				'title' => 'Info',
				'status' => 'success',
				'autohide' => 'true',
				'delay' => '5000'
			);
		}

		// if not, load login form
		$data['title'] = APP_NAME;
		$data['menu'] = "Login";
		$data['action'] = base_url('auth/login_process');

		//csrf init
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$this->auth_layout->load('layout/auth/v_layout', 'pages/auth/v_login_simple', $data);
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
		if ($this->form_validation->run() === TRUE) {

			// get input from user
			$input = $this->input->post(null, true);

			$username = $input['username'];
			$password = $input['password'];


			// check login
			$login = $this->check_login($username, $password);

			if ($login) {
				//check rule from table
				$redirect = $this->check_role();

				$response = array(
					'status' => 1,
					'message' => 'Authentication Success',
					'csrf' => $csrf,
					'return_url' => site_url($redirect)
				);
			} else {
				$response = array(
					'status' => 0,
					'message' => 'Akun tidak terdaftar!',
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
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/rest-emonik/index.php/apilogin/check_login");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
			'username' => $username,
			'password' => $password
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'emonik-api-key: restapiemonik'
		]);

		$server_output = curl_exec($ch);
		curl_close($ch);

		$session = json_decode($server_output, true);

		if ($session['logged_in'] == true) {
			$this->session->set_userdata($session);
			return true;
		} else {
			return false;
		}
	}

	public function check_role()
	{
		if ($this->session->userdata('rolename')) {
			if ($this->session->userdata('rolename') == "superadmin" || $this->session->userdata('rolename') == "admin") {
				return $this->session->userdata('rolename') . '/dashboard';
			} else {
				if ($this->session->userdata('rolename') == "user")
					return $this->session->userdata('rolename') . '/dashboard';
			}
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth/index/logout'));
	}
}
