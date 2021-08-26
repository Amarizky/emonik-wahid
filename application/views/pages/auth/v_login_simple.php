<!-- Login form -->
<form action="<?php echo $action;?>" id="form-login" class="form-ajax login-form ">
	<div class="card mb-0">
		<div class="card-body">
			<div class="text-center mb-3">
				<img id="img-bg" src="<?php echo base_url('images/'.APP_ICON);?>" style="max-height:150px;max-width:150px;" class="animation-medium animated fadeIn  " >
				<h5 class="mb-0 animated fadeIn animation-fast animation-delay-fast"><?php echo APP_NAME;?></h5>
				<span class="d-block mt-3 text-dark animated fadeIn animation-fast animation-delay-medium">Enter your credentials below</span>
			</div>

			<div class="form-group form-group-feedback form-group-feedback-left animated fadeInDown animation-fast animation-delay-fast">
				<input type="text" class="form-control " placeholder="Username" name="username" required>
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
				<input type="submit" class="btn  bg-<?=APP_THEME;?> btn-block  animated fadeIn animation-fast animation-delay-medium" value="Sign in">
			</div>

			<footer class="page-copyright page-copyright-inverse">
				<p class="text-center text-dark">©<?php echo date('Y');?>. All right reserved</p>
			</footer>
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