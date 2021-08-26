<?php
    $roles = get_data('roles', '*')->result();
?>
<form action="<?php echo $action_form?>" method="post" class="form-ajax" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label class="font-weight-semibold">Product Name</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama" value="<?php echo @$row->nama_produk;?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Product Code</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan nama" value="<?php echo @$row->kode_produk;?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Material 1</label>
                <input type="text" class="form-control" id="bahan1" name="bahan1" placeholder="Masukkan nama bahan 1" value="<?php echo @$row->bahan1;?>" required> 
                <input type="number" class="form-control" id="presentase_bahan_baku1" name="presentase_bahan_baku1" placeholder="Masukkan persentase bahan 1" value="<?php echo @$row->presentase_bahan_baku1;?>" required> 
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Material 2</label>
                <input type="text" class="form-control" id="bahan2" name="bahan2" placeholder="Masukkan nama bahan 2" value="<?php echo @$row->bahan2;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku2" name="presentase_bahan_baku2" placeholder="Masukkan persentase bahan 2" value="<?php echo @$row->presentase_bahan_baku2;?>"> 
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Material 3</label>
                <input type="text" class="form-control" id="bahan3" name="bahan3" placeholder="Masukkan nama bahan 3" value="<?php echo @$row->bahan3;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku3" name="presentase_bahan_baku3" placeholder="Masukkan persentase bahan 3" value="<?php echo @$row->presentase_bahan_baku3;?>"> 
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Material 4</label>
                <input type="text" class="form-control" id="bahan4" name="bahan4" placeholder="Masukkan nama bahan 4" value="<?php echo @$row->bahan4;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku4" name="presentase_bahan_baku4" placeholder="Masukkan persentase bahan 4" value="<?php echo @$row->presentase_bahan_baku4;?>"> 
            </div>
            <div class="form-group">
            <label class="font-weight-semibold">Material 5</label>
                <input type="text" class="form-control" id="bahan5" name="bahan5" placeholder="Masukkan nama bahan 5" value="<?php echo @$row->bahan5;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku5" name="presentase_bahan_baku5" placeholder="Masukkan persentase bahan 5" value="<?php echo @$row->presentase_bahan_baku5;?>"> 
            </div>
            <div class="form-group">
            <label class="font-weight-semibold">Material 6</label>
                <input type="text" class="form-control" id="bahan6" name="bahan6" placeholder="Masukkan nama bahan 6" value="<?php echo @$row->bahan6;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku6" name="presentase_bahan_baku6" placeholder="Masukkan persentase bahan 6" value="<?php echo @$row->presentase_bahan_baku6;?>"> 
            </div>
            <div class="form-group">
            <label class="font-weight-semibold">Material 7</label>
                <input type="text" class="form-control" id="bahan7" name="bahan7" placeholder="Masukkan nama bahan 7" value="<?php echo @$row->bahan7;?>"> 
                <input type="number" class="form-control" id="presentase_bahan_baku7" name="presentase_bahan_baku7" placeholder="Masukkan persentase bahan 7" value="<?php echo @$row->presentase_bahan_baku7;?>"> 
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

