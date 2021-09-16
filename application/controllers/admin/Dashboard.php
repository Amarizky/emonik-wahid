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

		$bahan = [];

		foreach ($response['data'] as $key) {
			@$bahan[$key['bahan1']] += $key['stokbahan1'];
			@$bahan[$key['bahan2']] += $key['stokbahan2'];
			@$bahan[$key['bahan3']] += $key['stokbahan3'];
			@$bahan[$key['bahan4']] += $key['stokbahan4'];
			@$bahan[$key['bahan5']] += $key['stokbahan5'];
			@$bahan[$key['bahan6']] += $key['stokbahan6'];
			@$bahan[$key['bahan7']] += $key['stokbahan7'];
		}

		$i = 1;
		foreach ($bahan as $k => $v) {
			$data['chart1']['labels'][] = ucwords($k);
			$data['chart1']['bLabels'][] = ucwords($k);
			$data['chart1']['data'][] = ucwords($v);
			$data['chart1']['bLinks'][] = 'stokbahan' . $i;
			$i++;
		}


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
