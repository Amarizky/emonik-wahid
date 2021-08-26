    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableku').DataTable();
        } );
        //for submit data
        $('.form-ajax').submit(function(e) {
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
                },
                statusCode: {
                    403: function() { 
                        swalInit.fire("Info", "Terjadi kesalahan. Mohon refresh page terlebih dahulu", "info");
                        $('.btn-submit').prop('disabled', false).html('Submit <i class="icon-paperplane ml-2"></i>');
                        $('.btn-submit-back').prop('disabled', false).html('Submit & Back <i class="icon-paperplane ml-2"></i>');
                    }
                }
            });
            e.preventDefault();
        });

    </script>