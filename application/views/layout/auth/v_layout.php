
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title;?></title>
	<link rel="manifest" href="<?php echo base_url('manifest.json');?>">

    <link rel="shortcut icon"  href="<?php echo base_url();?>/images/<?=APP_ICON;?>" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
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
	<script src="<?php echo base_url();?>/assets/js/app.js"></script>
	<!-- /theme JS files -->
	<style>
		.animation-fast {
			animation-duration: 0.5s;
		}
		.animation-medium {
			animation-duration: 1s;
		}
		.animation-slow {
			animation-duration: 1.5s;
		}
		.animation-delay-fast {
			animation-delay: 0.5s;
		}
		.animation-delay-medium {
			animation-delay: 1s;
		}
		.animation-delay-slow {
			animation-delay: 1.5s;
		}
		.login-form  {
			-webkit-box-shadow: 1px 12px 19px -8px rgba(0,0,0,0.49); box-shadow: 1px 12px 19px -8px rgba(0,0,0,0.49);
		}
		body{
			/* background:#5e54b5d9; */
		}
		body{
			background-position:center bottom!important;
			/* background-image:url('<?php echo base_url();?>/images/bg2.jpg')!important; */
		}
	</style>
	<script>
		const  createToast = (param) => {
		const { img = '<img src="assets/landing/img/avatar.svg" class="rounded mr-2 img-20" alt="...">', type = 'bg-dark', title = 'title', time = '', message = 'test', autohide = 'true', delay = '10000' } = param;
		const html = `<div class="toast bg-light text-dark " role="alert" aria-live="assertive"  aria-atomic="true" style="width:300px;" data-autohide="${autohide}" data-delay="${delay}" style="opacity: 1; max-width: none;">
						<div class="toast-header ${type}" >
							${img}
							<strong class="mr-auto">${title}</strong>
							<small class="text-muted">${time}</small>
							<!-- <i class="fa fa-times ml-2  mb-1 close" style="font-size:20px;" data-dismiss="toast" aria-label="Close"></i> -->
						</div>
						<div class="toast-body">
							${message}
						</div>
					</div>`;
			return html;
		}
	</script>
</head>

<body class="bg-<?=APP_THEME;?>-400">
	<div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 200px;top:20;z-index:999">
		<!-- Position it -->
		<div style="position: fixed; margin-top:20px; right: 20px;" id="render-toast">
		</div>
	</div>
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<?php echo $contents;?>

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	
	<script>
		$(document).ready( () => {
		<?php
			if($this->session->flashdata('feedback')){
				$autohide = 'true';
				$autohide = @$this->session->flashdata('feedback')['autohide'] == 'false' ? 'false' : 'true';
				$show = "
				$('#render-toast').append(createToast({
					img: '',
					title: '".$this->session->flashdata('feedback')['title']."',
					message: '".$this->session->flashdata('feedback')['message']."',
					autohide: '".$autohide."',
					delay: '3000'
				}));
				$('.toast').toast('show');
				";
				echo $show;
			}
		?>
		})
	</script>
	<?php if(@$menu != "Logout" AND @$menu != "Forgot Password" AND $menu != "Recovery Password Page") : ?>
	<script>
		
		
		$('.form-ajax').submit(function (e) {
			$('#render-toast').html('');
			$('input[type=submit]').prop('disabled', true);
			//loading toggle
			let param = {
				img: "",
				title: "Validasi Login",
				message: '<i class="fa fa-spinner fa-spin" ></i> Mengirim Data - Silahkan Tunggu',
				autohide: 'false',
			}
			$('#render-toast').append(createToast(param));
			$('.toast').toast('show');
			
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: new FormData($(this)[0]),
				success: function (data) {
					//close loading
					$('#render-toast').html('');
					data = JSON.parse(data);
					$('#csrf').val(data.csrf.hash);
					if (data.status == 1) {
						$('#render-toast').append(createToast(param = {
							img: "",
							title: "Message",
							type: 'bg-success',
							message: data.message,
							autohide: 'false',
							delay: '0'
						}));
						$('#render-toast').append(createToast({
							img: "",
							title: "Message",
							type: 'bg-success',
							message: "Silahkan Tunggu - Anda sedang dialihkan <i class='fa fa-spinner fa-spin'></i> ",
							autohide: 'false',
							delay: '0'
						}));
						$('.toast').toast('show');
						//set delay
						setTimeout(function(){
							// synchronize session on client
							let parseHtml = "";
							//redirect
							document.location.href = data.return_url
						}, 2000); //2 seconds delay
					} else {
						let param = {
							img: "",
							type: 'bg-danger-800',
							title: "Message",
							message: data.message,
							autohide: 'true',
							delay: '2000'
						}
						$('#render-toast').append(createToast(param));
						$('.toast').toast('show');
					}
					$('input[type=submit]').prop('disabled', false);

				},
				cache: false,
				contentType: false,
				processData: false,
				error: function (data) {
					//close loading
					$('#render-toast').html('');
					let param = {
						img: "",
						type: 'bg-danger-800',
						title: "Login Gagal",
						message: "Terjadi kesalahan. periksa koneksi internet",
						autohide: 'true',
						delay: '2000'
					}
					$('#render-toast').append(createToast(param));
					$('.toast').toast('show');
					$('input[type=submit]').prop('disabled', false);
					
				},
				statusCode: {
					403: function() { 
						//close loading
						$('#render-toast').html('');
						let param = {
							img: "",
							type: 'bg-danger-800',
							title: "Login Gagal",
							message: "Waktu pengisian habis. Mohon refresh halaman ini terlebih dahulu",
							autohide: 'true',
							delay: '3000'
						}
						$('#render-toast').append(createToast(param));
						$('.toast').toast('show');
						$('input[type=submit]').prop('disabled', false);
					},
					500: function() { 
						//close loading
						$('#render-toast').html('');
						let param = {
							img: "",
							type: 'bg-danger-800',
							title: "Proses Gagal",
							message: "Terjadi kesalahan. Permintaan kamu gagal dilakukan",
							autohide: 'true',
							delay: '3000'
						}
						$('#render-toast').append(createToast(param));
						$('.toast').toast('show');
						$('input[type=submit]').prop('disabled', false);
					}
				}
			});
			e.preventDefault();

		});
	</script>
	<?php endif;?>
</body>
</html>
