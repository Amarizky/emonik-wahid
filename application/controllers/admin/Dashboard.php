<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Panel_layout');
		if(check_session('admin') == false){
			redirect('auth/logout');
			die();
		}
	}

	public function index($unit_q = "")
	{
		$data['title'] = "Dashboard";
		$data['menu'] = "Dashboard";
		$data['sub_menu'] = "emonik" ;
		$data['sub_title'] = "emonik";
        $data['icon'] = 'icon-home2';
		$data['action'] = site_url(current_group());

		// $data['total_emp'] = $this->crud->get_where('employees', 'employeeid', ['company_code' => current_ses('company_code')])->num_rows();
		$this->panel_layout->load('layout/panel/v_layout','pages/admin/v_dash', $data);
	}

}
