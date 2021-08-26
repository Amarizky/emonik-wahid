<div class="row">
    <div class="col-12">
        <form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="font-weight-semibold">Logo</label>
                        <?php if(!empty($row->logo)): ?>
                            <!-- edit -->
                            <input type="file" name="logo" id="logo" class="file-input-overwrite" url_file="<?=!empty($row->logo) ? base_url().'/assets/logo/'.$row->logo : ''?>" caption="<?=!empty($row->logo) ? $row->logo : ''?>" data-show-caption="false" data-show-upload="false"  data-fouc  />
                            <span class="form-text text-muted"> Only file <code>jpg</code>, <code>png</code> and <code>jpeg</code> extensions are allowed. Max size file 1MB</span>
                        <?php else: ?>
                            <!-- insert -->
                            <input type="file" name="logo" id="logo" class="file-input-extensions" data-show-caption="false" data-show-upload="false"  data-fouc required >
                            <span class="form-text text-muted"> Only file <code>jpg</code>, <code>png</code> and <code>jpeg</code> extensions are allowed. Max size file 1MB</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo @$row->name;?>" required>
                    </div>

                    <div class="form-group">
                        <label>Company Desc</label>
                        <textarea name="desc" id="desc" cols="30" class="form-control" required><?php echo @$row->desc;?></textarea>
                    </div>

                    <div class="form-check form-check-switchery">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-input-switchery" <?= !empty($row->is_active) == '1' ? 'checked' : '';?> data-fouc value="1" name="is_active" id="is_active">
                            Active
                        </label>
                    </div>
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
    </div>
</div>
