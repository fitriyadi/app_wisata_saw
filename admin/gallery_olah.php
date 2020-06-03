<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_gallery","gallery_id='$kode'"));

}else{
    $gallery_id=KodeOtomatis($mysqli,"tb_gallery","gallery_id","GL","2","3");
    $gallery_name="";
    $gallery_photo="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data gallery</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="gallery_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Aramad</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $gallery_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama gallery</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama gallery" value="<?php echo $gallery_name; ?>" required>
                        </div>
                    </div> 


                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-4 form-control-label">Gambar</label>
                        <div class="col-sm-2">
                            <?php (!isset($_GET['id'])) ? $gambar="":$gambar="../assets/pict_gallery/small_".$gallery_photo; ?>
                            <img src="<?php echo $gallery_photo ?>">
                        </div>
                        <div class="col-sm-7">
                            <input type="file" class="filestyle" name="gambar" data-buttonname="btn-default">
                        </div>
                    </div> 


                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=gallery" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>