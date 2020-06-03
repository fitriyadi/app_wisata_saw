<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data Packcage
             <a href="?hal=paket_olah" class="btn btn-primary btn-sm" style="float:right;margin-top:0px;">Tambah Data</a>
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
                        <th>Nama </th>
                        <!-- <th>Armada </th> -->
                        <th>Hotel </th>
                        <th>Lama </th>
                        <th>Harga </th>
                        <th>Jumlah </th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_packcage
                            join tb_armada on armada_id=packcage_armada
                            join tb_hotel on hotel_id=packcage_hotel";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                        <tr>
                        <td><?php echo $packcage_id; ?></td>
                        <td><?php echo $packcage_name; ?></td> 
                        <!-- <td><?php echo $armada_name; ?></td> -->
                        <td><?php echo $hotel_name; ?></td>  
                        <td><?php echo $packcage_long_tour." Hari"; ?></td>
                        <td><?php echo number_format($packcage_price,0); ?></td>
                        <td><?php echo $packcage_amount; ?></td>                 
                        <td>
                             <a href="?hal=paket_olah&id=<?php echo $packcage_id; ?>" 
                                class="btn btn-icon btn-primary" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                            <a class="btn btn-danger" title="Hapus Data" href="paket_proses.php?hapus=<?php echo $packcage_id;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
function listhotel($mysqli,$kode){
    $hasil="";
    $query="SELECT * from tb_packcage_detail join tb_tour on packcage_tour=tour_id where packcage_id='$kode'";
    $result=$mysqli->query($query);
    $num_result=$result->num_rows;
    $no=0;
    if ($num_result > 0 ) { 
        while ($data=mysqli_fetch_assoc($result)) {
            extract($data);
            $hasil=$hasil.($no+=1).". ".$tour_name."<br>";
        }
    }

    return $hasil;
}
?>