

<script>
//for submit data
$('.form-ajax').submit(function(e) {
    var notif = new Noty({
                        text: '<i class="fa fa-spinner fa-spin"></i> Loading',
                        type: 'info',
                        timeout: false,
                    }).show();
    $('.btn-submit').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading');
    $('.btn-submit-back').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData($(this)[0]),
        success: function(data){
            data = JSON.parse(data);
            $('#csrf').val(data.csrf.hash);
            $('.csrf').val(data.csrf.hash);
            if(data.status == 1) {
                swalInit.fire("Success", data.message, "success").then((value) => {
                    if(data.return_url != '#') {
                        document.location.href=data.return_url
                    }
                    if(data.return_url != '#edit') {
                        $('.form-control').val('');
                    }
                });
            } else  {
                swalInit.fire("Failed", data.message, "error");
            }
            $('.btn-submit').prop('disabled', false).html('Submit <i class="icon-paperplane ml-2"></i>');
            $('.btn-submit-back').prop('disabled', false).html('Submit & Back <i class="icon-paperplane ml-2"></i>');
            notif.close();
            $('.modal').modal('hide')
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function(data) {
            if(data == "" || data == null){
            }else{
                swalInit.fire("Failed", data, "error");
            }
            $('.btn-submit').prop('disabled', false).html('Submit <i class="icon-paperplane ml-2"></i>');
            $('.btn-submit-back').prop('disabled', false).html('Submit & Back <i class="icon-paperplane ml-2"></i>');
            notif.close();
            $('.modal').modal('hide')
        },
        statusCode: {
            403: function() { 
                swalInit.fire("Info", "Terjadi kesalahan. Mohon refresh page terlebih dahulu", "info");
                $('.btn-submit').prop('disabled', false).html('Submit <i class="icon-paperplane ml-2"></i>');
                $('.btn-submit-back').prop('disabled', false).html('Submit & Back <i class="icon-paperplane ml-2"></i>');
                notif.close();
                $('.modal').modal('hide')
            }
        }
    });
    e.preventDefault();
});


$('.form-import').submit(function(e) {
    $('.btn-submit-import').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData($(this)[0]),
        success: function(data){
        data = JSON.parse(data);
        $('#csrf').val(data.csrf.hash);
        $('.csrf').val(data.csrf.hash);
        if(data.status == 1) {
            swalInit.fire("Proses Import Selesai", data.message, "success").then((value) => {
                if(data.return_url != '#') {
                    document.location.href=data.return_url
                }
            });
        } else  {
            swalInit.fire("Failed", data.message, "error");
        }
        $('.btn-submit-import').prop('disabled', false).html('Import <i class="icon-upload4 ml-2"></i>');
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function(data) {
            if(data == "" || data == null){
            }else{
                swalInit.fire("Failed", data, "error");
            }
            $('.btn-submit-import').prop('disabled', false).html('Import <i class="icon-upload4 ml-2"></i>');
        },
        statusCode: {
            403: function() { 
                swalInit.fire("Info", "Terjadi kesalahan. Mohon refresh page terlebih dahulu", "info");
                $('.btn-submit-import').prop('disabled', false).html('Import <i class="icon-upload4 ml-2"></i>');
            }
        }
    });
    e.preventDefault();
});
</script>