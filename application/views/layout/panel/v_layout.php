<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $head_tags;?>
</head>
<body class="">
  <?php echo $navbar;?>
  <!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
    	<?php echo $sidebar;?>
		<!-- /main sidebar -->

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
      		<?php echo $contents;?>
			<!-- /content area -->

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<span class="navbar-text">
					&copy; <?php echo date('Y');?>. <a href="https://www.pupuk-kujang.co.id/" target="_blank">All right reserved</a>
				</span>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
  <?php echo $footer_tags;?>
</body>
</html>
