<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Panel_layout');
		if (check_session('admin') == false) {
			redirect('auth/logout');
			die();
		}
	}

	public function index($unit_q = "")
	{
		$data['title'] = "Dashboard";
		$data['menu'] = "Dashboard";
		$data['sub_menu'] = "emonik";
		$data['sub_title'] = "emonik";
		$data['icon'] = 'icon-home2';
		$data['action'] = site_url(current_group());

		//ambil data dari api (dashboard)
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://kahftekno.com/rest-emonik/index.php/apibahanbaku");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'emonik-api-key: restapiemonik'
		]);

		$server_output = curl_exec($ch);
		curl_close($ch);

		$response = json_decode($server_output, true);

		foreach ($response['data'][0] as $k => $v) {
			if (substr($k, 0, 5) === "bahan") {
				$data['dataset']['labels'][] = ucwords($v);
			} else if (substr($k, 0, 9) === "stokbahan") {
				$data['dataset']['realLabel'][] = $k;
				$data['dataset']['data'][] = $v;
			} else if (substr($k, 0, 7) === "satuan") {
				$data['dataset']['satuan'] = $v;
			} else if (substr($k, 0, 5) === "mitra") {
				$data['dataset']['mitra'] = $v;
			}
		}

		$data['dataset']['labels'] = '"' . implode('","', $data['dataset']['labels']) . '"';
		$data['dataset']['data'] = implode(',', $data['dataset']['data']);

		// $data['total_emp'] = $this->crud->get_where('employees', 'employeeid', ['company_code' => current_ses('company_code')])->num_rows();
		$this->panel_layout->load('layout/panel/v_layout', 'pages/admin/v_dash', $data);
	}
}
