<div class="row">
    <div class="col-sm-12">
        <h4 class="header-title m-t-0 m-b-20">Data tour
             <a href="?hal=wisata_olah" class="btn btn-primary btn-sm" style="float:right;margin-top:0px;">Tambah Data</a>
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
                        <th>Kategori </th>
                        <th>Lokasi </th>
                        <th>Keterangan </th>
                        <th>Gambar </th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT * from tb_tour join tb_location on location_id=tour_location";
                    $result=$mysqli->query($query);
                    $num_result=$result->num_rows;
                    if ($num_result > 0 ) { 
                        while ($data=mysqli_fetch_assoc($result)) {
                        extract($data);
                    ?>
                        <tr>
                        <td><?php echo $tour_id; ?></td>
                        <td><?php echo $tour_name; ?></td> 
                        <td><?php echo $tour_category; ?></td>
                        <td><?php echo $location_name; ?></td>
                        <td><?php echo $tour_information; ?></td>                     
                        <td><img height="75px" height="75px" src=<?php echo "../assets/pict_tour/small_".$tour_photo; ?>></td> 
                        <td>
                             <a href="?hal=wisata_olah&id=<?php echo $tour_id; ?>" 
                                class="btn btn-icon btn-primary" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                            <a class="btn btn-danger" title="Hapus Data" href="wisata_proses.php?hapus=<?php echo $tour_id;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>