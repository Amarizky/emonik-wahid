<!-- forgot pass form -->
<form action="<?php echo $action;?>" id="form-forgot-pass" class="form-register-ajax flex-fill animated bounceIn">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<div class="card mb-0">
				<div class="card-body">
					<div class="text-center mb-3">
						<i class="icon-user-plus  icon-2x text-<?=APP_THEME;?> border-<?=APP_THEME;?> border-3 rounded-round p-3 mb-3 mt-1"></i>
						<h5 class="mb-0">Create New Account</h5>
						<span class="d-block text-muted">Mohon lengkapi semua isian dibawah</span>
					</div>
					<div class="row"> 
						<div class="col-sm-6">
							<div class="form-group form-group-feedback form-group-feedback-right">
								<label for="">Email Address <button type="button" class="btn btn-icon rounded-round" data-popup="popover" data-placement="top" title="Petunjuk" data-trigger="hover" data-content="Masukan alamat email aktif yang sering Kamu gunakan. Kami akan mengirimkan verifikasi ke alamat email tersebut"><i class="icon-help"></i></button></label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
							</div>

							<div class="form-group">
								<label for="">Nama Lengkap </label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="password">Enter  Password  <button id="tips-tool" type="button" class="btn btn-icon rounded-round tips-tool-pass" data-popup="popover" data-placement="top" title="Tips for a good password" data-trigger="hover" data-content="Use both upper and lowercase characters. Include at least one symbol (# $ ! % & etc...). Don't use dictionary words"><i class="icon-help"></i></button></label>
								<input type="password" class="form-control" id="password" name="password"  minlength="8" required placeholder="New Password">
							</div>
							<div class="form-group">
								<label for="password">Re-enter  Password </label>
								<input type="password" class="form-control" id="password-confirm" onkeyup="check_pass(this.value);" name="password-confirm"  minlength="8" required placeholder="Re-enter New Password">
								<b style="color:red;display:none;" id="alert-check-pass">Kedua password baru belum sama</b>
							</div>
						</div>
					</div>
					

					<div class="form-group">
						<input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
						<input type="submit" class="btn  bg-<?=APP_THEME;?> btn-block" value="Create account">
					</div>


					<div class="text-center">
						<a class="text-default" href="<?php echo site_url('auth');?>"> <i class="icon-reply"></i> Back to Sign Page</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- /forgot pass form -->

<script>
	$('#password').on('keyup', function() {
		$('.tips-tool-pass').popover('show');
	})

	const check_pass = (param) => {
		let pass = $('#password').val();
		if(pass != ""){
			$("#password-confirm").prop('required',true);
			$('.tips-tool-pass').popover('hide');
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
	$('.form-register-ajax').submit(function (e) {
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