<?php $companies = get_data('companies', '*')->result();?>
<form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo @$row->name;?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?php echo @$row->username;?>" required <?php echo $sub_menu != 'Edit' ? '' : 'readonly';?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo @$row->email;?>" required <?php echo $sub_menu != 'Edit' ? '' : 'readonly';?>> 
            </div>

            
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Company</label>
                <select name="company_code" id="company_code" class="form-control select2" required>
                    <option value="">Pilih salah satu</option>
                    <?php
                    foreach ($companies as $r) {
                        $selected = $r->company_code == @$row->company_code ? 'selected' : '';
                        echo "<option $selected value='$r->company_code'>$r->name ($r->company_code)</value>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-check form-check-switchery">
                <label class="form-check-label">

                    <input type="checkbox" class="form-input-switchery" <?= !empty($row->is_active) == '1' ? 'checked' : '';?> data-fouc value="1" name="is_active" id="is_active">
                    Active
                </label>
            </div>
            <br/>
            <?php if($sub_menu != 'Edit'): ?>
            <div class="alert alert-info alert-styled-left alert-dismissible">
                Password default adalah <a class="alert-link"><?=DEFAULT_PASS;?></a>
            </div>
            <?php else:?>
                <div class="form-check form-check-switchery">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-input-switchery"  data-fouc value="1" name="is_reset" id="is_reset">
                        Reset Password
                    </label>
                </div>
                <div class="alert alert-info alert-styled-left alert-dismissible">
                    Reset Password akan merubah password menjadi default <a class="alert-link"><?=DEFAULT_PASS;?></a>
                </div>
            <?php endif;?>
            <br/>
            <div class="form-group">
                <input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
                <input type="hidden" name="submit" id="submit-type" value="submit" />
                <button type="submit"  id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 mb-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit"  id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 mb-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
</form>

