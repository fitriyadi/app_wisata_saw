<script src="../assets/ckeditor/ckeditor.js"></script>

<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_packcage","packcage_id='$kode'"));

}else{
    $packcage_id=KodeOtomatis($mysqli,"tb_packcage","packcage_id","PK","2","3");;
    $packcage_name="";
    $packcage_hotel="";
    $packcage_armada="";
    $packcage_date="";
    $packcage_long_tour="";
    $packcage_price="";
    $packcage_amount="";
    $packcage_detail="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data Paket Wisata</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="paket_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Paket</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $packcage_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama Paket</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama packcage" value="<?php echo $packcage_name; ?>" required>
                        </div>
                    </div> 

                    <!-- <div class="form-group row">
                        <label class="col-sm-2 control-label">Armada</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="armada">
                            <?php 
                             $query="SELECT * from tb_armada";
                            $result=$mysqli->query($query);
                            $num_result=$result->num_rows;
                            if ($num_result > 0 ) { 
                                while ($data=mysqli_fetch_assoc($result)) {
                            ?>
                                 <option value="<?php echo $data['armada_id']; ?>" <?php echo  pilihselect($packcage_armada,$data['armada_name']) ?>><?php echo $data['armada_name']; ?></option>

                            <?php }}?>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Hotel</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="hotel">
                            <?php 
                             $query="SELECT * from tb_hotel";
                            $result=$mysqli->query($query);
                            $num_result=$result->num_rows;
                            if ($num_result > 0 ) { 
                                while ($data=mysqli_fetch_assoc($result)) {
                            ?>
                                 <option value="<?php echo $data['hotel_id']; ?>" <?php echo  pilihselect($packcage_hotel,$data['hotel_name']) ?>><?php echo $data['hotel_name']; ?></option>

                            <?php }}?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Lama Tour</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="lama" placeholder="Lama tout" value="<?php echo $packcage_long_tour; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?php echo $packcage_price; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-4 form-control-label">Gambar</label>
                        <div class="col-sm-2">
                            <?php (!isset($_GET['id'])) ? $gambar="":$gambar="../assets/pict_packcage/small_".$packcage_id.".jpg"; ?>
                            <img src="<?php echo $gambar ?>">
                        </div>
                        <div class="col-sm-7">
                            <input type="file" class="filestyle" name="gambar" data-buttonname="btn-default">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="text-ckeditor" rows="8" required><?php echo $packcage_detail; ?></textarea>
                        <script>CKEDITOR.replace('text-ckeditor');</script>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Wisata</label>
                    
                    </div>

                    <div class="form-group row">
                    <?php
                    $query="SELECT * from tb_tour";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>

                    <div class="col-sm-6">
                        <div class="checkbox checkbox-success">
                            <input type="checkbox" name="wisata[<?php echo $tour_id  ?>]">
                            <label>
                                <?php echo $tour_name; ?>
                            </label>
                        </div>
                    </div>

                    <?php  }}?>
                </div>  

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=packcage" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>