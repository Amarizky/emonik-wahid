<div class="container">
	<div class="img">
		<img id="img-bg" src="<?php echo base_url('assets/auth/');?>img/reset.svg" class="animated  bounceIn">
	</div>
	<div class="login-content">
		<form action="<?php echo $action;?>" id="form-forgot-password" method="post" class="form-forgot  hidden animated bounceIn">
			<h3 class="title">Reset Password </h3>
			<br/>
			<div class="forgot">
				<div class="form-group">
					<h6 class="text-left">Enter New Password</h6>
					<input type="password" class="form-control small" name="password" required placeholder="" id="password" minlength="8">
				</div>
				
				<div class="form-group">
					<h6 class="text-left">Re-enter New Password</h6>
					<small id="alert-check-pass" style="display:none;text-align:left;color:red;"><i>Password belum sama</i></small>
					<input type="password" class="form-control small" name="conf-password" required placeholder="" id="conf-password" onkeyup="check_pass(this.value);" minlength="8"> 
				</div>
			</div>
			<input type="submit" class="btn" id="btn-register" value="Reset">
		</form>
	</div>
</div>



