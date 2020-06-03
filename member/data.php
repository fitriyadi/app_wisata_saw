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

                    <li class="active"> Data Member </li>
                </ol>
            </div>
            <h4>
                <i class="fa fa-edit icon-title"> </i>&nbsp; Data Member
            </h4>
        </section>
    </div>
</div>

<div class="card">
    <div class="panel panel-danger" style="background-color: blue; height: 4px;">
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
                                <input type="text" class="form-control" name="telpon" placeholder="No Telpon" value="<?php echo $member_phone; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3">No KTP</label>
                                <input type="text" class="form-control" name="ktp" placeholder="No KTP" value="<?php echo $member_ktp_no; ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" value="<?php echo $member_location; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Lahir" value="<?php echo $member_birth; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $member_addres; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hori-pass1">jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                   <option value="L">L</option>
                                   <option value="P">P</option>
                               </select>
                           </div>
                       </div>
                   </div>

                   <div class="form-group">
                    <button type="submit" class="btn btn-fill btn-primary" name="simpan" value="Simpan"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>