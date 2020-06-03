<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_order join tb_packcage on order_packcage=packcage_id","order_id='$kode'"));
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Konfirmasi</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="order_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Order</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $order_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal" placeholder="Nama admin" value="<?php echo $order_date; ?>" readonly>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Paket Tour</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="paket" placeholder="Username" value="<?php echo $packcage_name; ?>" readonly>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Total</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="paket" placeholder="Username" value="<?php echo number_format($order_total); ?>" readonly>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama Bank</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="bank">
                                 <option value="BCA">BCA</option>
                                 <option value="Mandiri">Mandiri</option>
                                 <option value="BRI">BRI</option>
                                 <option value="BNI">BNI</option>
                                 <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Atas Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="atasnama" placeholder="Nama Pemilik" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">No Rekening</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="norek" placeholder="No rekening" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Gambar</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="gambar" placeholder="No rekening" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="tambah" value="Simpan">
                            <a href="?hal=admin" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>