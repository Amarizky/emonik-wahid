<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Landing_layout');
        $this->load->helper('text');
	}

	public function index()
	{
	
		$data['title'] = APP_NAME ;
		$data['menu'] = "Landing" ;
		$data['action'] = base_url();
		$data['settings'] = get_settings();
		$data['faq'] = $this->crud->get('faq', '*')->result();
		$data['news'] = $this->crud->get_limit('news', '*, DATE(created_at) as date', 3, ['publish' => '1'], 'created_by DESC')->result(); 
		$data['check_news'] = $this->crud->get_where('news', '*', ['publish' => '1'])->num_rows(); 

		$this->landing_layout->load('layout/landing/v_layout','pages/landing/v_index', $data);
	}
}
