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

		//ambil data dari api (apibahanbaku)
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

		// print_r(json_encode($response));
		// die();

		foreach ($response['data'][0] as $k => $v) {
			if (substr($k, 0, 5) === "bahan") {
				$data['chart1']['bLabels'][] = ucwords($v);
				$data['chart1']['labels'][] = ucwords($v);
			} else if (substr($k, 0, 9) === "stokbahan") {
				$data['chart1']['bLinks'][] = $k;
				$data['chart1']['data'][] = $v;
			} else if (substr($k, 0, 7) === "satuan") {
				$data['chart1']['satuan'] = $v;
			} else if (substr($k, 0, 5) === "mitra") {
				$data['chart1']['mitra'] = $v;
			}
		}

		$data['chart1']['labels'] = '"' . implode('","', $data['chart1']['labels']) . '"';
		$data['chart1']['data'] = implode(',', $data['chart1']['data']);


		//ambil data dari api (apiproduksi)
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://kahftekno.com/rest-emonik/index.php/apiproduksi");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'emonik-api-key: restapiemonik'
		]);

		$server_output = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($server_output, true);

		foreach ($response['data'] as $k => $v) {
			if (!is_null($v['kode_produksi'])) {
				$data['chart2']['labels'][] = $v['kode_produksi'];
				$data['chart2']['data'][] = $v['jumlah_produksi'];
			}
		}

		$data['chart2']['bLabels'] = $data['chart2']['labels'];
		$data['chart2']['labels'] = '"' . implode('","', $data['chart2']['labels']) . '"';
		$data['chart2']['data'] = implode(',', $data['chart2']['data']);

		// $data['total_emp'] = $this->crud->get_where('employees', 'employeeid', ['company_code' => current_ses('company_code')])->num_rows();
		$this->panel_layout->load('layout/panel/v_layout', 'pages/admin/v_dash', $data);
	}
}
