<!doctype html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="<?php echo APP_NAME;?> PT Pupuk Kujang Cikampek">
		<meta name="author" content="PT Pupuk Kujang Cikampek">
		<link href="<?php echo base_url();?>/assets/landing/img/icon.png" rel="shortcut icon"  />
		<link rel="manifest" href="<?php echo base_url('manifest.json');?>">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo APP_NAME;?></title>

		<!-- for animation -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>/images/icon.png" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.css">
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>/assets/landing/css/album.css" rel="stylesheet">


		<!-- Core JS files -->
		<script src="<?php echo base_url();?>/global_assets/js/main/jquery.min.js"></script>
		<!-- /core JS files -->

		<!-- Theme JS files -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
		<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>
		<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

		<style>
			html {
				position: relative;
				min-height: 100%;
			}
			main {
				font-size:14px;
				min-height:100vh;
			}
			.form-control {
				font-size:13px;
			}
			/* Make the image fully responsive */
			.carousel-inner img {
				/* width: 100%; */
				/* height: 100%; */
			}
			.btn-apply{
				position:absolute;right:10px;top:10px;
			}
			.jumbotron {
				margin-top:-30px;
				padding-top:200px;
				margin-bottom:50px;
				background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(0, 90, 21, 0.8)), url(images/background.jpg);
				height: 88vh;
				color: #fff;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
			}
			#faq{
				margin-top:100px;
				margin-bottom:100px;
			}
			.jumbotron-content {
				margin-top:-70px;
			}

			@media (max-width:768px){
				.jumbotron-content  {
					margin-top:-60px;
				}
				.nav-link{
					font-size:15px;
				}
				.btn-apply{
					position:relative;margin-left:10px;margin-bottom:10px;
				}
			}
			@media (max-width:365px){
				.jumbotron-heading {
					font-size:26px;
				}
			}
			
		</style>

		<script>
			const swalInit = swal.mixin({
				buttonsStyling: false,
				customClass: {
					confirmButton: 'btn btn-primary ',
					cancelButton: 'btn btn-danger ',
					loader: 'custom-loader'
				},
			});
		</script>
	</head>
  <body style="position:relative;">
	
	<?php echo $navbar;?>
	
    <?php echo $contents;?>
	
	<footer class="footer" >
		<!-- Copyright -->
		<div class="text-center py-3 animated fadeInUp delay-1s bg-success text-white" style="font-size:13px;">
			 <div class="text-center">
				<a style="color:white;" href="mailto:<?php echo SMTP_USER;?>" target="_blank"> <i class="fa fa-envelope"></i> <?php echo SMTP_USER;?> </a> <br/>
				<a style="color:white;" href="mailto:rekrutmen.pkc@pupuk-kujang.co.id" target="_blank"> <i class="fa fa-envelope"></i> rekrutmen.pkc@pupuk-kujang.co.id </a> <br/>
			</div>
			© 2020 
			<a href="https://www.pupuk-kujang.co.id/"  class="text-white"><b> PT PUPUK KUJANG </b></a>. All Rights Reserved.
		</div>
		<!-- Copyright -->
	</footer>
	<?php echo $scripts;?>
  </body>
</html>
