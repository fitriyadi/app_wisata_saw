<?php
if (isset($_GET['id'])){
    $kode=$_GET['id'];
    extract(ArrayData($mysqli,"tb_order join tb_packcage on order_packcage=packcage_id","order_id='$kode'"));
    $totalmenu=0;
    $totalfasilitas=0;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <div class="clearfix">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                    <h3 class="m-0">#<?php echo $order_id; ?></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xs-6">
                        <h5>Info Pelanggan</h5>
                        <address class="line-h-24">
                            <?php echo caridata($mysqli,"SELECT member_name from tb_member where member_id='$order_member'"); ?><br>
                            <?php echo caridata($mysqli,"SELECT member_ktp_no from tb_member where member_id='$order_member'"); ?><br>
                            <?php echo caridata($mysqli,"SELECT member_addres from tb_member where member_id='$order_member'"); ?><br>
                            <abbr title="Phone"></abbr><?php echo caridata($mysqli,"SELECT member_phone from tb_member where member_id='$order_member'"); ?>
                        </address>
                </div><!-- end col -->

                    <div class="col-sm-3 col-sm-offset-3 col-xs-4 col-xs-offset-2">
                        <div class="m-t-30 pull-right">
                            <p><small><strong>Tanggal Pesan: </strong></small><?php echo $order_date; ?></p>
                            <p><small><strong>Tanggal Reservasi : </strong></small><?php echo $order_reservasi;; ?></p>
                            <p><small><strong>Status : </strong></small><?php echo $order_status; ?></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                        <th>Paket</th>
                                        <th align="right">Jumlah</th>
                                        <th align="right">Harga</th>
                                        <th align="right">Total</th>
                                    </tr></thead>
                                    <tbody>
                                        <!-- Data Paket -->
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <b><?php echo $packcage_name ?></b> <br/>
                                            </td>
                                            <td>
                                                <?php echo $order_count ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($order_price) ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($order_total) ?>
                                            </td>
                                        </tr>
                                        <!-- Akhir  Data Paket -->

                                         <!-- Tambahan Menu -->
                                        <?php 
                                        $query="SELECT * from tb_packcage_detail join tb_tour on packcage_tour=tour_id where packcage_id='$packcage_id'";
                                        $result=$mysqli->query($query);
                                        $num_result=$result->num_rows;
                                        if ($num_result > 0 ) { 
                                            $no=1;
                                            while ($data=mysqli_fetch_assoc($result)) {
                                            extract($data);
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <b><?php echo $tour_name ?></b> 
                                            </td>
                                            <td class="text-right"></td>
                                        </tr>
                                        <?php      
                                            } }
                                        ?>
                                         <!-- Akhir Menu -->
                                          <tr>
                                            <td colspan="5"><b>Total Harga</b> </td>
                                        </tr>

                                       
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="clearfix p-t-50">
                                <h5 class="text-muted">Notes:</h5>
                                <small>
                                    Maksimal batas waktu hanya pada hari yang sama, dari waktu booking.
                                    <h5>Silahkan Transfer No Rekening :1234568 Atas Nama PT. Tour And Travel</h5>
                                </small>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                            <div class="pull-right">
                                <h3>Rp. <?php echo number_format($order_price); ?></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="hidden-print m-t-30 m-b-30">
                        <div class="text-right">
                            
                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- end row -->