<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data Admin
             <a href="?hal=admin_olah" class="btn btn-primary btn-sm" style="float:right;margin-top:0px;">Tambah Data</a>
        </h4>

    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive m-b-20">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id Admin</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_admin";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                        <tr>
                        <td><?php echo $admin_id; ?></td>
                        <td><?php echo $admin_name; ?></td>
                        <td><?php echo $admin_username; ?></td>
                        <td><?php echo $admin_password; ?></td> 
                        <td><?php echo $admin_email; ?></td>
                        <td><?php echo $admin_status; ?></td>
                        <td>
                             <a href="?hal=admin_olah&id=<?php echo $admin_id; ?>" 
                                class="btn btn-icon btn-primary" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                            <a class="btn btn-danger" title="Hapus Data" href="admin_proses.php?hapus=<?php echo $admin_id;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                        </td>                     
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>