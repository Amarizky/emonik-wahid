<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $rolename = "superadmin";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Panel_layout');
		if(check_session($this->rolename) == false){
			redirect('auth/logout');
			die();
		}
	}

	public function index($unit_q = "")
	{
		$data['title'] = "Dashboard";
		$data['menu'] = "Dashboard";
		$data['sub_menu'] = "" ;
		$data['sub_title'] = "";
        $data['icon'] = 'icon-home2';
		$data['action'] = site_url(current_role());

		//get data
		// $data['companies'] = $this->crud->get('companies','companyid')->num_rows();
		$this->panel_layout->load('layout/panel/v_layout',"pages/$this->rolename/v_dash", $data);
	}

}
