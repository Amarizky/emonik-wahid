<?php
    $roles = get_data('roles', '*')->result();
?>
<form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="font-weight-semibold">Foto Profil</label>
                <?php if(!empty($row->avatar)): ?>
                    <!-- edit -->
                    <input type="file" name="avatar" id="avatar" class="file-input-overwrite" url_file="<?=!empty($row->avatar) ? base_url().'/assets/avatar/'.$row->avatar : ''?>" caption="<?=!empty($row->avatar) ? $row->avatar : ''?>" data-show-caption="false" data-show-upload="false"  data-fouc />
                    <span class="form-text text-muted"> Only file <code>jpg</code>, <code>png</code> and <code>jpeg</code> extensions are allowed. Max size file 1MB</span>
                <?php else: ?>
                    <!-- insert -->
                    <input type="file" name="avatar" id="avatar" class="file-input-extensions" data-show-caption="false" data-show-upload="false"  data-fouc >
                    <span class="form-text text-muted"> Only file <code>jpg</code>, <code>png</code> and <code>jpeg</code> extensions are allowed. Max size file 1MB</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="font-weight-semibold">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo @$row->username;?>" required <?php echo $sub_menu != 'Edit' ? '' : 'readonly';?>>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email aktif" value="<?php echo @$row->email;?>" required <?php echo $sub_menu != 'Edit' ? '' : 'readonly';?>> 
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="<?php echo @$row->name;?>" required >
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan No HP " value="<?php echo @$row->phone_number;?>" required >
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">User Role</label>
                <select class="form-control" id="roleid" name="roleid" value="<?php echo @$row->roleid;?>" required >
                    <option value="">Choose One</option>
                    <?php
                        foreach ($roles as $r) {
                            $selected = $r->roleid == @$row->roleid ? 'selected' : '';
                            echo "<option $selected value='$r->roleid'>$r->desc</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Status Users</label>
                <div class="form-check form-check-switchery">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-input-switchery" <?= !empty($row->is_active) == '1' ? 'checked' : '';?> data-fouc value="1" name="is_active" id="is_active">
                        Active
                    </label>
                </div>
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
                <button type="submit"  id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit"  id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
</form>

