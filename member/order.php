<section class="content-header">
  <h3>
    <i class="pe-7s-id icon-title"></i>&nbsp; Data Order Pesanan
</h3>
</section>

<div class="panel panel-danger" style="background-color: blue; height: 4px;">
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="content">
        <div class="toolbar">

        </div>
        <div class="panel panel-default">

          <div class="panel-body">
            <div class="table-responsive">

              <div class="fresh-datatables">
                <table id="example" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead class="thead-inverse">
                    <tr class="odd gradeX">
                      <th>No</th>
                      <th>Kode </th>
                      <th>Tanggal </th>
                      <th>Reservasi </th>
                      <th>Paket </th>
                      <th>Jumlah </th>
                      <th>Biaya </th>
                      <th>Total </th>
                      <th>Status </th>
                      <th class="disabled-sorting text-right">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                $kodemember=$_SESSION['member'];
                $query="SELECT * from tb_order join tb_packcage on packcage_id=order_packcage where order_status='Pending' and order_member='$kodemember'";
                $result=$mysqli->query($query);
                $num_result=$result->num_rows;
                if ($num_result > 0 ) { 
                    while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                        ?>

                        <tr class="odd gradeX">
                            <td width='50' class="center"><?php echo $no; ?></td>
                            <td><?php echo $order_id; ?></td>
                            <td><?php echo tgl_indo($order_date); ?></td>
                            <td><?php echo tgl_indo($order_reservasi); ?></td>  
                            <td><?php echo $packcage_name; ?></td>
                            <td><?php echo $order_count; ?></td>
                            <td><?php echo number_format($order_price); ?></td>
                            <td><?php echo number_format($order_total); ?></td>
                            <td><?php echo $order_status; ?></td>

                            <td class="text-right">
                              <a href="?hal=order_konfirmasi&id=<?php echo $order_id; ?>"  class="btn btn-simple btn-warning btn-icon edit"><i rel="tooltip" title="Ubah" class="fa fa-edit"></i></a>
                              <a href="order_proses.php?hapus=<?php echo $order_id;?>"  class="confirm" ><button rel="tooltip" title="Hapus" class="btn btn-simple btn-danger btn-icon remove btn-sm"><i class="fa fa-trash-o fa-lg"></i></button></a>
                          </td>
                      </tr>
                      <?php $no++; }} ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</div>
</div>
<!-- End Advanced Tables -->
</div>
</div>