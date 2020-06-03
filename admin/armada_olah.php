<script src="../assets/ckeditor/ckeditor.js"></script>

<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_armada","armada_id='$kode'"));

}else{
    $armada_id=KodeOtomatis($mysqli,"tb_armada","armada_id","AR","2","3");;
    $armada_name="";
    $armada_category="";
    $armada_photo="";
    $armada_information="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data Armada</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="armada_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Aramad</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $armada_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama Armada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Armada" value="<?php echo $armada_name; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="kategori">
                                <option value="Mini Bus" <?php echo  pilihselect($armada_category,"Mini Bus") ?>>Mini Bus</option>
                                <option value="Bus" <?php echo  pilihselect($armada_category,"Bus") ?>>Bus</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-4 form-control-label">Gambar</label>
                        <div class="col-sm-2">
                            <?php (!isset($_GET['id'])) ? $gambar="":$gambar="../assets/pict_armada/small_".$armada_photo; ?>
                            <img src="<?php echo $armada_photo ?>">
                        </div>
                        <div class="col-sm-7">
                            <input type="file" class="filestyle" name="gambar" data-buttonname="btn-default">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="text-ckeditor" rows="8" required><?php echo $armada_information; ?></textarea>
                        <script>CKEDITOR.replace('text-ckeditor');</script>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=armada" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>