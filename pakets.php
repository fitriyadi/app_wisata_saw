	<?php
	$tanggal=date('Y-m-d');
    $query="SELECT * from tb_packcage
                            join tb_armada on armada_id=packcage_armada
                            join tb_hotel on hotel_id=packcage_hotel";

    $result=$mysqli->query($query);
    $num_result=$result->num_rows;
    if ($num_result > 0 ) { 
        while ($data=mysqli_fetch_assoc($result)) {
        extract($data);
                    ?>

<p class="wow fadeInUp animated" data-wow-delay=".5s">#<?php echo $packcage_name; ?>   <a href="pesan_paket.php?id=<?php echo $packcage_id; ?>"><span class="label label-primary">Pilih Paket</span></a> </p> 
<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Informasi</th>
				<th>Armada</th>
				<th>Hotel</th>
				<th>Wisata</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				Harga : <b><?php echo number_format($packcage_price,0); ?> </b> <br>
				Tanggal Tour : <b><?php echo tgl_indo($packcage_date); ?> </b> <br>
				Kapasistas :  <b><?php echo $packcage_amount; ?> </b> Orang <br>
				Lama Perjalanan :  <b><?php echo $packcage_long_tour; ?> </b>Hari <br>
				</td>

				<td>
				Nama : <b><?php echo $armada_name; ?> </b> <br>
				Jenis :  <b><?php echo $armada_category; ?> </b> <br>
				<img src="assets/pict_armada/<?php echo $armada_photo;;?>" width="250">
				</td>
				
				<td>
				Nama : <b><?php echo $hotel_name; ?> </b> <br>
				Rate :  <b><?php echo $hotel_rate; ?> </b> <br>
				<img src="assets/pict_hotel/<?php echo $hotel_photo;;?>" width="250">
				</td>
				
				<td>
					<?php echo  listhotel($mysqli,$packcage_id); ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
	<div class="clearfix"> </div>
	<hr>
<?php }} 

function listhotel($mysqli,$kode){
	$hasil="";
	$query="SELECT * from tb_packcage_detail join tb_tour on packcage_tour=tour_id where packcage_id='$kode'";
	$result=$mysqli->query($query);
	$num_result=$result->num_rows;
	$no=0;
	if ($num_result > 0 ) { 
		while ($data=mysqli_fetch_assoc($result)) {
			extract($data);
			$hasil=$hasil."<h4>".($no+=1)." .".$tour_name."</h4>";
		}
	}

	return $hasil;
}
?>
