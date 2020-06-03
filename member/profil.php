<?php
$kode=$_SESSION['member'];
extract(ArrayData($mysqli,"tb_member","member_id='$kode'"));
?>

<div class="row">
    <div class="col-md-12">     
        <section class="content-header">
            <div class="pull-right">    
                <ol class="breadcrumb">
                    <li><a href="index.php?hal=beranda" style="color: black"><i class="pe-7s-culture"></i> Dashboard </a></li>

                    <li class="active"> Profil Admin </li>
                </ol>
            </div>
            <h4>
                <i class="fa fa-edit icon-title"> </i>&nbsp; Profil Admin
            </h4>
        </section>
    </div>
</div>

<div class="card">
    <div class="panel panel-danger" style="background-color: red; height: 4px;">
    </div>
    <div class="header">
    </div>
    <form role="form" class="form-validation" action="profil_proses.php" method="post" enctype="multipart/form-data">

        <div class="content">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3">Nama</label>
                                <input type="text" class="form-control" name="username" maxlength="4" placeholder="Kode" value="<?php echo $member_name; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3">Username</label>
                                <input type="text" class="form-control" name="username" maxlength="4" placeholder="Kode" value="<?php echo $member_username; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3">No Telpon</label>
                                <input type="text" class="form-control" name="telpon" maxlength="4" placeholder="Kode" value="<?php echo $member_phone; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3">Password Lama</label>
                                <input type="password" class="form-control" name="passwordlama" placeholder="Password Lama" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">Password Baru</label>
                                <input type="password" class="form-control" name="password" placeholder="Password Baru" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-fill btn-fill btn-primary" name="ubah" value="Simpan"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>