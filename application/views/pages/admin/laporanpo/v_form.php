<?php
$roles = get_data('roles', '*')->result();
?>
<form action="<?php echo $action_form ?>" method="post" class="form-ajax" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label class="font-weight-semibold">Nomor PO</label>
                <input type="text" class="form-control" id="no_po" name="no_po" placeholder="Masukkan nomor" value="<?php echo @$row->no_po; ?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Mitra</label>
                <!-- <input list="mitras" class="form-control" id="mitra" name="mitra" placeholder="Masukkan nama mitra" value="<?php echo @$row->mitra; ?>" required> -->
                <select name="mitra" id="mitra" class="form-control" required>
                    <option value="" disabled selected>Pilih mitra</option>
                    <?php foreach ($datamitra as $m) : ?>
                        <option value="<?= $m->username; ?>" <?= (@$row->mitra == $m->username ? "selected" : ""); ?>><?= $m->username; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Pengiriman</label>
                <input type="date" class="form-control" id="pengiriman" name="pengiriman" placeholder="tanggal kirim" value="<?php echo @$row->pengiriman; ?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan pengiriman" value="<?php echo @$row->jumlah; ?>">
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Bisa Kirim</label>
                <input type="date" class="form-control" id="bisa_kirim" name="bisa_kirim" placeholder="tanggal bisa kirim" value="<?php echo @$row->bisa_kirim; ?>" required>
            </div>
            <div class="form-group">
                <label class="font-weight-semibold">Diterima</label>
                <input type="date" class="form-control" id="diterima" name="diterima" placeholder="tanggal diterima" value="<?php echo @$row->diterima; ?>" required>
            </div>



            <br />
            <div class="form-group">
                <input type="hidden" name="<?= $csrf['name']; ?>" id="csrf" value="<?= $csrf['hash']; ?>" />
                <input type="hidden" name="submit" id="submit-type" value="submit" />
                <button type="submit" id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit" id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
</form>