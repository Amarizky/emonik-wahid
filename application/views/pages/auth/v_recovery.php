<!-- forgot pass form -->
<form action="<?php echo $action;?>" id="form-forgot-pass" class="form-ajax login-form animated bounceIn">
	<div class="card mb-0">
		<div class="card-body">
			<div class="text-center mb-3">
				<i class="icon-loop3 icon-2x text-<?=APP_THEME;?> border-<?=APP_THEME;?> border-3 rounded-round p-3 mb-3 mt-1"></i>
				<h5 class="mb-0">Create New Password</h5>
				<span class="d-block text-muted">Silahkan masukkan password baru</span>
			</div>
			<div class="form-group">
				<label for="password">Enter New Password  <button id="tips-tool" type="button" class="btn btn-icon rounded-round" data-popup="popover" data-placement="top" title="Tips for a good password" data-trigger="hover" data-content="Use both upper and lowercase characters. Include at least one symbol (# $ ! % & etc...). Don't use dictionary words"><i class="icon-help"></i></button></label>
				<input type="password" class="form-control" id="password-new" name="password-new"  minlength="8" required placeholder="New Password">
			</div>
			<div class="form-group">
				<label for="password">Re-enter New Password </label>
				<input type="password" class="form-control" id="password-new-confirm" onkeyup="check_pass(this.value);" name="password-new-confirm"  minlength="8" required placeholder="Re-enter New Password">
				<b style="color:red;display:none;" id="alert-check-pass">Kedua password baru belum sama</b>
			</div>

			<div class="form-group">
				<input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
				<input type="submit" class="btn  bg-<?=APP_THEME;?> btn-block btn-submit" value="Reset password">
			</div>

		</div>
	</div>
</form>
<!-- /forgot pass form -->

<script>
	$('#password-new').on('keyup', function() {
		$('#tips-tool').popover('show');
	})

	const check_pass = (param) => {
		let pass = $('#password-new').val();
		if(pass != ""){
			$("#password-new-confirm").prop('required',true);
		}

		if (pass == param){
			$('#alert-check-pass').slideUp();
			$('.btn-submit').prop('disabled', false);
		} else {
			$('#alert-check-pass').slideDown();
			$('.btn-submit').prop('disabled', true);
		}
	} 
</script>

<script>
	$('.form-ajax').submit(function (e) {
		$('#render-toast').html('');
		$('input[type=submit]').prop('disabled', true);
		//loading toggle
		let param = {
			img: "",
			title: "Mengirim data ke server",
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
						type: 'bg-success',
						title: data.title,
						message: data.message,
						autohide: 'true',
						delay: '5000'
					}));
					$('#password-new').val('');
					$('#password-new-confirm').val('');
					$('.toast').toast('show');
					//set delay
					setTimeout(function(){
						//redirect
						window.location.replace(data.return_url);
					}, 1000); //1 seconds delay
					
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
					title: "Proses Gagal",
					message: data,
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
						title: "Proses Gagal",
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