<script src="../assets/ckeditor/ckeditor.js"></script>

<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_tour","tour_id='$kode'"));

}else{
    $tour_id=KodeOtomatis($mysqli,"tb_tour","tour_id","WT","2","3");;
    $tour_name="";
    $tour_category="";
    $tour_location="";
    $tour_photo="";
    $tour_information="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data Wisata</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="wisata_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Wisata</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $tour_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama Wsata</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama tour" value="<?php echo $tour_name; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="kategori">
                                <option value="Pantai" <?php echo  pilihselect($tour_category,"Pantai") ?>>Pantai</option>
                                <option value="Agrowisata" <?php echo  pilihselect($tour_category,"Agrowisata") ?>>Agrowisata</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Lokasi</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="lokasi">
                            <?php 
                             $query="SELECT * from tb_location";
                            $result=$mysqli->query($query);
                            $num_result=$result->num_rows;
                            if ($num_result > 0 ) { 
                                while ($data=mysqli_fetch_assoc($result)) {
                            ?>
                                 <option value="<?php echo $data['location_id']; ?>" <?php echo  pilihselect($tour_location,$data['location_name']) ?>><?php echo $data['location_name']; ?></option>

                            <?php }}?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-4 form-control-label">Gambar</label>
                        <div class="col-sm-2">
                            <?php (!isset($_GET['id'])) ? $gambar="":$gambar="../assets/pict_tour/small_".$tour_photo; ?>
                            <img src="<?php echo $tour_photo ?>">
                        </div>
                        <div class="col-sm-7">
                            <input type="file" class="filestyle" name="gambar" data-buttonname="btn-default">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="text-ckeditor" rows="8" required><?php echo $tour_information; ?></textarea>
                        <script>CKEDITOR.replace('text-ckeditor');</script>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=tour" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>