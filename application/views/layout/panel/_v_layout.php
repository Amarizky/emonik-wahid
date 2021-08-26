
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>HR Dash</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/material/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/app.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/demo_pages/form_select2.js"></script>
	

</head>

<body>

	<!-- Main navbar -->
  <?php echo $navbar;?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="<?php echo base_url();?>/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">Administrator</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-grid5 font-size-sm"></i> &nbsp; HR Dashboard
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white" title="Logout"><i class="icon-switch2"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="index.html" class="nav-link active">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="dir.html" class="nav-link"><i class="icon-users4"></i> <span>Employee Directory</span></a>
						</li>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item mr-3">
								<i class="mi-refresh"></i>
								Refresh 
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->

			<!-- Content area -->
			<div class="content">
				<form action="" method="post" class="form-ajax">
					<div id="modal_filter" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Filtering Unit Kerja</h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
					
								<div class="modal-body">
									<div class="form-group">
										<h6 class="font-weight-semibold">Direktorat :</h6>
										<select class="form-control select-search" data-fouc>
												<option value="">Tampilkan semua</option>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
										</select>
									</div>

									<div class="form-group">
										<h6 class="font-weight-semibold">Kompartemen :</h6>
										<select class="form-control select-search" data-fouc>
												<option value="">Tampilkan semua</option>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
										</select>
									</div>

									<div class="form-group">
										<h6 class="font-weight-semibold">Departemen :</h6>
										<select class="form-control select-search" data-fouc>
												<option value="">Tampilkan semua</option>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
										</select>
									</div>

									<div class="form-group">
										<h6 class="font-weight-semibold">Bagian :</h6>
										<select class="form-control select-search" data-fouc>
												<option value="">Tampilkan semua</option>
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
					
								<div class="modal-footer">
									<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="icon-close2"></i> Batal</button>
									<button type="submit" class="btn bg-teal-400"><i class="icon-search4"></i> Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card  ">
							<div class="card-header header-elements-inline">
								<h5 class="card-title ">Unit Kerja</h5>
								<div class="text-right">
									<button type="button" class="btn btn-secondary text-right " data-toggle="modal" data-target="#modal_filter"><i class="icon-filter4 mr-1"></i> Filter </button>
								</div>
							</div>
							<div class="card-body ">
								<div class="media" style="margin-top:-10px;">
									<div class="media-body">
										<div class="d-inline" style="margin-left:10px;">
											<i class="mi-subdirectory-arrow-right mi-1x"></i>
											Direktorat Teknik & Pengembangan (50000152)
										</div>
										<br/>
										<div class="d-inline" style="margin-left:20px;">
											<i class="mi-subdirectory-arrow-right mi-1x"></i>
											Kompartemen Teknik & Pengembangan (50000117)
										</div>
										<br/>
										<div class="d-inline" style="margin-left:30px;">
											<i class="mi-subdirectory-arrow-right mi-1x"></i>
											Staf GM.Tekbang & SI Penugasan TI PI PKC (50063620)
										</div>
										<br/>
										<div class="d-inline" style="margin-left:40px;">
											<i class="mi-subdirectory-arrow-right mi-1x"></i>
											Semua Bagian
										</div>
										<br />
									</div>
									<div class="ml-3 align-self-center">
										<i class="icon-office icon-4x opacity-75"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card card-body bg-teal-400">
									<div class="media">
										<div class="mr-3 align-self-center">
											<i class="icon-users4 icon-3x text-white opacity-50"></i>
										</div>
							
										<div class="media-body text-right">
											<h3 class="font-weight-semibold mb-0">200 Orang</h3>
											<span class="font-size-md text-white">Jumlah Pegawai Unit Kerja <br/><b>Staf GM.Tekbang & SI Penugasan TI PI
													PKC</b></span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xl-12">
								<div class="card card-body bg-info-400">
									<div class="media">
										<div class="mr-3 align-self-center">
											<i class="fas fa-male fa-3x text-white opacity-50"></i>
										</div>
							
										<div class="media-body text-right">
											<h3 class="font-weight-semibold mb-0">100 Orang (50%)</h3>
											<span class="font-size-md text-white">Jumlah Pegawai Pria Unit Kerja <br /><b>Staf GM.Tekbang & SI Penugasan TI PI
													PKC</b></span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xl-12">
								<div class="card card-body bg-danger-400">
									<div class="media">
										<div class="mr-3 align-self-center">
											<i class="fas fa-female fa-3x text-white opacity-50"></i>
										</div>
							
										<div class="media-body text-right">
											<h3 class="font-weight-semibold mb-0">100 Orang (50%)</h3>
											<span class="font-size-md text-white">Jumlah Pegawai Wanita Unit Kerja <br /><b>Staf GM.Tekbang & SI Penugasan TI PI
													PKC</b></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>
							<div class="card-body">
								<div class="chart-container">
									<div class="chart has-fixed-height" id="pie_rentang_usia"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-6">
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>
							<div class="card-body">
								<div class="chart-container">
									<div class="chart has-fixed-height" id="pie_masa_kerja"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-6">
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>
							<div class="card-body">
								<div class="chart-container">
									<div class="chart has-fixed-height" id="pie_pendidikan"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="chart-container">
											<div class="chart has-fixed-height" id="pie_jabatan"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="table-responsive">
											<table class="table text-nowrap">
												<thead>
													<tr>
														<th>Nama Jabatan</th>
														<th>Jumlah Pegawai</th>
													</tr>
												</thead>
												<tbody>
													<tr class="table-active table-border-double">
														<td colspan="2">Unit Kerja Staf GM.Tekbang & SI Penugasan TI PI PKC</td>
													</tr>
													<tr>
														<td><span class="" style="color:#c05050">Staf Madya II</span></td>
														<td><span class="" style="color:#c05050">1 Orang (12.05%)</span></td>
													</tr>

													<tr>
														<td><span class="" style="color:#63b077">Staf Muda I</span></td>
														<td><span class="" style="color:#63b077">1 Orang (12.05%)</span></td>
													</tr>

													<tr>
														<td><span class="" style="color:#e5cf0d">Staf Pratama I</span></td>
														<td><span class="" style="color:#e5cf0d">1 Orang (12.05%)</span></td>
													</tr>

													<tr>
														<td><span class="" style="color:#26c6da">Staf Pratama II</span></td>
														<td><span class="" style="color:#26c6da">1 Orang (12.05%)</span></td>
													</tr>
													<tr>
														<td><span class="" style="color:#db951a">Staf Pratama III</span></td>
														<td><span class="" style="color:#db951a">1 Orang (12.05%)</span></td>
													</tr>
													<tr>
														<td><span class="" style="color:#d10f53">Superintendent</span></td>
														<td><span class="" style="color:#d10f53">1 Orang (12.05%)</span></td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /main charts -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2021. <a href="#">HR Dashboard</a> by <a href="portal.pupuk-kujang.co.id" target="_blank">TIK PT Pupuk Kujang</a>
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script>
			var EchartsPieBasicLight = function () {
				var _scatterPieBasicLightExample = function () {
					if (typeof echarts == 'undefined') {
						console.warn('Warning - echarts.min.js is not loaded.');
						return;
					}

					// Pie Chart Rentang Usia
						var pie_rentang_usia_element = document.getElementById('pie_rentang_usia');
						if (pie_rentang_usia_element) {
							var pie_rentang_usia = echarts.init(pie_rentang_usia_element);
							pie_rentang_usia.setOption({
								color: [
									'#2ec7c9', '#ffb980', '#c05050', '#ffb980', '#d87a80',
									// '#8d98b3', '#e5cf0d', '#97b552', '#95706d', '#dc69aa',
									// '#07a2a4', '#9a7fd1', '#588dd5', '#f5994e', '#c05050',
									// '#59678c', '#c9ab00', '#7eb00a', '#6f5553', '#c14089'
								],
								textStyle: {
									fontFamily: 'Roboto, Arial, Verdana, sans-serif',
									fontSize: 13
								},
								title: {
									text: 'Rentang Usia',
									subtext: 'Pegawai di Unit Kerja Staf GM.Tekbang & SI Penugasan TI PI PKC',
									left: 'center',
									textStyle: {
										fontSize: 17,
										fontWeight: 500
									},
									subtextStyle: {
										fontSize: 12
									}
								},
								tooltip: {
									trigger: 'item',
									backgroundColor: 'rgba(0,0,0,0.75)',
									padding: [10, 15],
									textStyle: {
										fontSize: 13,
										fontFamily: 'Roboto, sans-serif'
									},
									formatter: "{a} <br/>{b}: {c} ({d}%)"
								},
								legend: {
									orient: 'vertical',
									top: 'bottom',
									left: 0,
									data: ['20 s.d. 29 Tahun', '30 s.d. 39 Tahun', '40 s.d. 49 Tahun', ],
									itemHeight: 8,
									itemWidth: 8
								},
								series: [{
									name: 'Total Pegawai',
									type: 'pie',
									radius: '70%',
									center: ['50%', '57.5%'],
									itemStyle: {
										normal: {
											borderWidth: 1,
											borderColor: '#fff'
										}
									},
									data: [
										{ value: 335, name: '20 s.d. 29 Tahun' },
										{ value: 310, name: '30 s.d. 39 Tahun' },
										{ value: 234, name: '40 s.d. 49 Tahun' },
									]
								}]
							});
							pie_rentang_usia.on('click', function (params) {
								alert(params.name);
							});
						}
						var triggerChartResize = function () {
							pie_rentang_usia_element && pie_rentang_usia.resize();
						};
						var sidebarToggle = document.querySelector('.sidebar-control');
						sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);
						var resizeCharts;
					// Pie Chart Rentang Usia
					
					// Pie Chart Masa Kerja (Karir)
					var pie_masa_kerja_element = document.getElementById('pie_masa_kerja');
					if (pie_masa_kerja_element) {
						var pie_masa_kerja = echarts.init(pie_masa_kerja_element);
						pie_masa_kerja.setOption({
							color: [
								'#8d98b3', '#e5cf0d', '#97b552', '#95706d', '#dc69aa',
								'#07a2a4', '#9a7fd1', '#588dd5', '#f5994e', '#c05050',
								'#59678c', '#c9ab00', '#7eb00a', '#6f5553', '#c14089'
							],
							textStyle: {
								fontFamily: 'Roboto, Arial, Verdana, sans-serif',
								fontSize: 13
							},
							title: {
								text: 'Masa Kerja (Karir)',
								subtext: 'Pegawai di Unit Kerja Staf GM.Tekbang & SI Penugasan TI PI PKC',
								left: 'center',
								textStyle: {
									fontSize: 17,
									fontWeight: 500
								},
								subtextStyle: {
									fontSize: 12
								}
							},
							tooltip: {
								trigger: 'item',
								backgroundColor: 'rgba(0,0,0,0.75)',
								padding: [10, 15],
								textStyle: {
									fontSize: 13,
									fontFamily: 'Roboto, sans-serif'
								},
								formatter: "{a} <br/>{b}: {c} ({d}%)"
							},
							legend: {
								orient: 'horizontal',
								top: 'bottom',
								left: 0,
								data: ['Kurang dari 5 Tahun', '5 s.d. 10 Tahun', '11 s.d. 15 Tahun', '16 s.d. 20 Tahun', '21 s.d. 25 Tahun', 'Lebih dari 25 Tahun'],
								itemHeight: 8,
								itemWidth: 8,
							},
							series: [{
								name: 'Total Pegawai',
								type: 'pie',
								radius: '60%',
								center: ['50%', '53%'],
								itemStyle: {
									normal: {
										borderWidth: 1,
										borderColor: '#fff'
									}
								},
								data: [
									{ value: 20, name: 'Kurang dari 5 Tahun' },
									{ value: 30, name: '5 s.d. 10 Tahun' },
									{ value: 44, name: '11 s.d. 15 Tahun' },
									{ value: 40, name: '16 s.d. 20 Tahun' },
									{ value: 30, name: '21 s.d. 25 Tahun' },
									{ value: 10, name: 'Lebih dari 25 Tahun' },
								]
							}]
						});
						pie_masa_kerja.on('click', function (params) {
							alert(params.name);
						});
					}
					var triggerChartResize = function () {
						pie_masa_kerja_element && pie_masa_kerja.resize();
					};
					var sidebarToggle = document.querySelector('.sidebar-control');
					sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);
					var resizeCharts;
					// Pie Chart Masa Kerja (Karir)

					// Pie Chart Pendidikan
					var pie_pendidikan_element = document.getElementById('pie_pendidikan');
					if (pie_pendidikan_element) {
						var pie_pendidikan = echarts.init(pie_pendidikan_element);
						pie_pendidikan.setOption({
							color: [
								'#6f5553', '#e5cf0d', '#c05050', '#26c6da', '#6f5553',
							],
							textStyle: {
								fontFamily: 'Roboto, Arial, Verdana, sans-serif',
								fontSize: 13
							},
							title: {
								text: 'Tingkat Pendidikan',
								subtext: 'Pegawai di Unit Kerja Staf GM.Tekbang & SI Penugasan TI PI PKC',
								left: 'center',
								textStyle: {
									fontSize: 17,
									fontWeight: 500
								},
								subtextStyle: {
									fontSize: 12
								}
							},
							tooltip: {
								trigger: 'item',
								backgroundColor: 'rgba(0,0,0,0.75)',
								padding: [10, 15],
								textStyle: {
									fontSize: 13,
									fontFamily: 'Roboto, sans-serif'
								},
								formatter: "{a} <br/>{b}: {c} ({d}%)"
							},
							legend: {
								orient: 'vertical',
								top: 'bottom',
								left: 0,
								data: ['SMA/SMK/Sederajat', 'D1/D2/D3', 'Sarjana/S1', 'Magister/S2'],
								itemHeight: 8,
								itemWidth: 8
							},
							series: [{
								name: 'Total Pegawai',
								type: 'pie',
								radius: '70%',
								center: ['50%', '57.5%'],
								itemStyle: {
									normal: {
										borderWidth: 1,
										borderColor: '#fff'
									}
								},
								data: [
									{ value: 135, name: 'SMA/SMK/Sederajat' },
									{ value: 310, name: 'D1/D2/D3' },
									{ value: 234, name: 'Sarjana/S1' },
									{ value: 134, name: 'Magister/S2' },
								]
							}]
						});
						pie_pendidikan.on('click', function (params) {
							alert(params.name);
						});
					}
					var triggerChartResize = function () {
						pie_pendidikan_element && pie_pendidikan.resize();
					};
					var sidebarToggle = document.querySelector('.sidebar-control');
					sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);
					var resizeCharts;
					//Pie Chart Pendidikan	
					

					// Pie Chart Jabatan
					var pie_jabatan_element = document.getElementById('pie_jabatan');
					if (pie_jabatan_element) {
						var pie_jabatan = echarts.init(pie_jabatan_element);
						pie_jabatan.setOption({
							color: [
								'#c05050', '#63b077', '#e5cf0d', '#26c6da', '#db951a', '#d10f53', '#c05050', '#63b077', '#e5cf0d', '#26c6da', '#db951a', '#d10f53', '#c05050', '#63b077', '#e5cf0d', '#26c6da', '#db951a', '#d10f53'
							],
							textStyle: {
								fontFamily: 'Roboto, Arial, Verdana, sans-serif',
								fontSize: 13
							},
							title: {
								text: 'Jabatan Pegawai',
								subtext: 'Pegawai di Unit Kerja Staf GM.Tekbang & SI Penugasan TI PI PKC',
								left: 'center',
								textStyle: {
									fontSize: 17,
									fontWeight: 500
								},
								subtextStyle: {
									fontSize: 12
								}
							},
							tooltip: {
								trigger: 'item',
								backgroundColor: 'rgba(0,0,0,0.75)',
								padding: [10, 15],
								textStyle: {
									fontSize: 13,
									fontFamily: 'Roboto, sans-serif'
								},
								formatter: "{a} <br/>{b}: {c} ({d}%)"
							},
							series: [{
								name: 'Total Pegawai',
								type: 'pie',
								radius: '70%',
								center: ['50%', '57.5%'],
								itemStyle: {
									normal: {
										borderWidth: 1,
										borderColor: '#fff'
									}
								},
								data: [
									{ value: 1, name: 'Staf Madya II' },
									{ value: 2, name: 'Staf Muda I' },
									{ value: 1, name: 'Staf Pratama I' },
									{ value: 2, name: 'Staf Pratama II' },
									{ value: 3, name: 'Staf Pratama III' },
									{ value: 3, name: 'Superintendent' },
								]
							}]
						});
						pie_jabatan.on('click', function (params) {
							alert(params.name);
						});
					}
					var triggerChartResize = function () {
						pie_jabatan_element && pie_jabatan.resize();
					};
					var sidebarToggle = document.querySelector('.sidebar-control');
					sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);
					var resizeCharts;
					//Pie Chart Jabatan

					window.addEventListener('resize', function () {
						clearTimeout(resizeCharts);
						resizeCharts = setTimeout(function () {
							triggerChartResize();
						}, 200);
					});
				};
				return {
					init: function () {
						_scatterPieBasicLightExample();
					}
				}
			}();

			document.addEventListener('DOMContentLoaded', function () {
				EchartsPieBasicLight.init();
			});
	</script>
</body>
</html>
