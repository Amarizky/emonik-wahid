<?php
$roles = get_data('roles', '*')->result();
?>
<form action="<?php echo $action_form ?>" method="post" class="form-ajax" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg">

            <div class="form-group">
                <label class="font-weight-semibold">Mitra</label>
                <input type="text" class="form-control" id="mitra" name="mitra" placeholder="Masukkan nama" value="<?php echo @$row->mitra; ?>" required>
            </div>
            <label class="font-weight-semibold">Material 1</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan1" name="bahan1" placeholder="Masukkan nama bahan 1" value="<?php echo @$row->bahan1; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan1" name="stokbahan1" placeholder="Masukkan stok bahan 1" value="<?php echo (@$row->stokbahan1 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton1" id="kgton1" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 2</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan2" name="bahan2" placeholder="Masukkan nama bahan 2" value="<?php echo @$row->bahan2; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan2" name="stokbahan2" placeholder="Masukkan stok bahan 2" value="<?php echo (@$row->stokbahan2 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton2" id="kgton2" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 3</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan3" name="bahan3" placeholder="Masukkan nama bahan 3" value="<?php echo @$row->bahan3; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan3" name="stokbahan3" placeholder="Masukkan stok bahan 3" value="<?php echo (@$row->stokbahan3 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton3" id="kgton3" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 4</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan4" name="bahan4" placeholder="Masukkan nama bahan 4" value="<?php echo @$row->bahan4; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan4" name="stokbahan4" placeholder="Masukkan stok bahan 4" value="<?php echo (@$row->stokbahan4 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton4" id="kgton4" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 5</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan5" name="bahan5" placeholder="Masukkan nama bahan 5" value="<?php echo @$row->bahan5; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan5" name="stokbahan5" placeholder="Masukkan stok bahan 5" value="<?php echo (@$row->stokbahan5 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton5" id="kgton5" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 6</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan6" name="bahan6" placeholder="Masukkan nama bahan 6" value="<?php echo @$row->bahan6; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan6" name="stokbahan6" placeholder="Masukkan stok bahan 6" value="<?php echo (@$row->stokbahan6 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton6" id="kgton6" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : "") ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <label class="font-weight-semibold">Material 7</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="bahan7" name="bahan7" placeholder="Masukkan nama bahan 7" value="<?php echo @$row->bahan7; ?>" required>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="stokbahan7" name="stokbahan7" placeholder="Masukkan stok bahan 7" value="<?php echo (@$row->stokbahan7 * 1000); ?>" required>
                </div>
                <div class="col-2">
                    <select name="kgton7" id="kgton7" class="form-control" required>
                        <option value="" selected disabled>Pilih</option>
                        <option value="ton">Ton</option>
                        <option value="kg" <?= ($sub_menu == "Edit" ? "selected" : ""); ?>>Kilogram</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <input type="hidden" name="<?= $csrf['name']; ?>" id="csrf" value="<?= $csrf['hash']; ?>" />
                <input type="hidden" name="submit" id="submit-type" value="submit" />
                <button type="submit" id="submit" value="submit" class="btn bg-transparent text-blue border-blue ml-2 btn-submit" onclick="(function(){$('#submit-type').val('submit');return true;})();return true;">Submit<i class="icon-paperplane ml-2"></i></button>
                <button type="submit" id="submit-back" value="submit-back" class="btn bg-transparent text-blue border-blue ml-2 btn-submit-back" onclick="(function(){$('#submit-type').val('submit-back');return true;})();return true;">Submit & Back<i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>
</form>