<!-- Login form -->
<form action="<?php echo $action;?>" id="form-login" class="form-ajax login-form ">
	<div class="card mb-0">
		<div class="card-body">
			<div class="text-center mb-3">
				<img id="img-bg" src="<?php echo base_url('images/'.APP_ICON);?>" style="max-height:150px;max-width:150px;" class="animation-medium animated fadeIn  " >
				<br/>
				<h5 class="mb-0 animated fadeIn animation-fast animation-delay-fast"><?php echo APP_NAME;?></h5>
				<span class="d-block text-muted animated fadeIn animation-fast animation-delay-medium">Silahkan login terlebih dulu</span>
			</div>

			<div class="form-group form-group-feedback form-group-feedback-left animated fadeInDown animation-fast animation-delay-fast">
				<input type="text" class="form-control " placeholder="Username/Email" name="username" required>
				<div class="form-control-feedback">
					<i class="icon-user text-muted"></i>
				</div>
			</div>

			<div class="form-group form-group-feedback form-group-feedback-left  animated fadeInUp animation-fast animation-delay-fast">
				<input type="password" class="form-control" placeholder="Password" name="password" required> 
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
			</div>

			<div class="form-group">
				<input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
				<input type="submit" class="btn  bg-teal btn-block  animated fadeIn animation-fast animation-delay-medium" value="Sign in">
			</div>
			<div class="text-left  ">
				<a id="tips-tool" href="#petunjuk" class="text-default animated fadeIn animation-fast animation-delay-slow" data-popup="popover" data-placement="top" title="Petunjuk" data-trigger="hover" data-content="Belum punya Akun? Silahkan lakukan Pendaftaran Akun Baru"><i class="icon-help"></i> Petunjuk</a>
				<br/><a class="text-success animated fadeIn animation-fast animation-delay-slow" href="<?php echo site_url('register');?>">Create new account</a>
			</div>
			<div class="text-right  " style="margin-top:-40px;">
				<a class="text-default animated fadeIn animation-fast animation-delay-slow" href="<?php echo site_url('auth/recovery');?>">Forgot password?</a>
				<br/><a class="text-success animated fadeIn animation-fast animation-delay-slow" href="<?php echo site_url('');?>">Back to Landing</a>
			</div>
		</div>
	</div>
</form>
<!-- /login form -->
<script>
	$(document).ready( () => {
	<?php
		if($message != ""){
			$autohide = 'true';
			$autohide = @$message['autohide'] == 'false' ? 'false' : 'true';
			$show = "
			$('#render-toast').append(createToast({
				img: '',
				title: '".$message['title']."',
				message: '".$message['message']."',
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