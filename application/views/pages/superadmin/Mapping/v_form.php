<?php 
    $menus = get_data('menus', 'menuid, menuname, category')->result();
?>
<div class="row">
    <div class="col-sm-6">
        <form action="<?php echo $action_form?>" method="post" class="form-ajax " enctype="multipart/form-data" >
            
            <div class="form-group">
                <label>Pilih Menu</label>
                <select name="menuid" id="menuid" class="form-control select-search" required>
                    <option value="">Pilih salah satu</option>
                    <?php
                    foreach ($menus as $r) {
                        echo "<option  value='$r->menuid'>$r->menuname ($r->category)</value>";
                    }
                    ?>
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
