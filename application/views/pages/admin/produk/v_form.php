<?php
    $roles = get_data('roles', '*')->result();
?>
<form action="<?php echo $action_form?>" method="post" class="form-ajax" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label class="font-weight-semibold">kode produk</label>
                <input type="text" class="form-control" id="kode_produksi" name="kode_produksi" placeholder="Masukkan nama produk" value="<?php echo @$row->kode_produksi;?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Jumlah produk</label>
                <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Masukkan jumlah" value="<?php echo @$row->kode_produk;?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">tanggal produksi </label>
                <input type="text" class="form-control" id="tanggal_produksi" name="tanggal_produksi" placeholder="tanggal" value="<?php echo @$row->tanggal_produksi;?>" required> 
                 </div>
                 <div class="form-group">
                <label class="font-weight-semibold">Mitra </label>
                <input type="text" class="form-control" id="createby" name="createby" placeholder="tanggal" value="<?php echo @$row->createby;?>" required> 
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

