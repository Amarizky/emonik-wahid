<div class="row">
    <div class="col-sm-6">
        <form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
            <div class="form-group">
                <label>Menu Name</label>
                <input type="text" class="form-control" id="menuname" name="menuname" placeholder="" value="<?php echo @$row->menuname;?>" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">Choose One</option>
                    <option value="Web" <?=@$row->category == 'Web' ? 'selected' : '';?>>Web</option>
                    <option value="Mobile" <?=@$row->category == 'Mobile' ? 'selected' : '';?>>Mobile</option>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <input type="hidden" name="<?=$csrf['name'];?>" id="csrf" value="<?=$csrf['hash'];?>" />
                <input type="hidden" name="submit" id="submit-type" value="submit" />
                <button type="submit"  id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 mb-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit"  id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 mb-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
