<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data Konfirmasi
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
                        <th>Bank </th>
                        <th>Atas Nama </th>
                        <th>Status </th>
                        <th>Total</th>
                        <th width="20%">Aksi </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_order join tb_packcage on order_packcage=packcage_id join tb_member on member_id=order_member join tb_confirmation on order_id=confirmation_order";
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
                        <td><?php echo $confirmation_bank_name; ?></td>   
                        <td><?php echo $confirmation_bank_user; ?></td>
                        <td><?php echo $order_status; ?></td> 
                        <td><?php echo number_format($order_total); ?></td> 
                        <td>
                        <a href="../assets/pict_konfirmasi/<?php echo $confirmation_file; ?>" 
                                class="btn btn-icon btn-primary" title="Downlod Data" target="_blank"><i class="fa fa-download"></i> </a> 
                        <?php if ($order_status == 'Konfirmasi'){ ?>
                        <a class="btn btn-primary" title="Ubah Data" href="konfirmasi_proses.php?valid=<?php echo $order_id;?>" 
                            onclick="return confirm('Apakah data konfirmasi VALID?')"> <i class="fa fa-check"></i></a>

                            <a class="btn btn-danger" title="Ubah Data" href="konfirmasi_proses.php?tidakvalid=<?php echo $order_id;?>" 
                                                 onclick="return confirm('Apakah data konfirmasi TIDAK VALID?')"> <i class="fa fa-exclamation-triangle"></i></a> 
                        <?php } ?>
                    </td>          
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>