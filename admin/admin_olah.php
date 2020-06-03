<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_admin","admin_id='$kode'"));

}else{
    $admin_id=KodeOtomatis($mysqli,"tb_admin","admin_id","A","1","2");;
    $admin_name="";
    $admin_username="";
    $admin_password="";
    $admin_email="";
    $admin_status="";
}
?>

<div class="row">
    <div class="col-lg-12">
            <h4 class="header-title m-t-0">Olah Data admin</h4>

            <div class="p-20 m-b-20">
                <form role="form" class="form-validation" action="admin_proses.php" method="post" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Kode Admin</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $admin_id; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Nama admin</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" placeholder="Nama admin" value="<?php echo $admin_name; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $admin_username; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $admin_password; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hori-pass1" class="col-sm-2 form-control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $admin_email; ?>" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="status">
                                <option value="Admin" <?php echo  pilihselect($admin_status,"Admin"); ?>> Admin</option>
                                <option value="Pemilik" <?php echo  pilihselect($admin_status,"Pemilik"); ?>> Pemilik</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-8 col-sm-offset-4">
                            <input type="submit" class="btn btn-primary" 
                            name="<?php echo  isset($_GET['id']) ? 'ubah' : 'tambah'; ?>" value="Simpan">
                            <a href="?hal=admin" class="btn btn-default waves-effect m-l-5">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</div>