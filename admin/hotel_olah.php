<script src="../assets/ckeditor/ckeditor.js"></script>

<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_hotel","hotel_id='$kode'"));

}else{
    $hotel_id=KodeOtomatis($mysqli,"tb_hotel","hotel_id","HT","2","3");;
    $hotel_name="";
    $hotel_rate="";
    $hotel_photo="";
    $hotel_information="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data hotel</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="hotel_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Hotel</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $hotel_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama hotel</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama hotel" value="<?php echo $hotel_name; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Rate Hotel</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="rate">
                                <option value="1" <?php echo  pilihselect($hotel_rate,"1") ?>>1</option>
                                <option value="2" <?php echo  pilihselect($hotel_rate,"2") ?>>2</option>
                                <option value="3" <?php echo  pilihselect($hotel_rate,"3") ?>>3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-4 form-control-label">Gambar</label>
                        <div class="col-sm-2">
                            <?php (!isset($_GET['id'])) ? $gambar="":$gambar="../assets/pict_hotel/small_".$hotel_photo; ?>
                            <img src="<?php echo $hotel_photo ?>">
                        </div>
                        <div class="col-sm-7">
                            <input type="file" class="filestyle" name="gambar" data-buttonname="btn-default">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="text-ckeditor" rows="8" required><?php echo $hotel_information; ?></textarea>
                        <script>CKEDITOR.replace('text-ckeditor');</script>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=hotel" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>