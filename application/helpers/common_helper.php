<?php


function check_session($str_usertype = null) {
    $CI =& get_instance();
   if(@$CI->session->userdata('rolename') != $str_usertype)
	{
		return false;
	} else {
		return true;
	}
}

function date_beda($date) {
	$date1 = @new DateTime($date);
	$date2 = @new DateTime("");
	$interval = @$date1->diff($date2);
	return $interval;
}

function is_login() {
    $CI =& get_instance();
   	if($CI->session->userdata('logged_in'))
	{
		return true;
	} else {
		return false;
	}
}

function status_regis($param = "") {
	if($param == ""){
		return null;
	}
	switch ($param) {
		case '0':
			return '<button type="button" class="btn bg-transparent text-info border-info ml-1">Menunggu Seleksi Administratif</button>';
			break;
		case '1':
			return '<button type="button" class="btn bg-transparent text-success border-success ml-1">Lolos Seleksi Administratif</button>';
			break;
		case '2':
			return '<button type="button" class="btn bg-transparent text-danger border-danger ml-1">Tidak Lolos Administratif</button>';
			break;
		default:
			return null;
			break;
	}
}

function activity_type($param){
	if($param == "login"){
		return [
			'name' => 'Login',
			'icon' => 'icon-user-check',
			'color' => 'success'
		];
	}else if($param == 'reset_password'){
		return [
			'name' => 'Reset Password',
			'icon' => 'icon-spinner11',
			'color' => 'warning-400'

		];		
	}else if($param == 'forgot_pass'){
		return [
			'name' => 'Request Forgot Password',
			'icon' => 'icon-spinner11',
			'color' => 'warning-400'

		];
	}else if($param == 'change_password'){
		return [
			'name' => 'Change Password',
			'icon' => 'icon-key',
			'color' => 'primary'

		];		
	}else if($param == 'update_account'){
		return [
			'name' => 'Update Account',
			'icon' => 'icon-user-check',
			'color' => 'secondary'

		];		
	}else if($param == 'forgot_profile'){
		return [
			'name' => 'Update Profile',
			'icon' => 'icon-user-check',
			'color' => 'secondary'

		];		
	}else{
		return [
			'name' => '',
			'icon' => 'icon-user-check',
			'color' => 'primary'

		];
	}
}

function is_active($param = 1){
	switch ($param) {
		case '1':
			$res = "<div class='badge badge-flat border-success text-success'>Active</div>";
			break;
		
		default:
			$res = "<div class='badge badge-flat border-danger text-danger'>Non Active</div>";
			break;
	}
	return $res;
}


function is_yes($param = 1){
	switch ($param) {
		case '1':
			$res = "<div class='badge badge-flat border-success text-success'>Ya</div>";
			break;
		
		default:
			$res = "<div class='badge badge-flat border-danger text-danger'>Tidak</div>";
			break;
	}
	return $res;
}

function get_data($table, $select, $where = null,$order_by = null) {
    $CI =& get_instance();
	$CI->db->select($select);
	if($where != NULL){
		$CI->db->where($where);
	}
	$CI->db->where(['is_deleted' => '0']);
	if($order_by != null){
		$CI->db->order_by($order_by);
	}
	return $CI->db->get($table);
}

function get_role($id = null)
{
	$data = get_data('roles', '*', ['roleid' => $id])->row_array();
	switch ($id) {
		case 1:
			return '<span class="badge badge-primary">'.$data['desc'].'</span>';
			break;
		case 2:
			return '<span class="badge badge-warning">'.$data['desc'].'</span>';
			break;
		case 3:
			return '<span class="badge badge-teal">'.$data['desc'].'</span>';
			break;
		default:
			return '<span class="badge badge-orange">'.$data['desc'].'</span>';
			break;
	}
}

function data_akun() {
    $CI =& get_instance();
   	$data['sum_users'] = $CI->crud->get('users', 'username')->num_rows();
	return $data;
}

function check_period($o = null, $c = null){
	$now = strtotime('now');
	if($o == null || $c == null){
		return false;
	}else{
		$o = strtotime($o);
		$c = strtotime($c);
		if($o < $now AND $now < $c){
			return true;
		}else{
			return false;
		}
	}
}

function convert_timestamp($dt = null){
	if($dt == null || $dt == ""){
		return null;
	}
	return @date('Y-m-d\TH:i', @strtotime($dt));
}

function update_session()
{
	$CI =& get_instance();

	$query = $CI->db->get_where('users',array('userid'=>$CI->session->userdata('userid')));
	$row_user 	= $query->row_array();
	$CI->session->set_userdata('logged_in', TRUE);
	$CI->session->set_userdata('verified', $row_user['verified']);
}

function get_settings()
{
    $CI =& get_instance();
	$CI->db->select('setting_name, setting_desc');
	$query = $CI->db->get('settings');
	$get = $query->result();

	$output = new stdClass;
	foreach($get as $row) {
		$rows = $row->setting_name;
		$output->$rows = $row->setting_desc;
	}
	return $output;
}

function resize_avatar($nama_file_baru){
    $CI =& get_instance();
	$CI->load->library('image_lib');

	$conf['image_library']='gd2';
	$conf['source_image']= FCPATH.'/assets/uploads/'.$nama_file_baru;
	$conf['create_thumb']= FALSE;
	$conf['maintain_ratio']= TRUE;
	$conf['quality']= '60%';
	$conf['width']= 900;
	$conf['height']= 1060;
	$conf['new_image']=  FCPATH.'/assets/uploads/'.$nama_file_baru;

	$CI->image_lib->clear();
	$CI->image_lib->initialize($conf);
	$CI->image_lib->resize();
}

function tgl_indo($tanggal)
{
	$bulan = array (
		1 =>   'Januari',
		2 =>'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	return @$pecahkan[2] . ' ' . @$bulan[ (int)@$pecahkan[1] ] . ' ' . @$pecahkan[0];
}

function month_convert($b = null){
	$format = array(
			'1' => '01',
			'2' => '02',
			'3' => '03',
			'4' => '04',
			'5' => '05',
			'6' => '06',
			'7' => '07',
			'8' => '08',
			'9' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
	);
	return strtr($b, $format);
}

function day_convert($b = null){
	$format = array(
			'1' => '01',
			'2' => '02',
			'3' => '03',
			'4' => '04',
			'5' => '05',
			'6' => '06',
			'7' => '07',
			'8' => '08',
			'9' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '31',
	);
	return strtr($b, $format);
}


function day_convert_english($day = null){
	switch($day){
		case 'Minggu':
			$day_ini = "Sunday";
		break;
 
		case 'Senin':			
			$day_ini = "Monday";
		break;
 
		case 'Selasa':
			$day_ini = "Tuesday";
		break;
 
		case 'Rabu':
			$day_ini = "Wednesday";
		break;
 
		case 'Kamis':
			$day_ini = "Thursday";
		break;
 
		case 'Jumat':
			$day_ini = "Friday";
		break;
 
		case 'Sabtu':
			$day_ini = "Saturday";
		break;
		
		default:
			$day_ini = "";		
		break;
	}
	return  $day_ini ;
}

function day_convert_indo($hari = null){
	switch($hari){
		case 'Sunday':
			$hari_ini = "Minggu";
		break;
 
		case 'Monday':			
			$hari_ini = "Senin";
		break;
 
		case 'Tuesday':
			$hari_ini = "Selasa";
		break;
 
		case 'Wednesday':
			$hari_ini = "Rabu";
		break;
 
		case 'Thursday':
			$hari_ini = "Kamis";
		break;
 
		case 'Friday':
			$hari_ini = "Jumat";
		break;
 
		case 'Saturday':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "";		
		break;
	}
	return  $hari_ini ;
}

function current_roleid()
{
	$CI =& get_instance();
	return $CI->session->userdata('roleid');
}

function current_role($param = null)
{
	$CI =& get_instance();
	return $CI->session->userdata('rolename');
}

function current_group($param = null)
{
	return current_role($param);
}

function current_ses($param = null)
{
	$CI =& get_instance();
	return $CI->session->userdata($param);
}

function bulan($i = null){
	$format = array(
			'1' => 'Januari',
			'2' => 'Februari',
			'3' => 'Maret',
			'4' => 'April',
			'5' => 'Mei',
			'6' => 'Juni',
			'7' => 'Juli',
			'8' => 'Agustus',
			'9' => 'September',
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
	);
	return strtr($i, $format);
}

function distance($lat1, $lon1, $lat2, $lon2) { 
	$pi80 = M_PI / 180; 
	$lat1 *= $pi80; 
	$lon1 *= $pi80; 
	$lat2 *= $pi80; 
	$lon2 *= $pi80; 
	$r = 6372.797; // mean radius of Earth in km 
	$dlat = $lat2 - $lat1; 
	$dlon = $lon2 - $lon1; 
	$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
	$km = $r * $c; 
	$m = $km * 1000;
	return $m; 
}

function get_ip_user()
{
	$ip = "";
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function mail_text_forgot($param = "")
{
	if($param == ""){
		return 0;
	}
	return '
		<div id=":o0" class="a3s aiL ">
			<div class="adM">
			</div>
			<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td><br>
							<div style="max-width: 640px; padding: 0px 20px; margin: 0px auto;">
								<div style="text-align: center;"><br>
									<h1
										style="font-size: 48px; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-weight: 300;">
										<span id="m_7197081029676601075docs-internal-guid-6b06fabf-678e-f659-7a21-f2db103432e5">
											<span> Halo '.$param['name'].'</span></span>,</h1>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<div style="width: 100%; background: rgb(255, 255, 255); text-align: left;"><br>
				<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td align="left" valign="middle">
								<div style="max-width: 640px; padding: 0px 20px; margin: 0px auto;">
									<p style="line-height: 1.5;"><span
											style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium; color: rgb(136, 136, 136);">
											<br>Kami telah menerima permohonan untuk mengatur ulang kata sandi Kamu. Untuk
											melanjutkan proses pengaturan ulang kata sandi, silakan tekan tombol di bawah ini:
											<br> </span></p>
									<div style="max-width: 640px; padding: 10px; margin: 10px auto; text-align: center;"><span
											style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: large;">
											<a style="text-decoration: none; background-color: #009688; color: rgb(255, 255, 255); border: 1px solid #009688; padding: 5px 15px; border-radius: 3px;"
												href="'.site_url('auth/recovery_page?key='.$param['key']).'"
												target="_blank">
												Ubah
												Kata Sandi</a></span></div>
									<p style="line-height: 1.5;"><span
											style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium; color: rgb(136, 136, 136);">Tautan
											pada tombol tersebut aktif dan valid selama 2 jam sejak email diterima. Apabila Kamu
											merasa tidak pernah mengajukan permohonan pengaturan ulang kata sandi, Kamu bisa
											mengabaikan email ini. <br> <br> </span></p>
								</div>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle">
								<div style="max-width: 640px; padding: 0px 20px; margin: 0px auto;">
									<p style="color: #009688;"><span
											style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;">Salam
											Hangat,</span> <br> <span
											style="font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;">
											<strong> Panitia Rekrutmen Pupuk Kujang</strong>
										</span></p>
								</div>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="padding-top:30px;padding-bottom:30px;">
								<div style="padding-top:30px;padding-bottom:30px;background:#009688;max-width: 640px;  margin: 0px auto;">
									<p style="text-align:center;color:#fff;font-size:17px;margin-left:20px;margin-right:20px;"> PT Pupuk Kujang Cikampek <br/> <small>Jl. Jend. A. Yani No. 39 Cikampek 41373 Kabupaten Karawang, Jawa Barat</small></p>
								</div>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<div class="yj6qo"></div>
			<div class="adL">
		
		
			</div>
		</div>
	';
}


function mail_text_verify($param = "")
{
	if($param == ""){
		return 0;
	}
	return '
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width: 640px;padding:0px 30px;margin: auto; ">
		<tbody >
		<tr>
			<td style="padding: 40px 15px; font-family: Quicksand, Helvetica, Arial, sans-serif; color: rgb(83, 83, 83); text-align: center;">
				<h2 style="margin: 0px; color: #009688; font-size: 20px; line-height: 21px;">Verifikasi Email Kamu</h2>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: rgb(83, 83, 83); text-align: left;">
				<p style="margin: 0px;">Hai '.$param['name'].', hanya beberapa langkah lagi sebelum kamu dapat menggunakan akun Kamu.</p>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: black; text-align: left;">
				<p style="margin: 10px 0px;">Gunakan tombol dibawah ini untuk memverifikasi email kamu.</p>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 15px; color: rgb(255, 255, 255); text-align: center;">
				<a href="'.$param['link'].'" class="m_7097733511177501301button-link" style="text-decoration:none;background-color: #009688; color: rgb(255, 255, 255); border-radius: 4px; font-family: Quicksand, sans-serif; padding: 14px 20px; display: inline-block;" target="_blank" >Verifikasi Email Sekarang</a>
			</td>
		</tr>
		<tr>
			<td style="padding: 10px 0px 20px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: black; text-align: left;">
				<p style="margin: 0px;">Jika tombol diatas tidak befungsi, Kamu juga bisa klik link berikut atau copy paste pada browser Kamu</p>
			</td>
		</tr>
		<tr>
			<td style="padding: 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: rgb(83, 83, 83); text-align: left;">
				<p style="margin: 0px;">
					<a href="'.$param['link'].'" style="text-decoration:none;color: #009688; overflow-wrap: break-word; word-break: break-word;" class="m_7097733511177501301link" target="_blank">'.$param['link'].'</a>
				</p>
			</td>
		</tr>
		<tr>
			<td style="padding: 30px 0px 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: rgb(83, 83, 83); text-align: left;">
				<p style="margin: 0px;">Kode verifikasi ini ini akan berakhir dalam waktu 12 jam. Bila kode ini tidak berfungsi atau sudah berakhir masa berlakunya, silahkan lakukan pendaftaran ulang dengan email lain.</p>
			</td>
		</tr>
		<tr>
			<td align="left" valign="middle" style="padding-top:30px;padding-bottom:30px;">
				<div style="padding-top:30px;padding-bottom:30px;background:#009688;  margin: 0px auto;">
					<p style="text-align:center;color:#fff;font-size:17px;margin-left:20px;margin-right:20px;"> PT Pupuk Kujang Cikampek <br/> <small>Jl. Jend. A. Yani No. 39 Cikampek 41373 Kabupaten Karawang, Jawa Barat</small></p>
				</div>
			</td>
		</tr>
		</tbody>
	</table>
	';
}

function mail_notif($message = null, $get = null, $get_job = null)
{
	$message = @str_replace('$name', @$get->nama, @str_replace('$job_title', @$get_job->job_title, $message));	
	return '
		<table role="presentation" cellspacing="0" cellpadding="0" 
			style="max-width: 640px;padding:0px 30px;margin: auto; ">
			<tbody>
				<tr>
				<td
					style="padding: 40px 15px; font-family: Quicksand, Helvetica, Arial, sans-serif; color: rgb(83, 83, 83); text-align: center;">
					<h2 style="margin: 0px; color: #009688; font-size: 20px; line-height: 21px;">Pengumuman Hasil Seleksi</h2>
				</td>
				</tr>
				<tr>
				<td
					style="padding: 0px; font-family: Quicksand, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 18px; color: black; text-align: left;">
					'.$message.'
				</td>
				</tr>
				<tr>
				<td align="left" valign="middle" style="padding-top:20px;padding-bottom:20px;">
					<div style="padding-top:20px;padding-bottom:20px;background:#009688;  margin: 0px auto;">
					<p style="font-family: Quicksand, Helvetica, Arial, sans-serif;text-align:center;color:#fff;font-size:17px;margin-left:20px;margin-right:20px;"> PT Pupuk Kujang
						Cikampek  <br /> <small>Jl. Jend. A. Yani No. 39 Cikampek 41373 Kabupaten Karawang, Jawa
						Barat</small></p>
					</div>
				</td>
				</tr>
			</tbody>
			</table>
	';
}