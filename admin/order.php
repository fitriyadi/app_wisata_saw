<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data Order / Pemesanan
        </h4>

    </div>
</div> <!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive m-b-20">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode </th>
                        <th>Tanggal </th>
                        <th>Paket </th>
                        <th>Nama Member </th>
                        <th>No Telpon </th>
                        <th>Total </th>
                        <th>Status </th>
                        <th>Aksi </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_order join tb_packcage on order_packcage=packcage_id join tb_member on member_id=order_member";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                        <tr>
                        <td><?php echo $order_id; ?></td>
                        <td><?php echo $order_date; ?></td> 
                        <td><?php echo $packcage_name; ?></td>
                        <td><?php echo $member_name; ?></td>
                        <td><?php echo $member_phone; ?></td>
                        <td><?php echo number_format($order_total); ?></td>
                        <td><?php echo $order_status; ?></td> 
                        <td>
                             <a href="?hal=order_view&id=<?php echo $order_id; ?>" 
                                class="btn btn-icon btn-primary" title="View"><i class="fa fa-eye"></i></a>

                            <a class="btn btn-danger" title="Hapus Data" href="order_proses.php?hapus=<?php echo $order_id;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                        </td>                    
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>