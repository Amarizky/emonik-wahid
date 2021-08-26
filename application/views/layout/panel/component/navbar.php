<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-<?=APP_THEME;?>-600">
		<a href="#" class="text-light" style="margin-top:10px;font-size:20px;margin-right:170px;">
			Emonik
		</a>

		<div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/avatar/'.current_ses('avatar'));?>" class="rounded-circle mr-2 border border-light" height="34" width="34" alt="">
						<span><?php echo current_ses('name');?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo site_url('account/change_password');?>" class="dropdown-item"><i class="icon-cog5"></i> Change Password</a>
						<a href="<?php echo site_url('auth/logout');?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
<!-- /main navbar -->
