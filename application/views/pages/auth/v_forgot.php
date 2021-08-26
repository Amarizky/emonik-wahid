<!-- forgot pass form -->
<form action="<?php echo $action;?>" id="form-forgot-pass" class="form-ajax login-form animated bounceIn">
	<div class="card mb-0">
		<div class="card-body">
			<div class="text-center mb-3">
				<i class="icon-spinner11 icon-2x text-<?=APP_THEME;?> border-<?=APP_THEME;?> border-3 rounded-round p-3 mb-3 mt-1"></i>
				<h5 class="mb-0">Password recovery</h5>
				<span class="d-block text-muted">Forgotten your password? Enter your email address below to begin the reset process.</span>
			</div>

			<div class="form-group form-group-feedback form-group-feedback-right">
				<label for="">Email Address <button id="tips-tool" type="button" class="btn btn-icon rounded-round" data-popup="popover" data-placement="top" title="Petunjuk" data-trigger="hover" data-content="Gunakan alamat email yang terdaftar pada akun Kamu. Kami akan mengirimkan informasi terkait recovery password melalui akun Kamu."><i class="icon-help"></i></button></label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
				
			</div>

			<div class="form-group">
				<input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
				<input type="submit" class="btn  bg-<?=APP_THEME;?> btn-block" value="Reset password">
			</div>


			<div class="text-center">
				<a class="text-default" href="<?php echo site_url('auth');?>"> <i class="icon-reply"></i> Back to Sign Page</a>
			</div>
		</div>
	</div>
</form>
<!-- /forgot pass form -->

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
					$('#email').val('');
					$('.toast').toast('show');
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