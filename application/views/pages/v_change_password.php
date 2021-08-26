<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="" class="breadcrumb-item"><i class="<?php echo $icon;?>"></i> <?php echo $menu;?></a>
                <?php echo $sub_menu != "" ? '<a href="#" class="breadcrumb-item">'.$sub_menu.'</a>' : '';?>
                <?php echo $sub_title != "" ? '<span class="breadcrumb-item active">'.$sub_title.'</span>' : '';?>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<div class="content">
    <div class="card-body py-0">
        <h2 class="animated  ">Change Password <small style="font-size:15px;display:block">Silahkan isi form di bawah untuk melakukan perubahan password</small></h2>
        <div class="row animated ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo site_url('/account/change_password_process');?>" method="post" class="form-ajax ">
                            <div class="form-group">
                                <label for="password">Enter Current Password</label>
                                <input type="password" class="form-control" id="password" name="password-old"  required placeholder="Password">
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
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-submit">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#password-new').on('keyup', function() {
        $('#tips-tool').popover('show');
    })
    $('#password-new-confirm').on('keyup', function() {
        $('#tips-tool').popover('hide');
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
