<form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="font-weight-semibold">Kode Jabatan</label>
                <input type="text" class="form-control" id="post_code" name="post_code" placeholder="" value="<?php echo @$row->post_code;?>" required <?php echo $sub_menu != 'Edit' ? '' : 'readonly';?>>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Nama Jabatan</label>
                <input type="text" class="form-control" id="post_name" name="post_name" placeholder="" value="<?php echo @$row->post_name;?>" required>
            </div>
            <br/>
            <div class="form-group">
                <input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
                <input type="hidden" name="submit" id="submit-type" value="submit" />
                <button type="submit"  id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit"  id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
</form>

