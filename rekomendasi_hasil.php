	<div class="agile-about-top">

	<?php
	$totaldata=$_POST['hotel']+$_POST['harga']+$_POST['jumlah']+$_POST['lama'];	
	$hotel=$_POST['hotel']/$totaldata*100;
	$harga=$_POST['harga']/$totaldata*100;
	$jumlah=$_POST['jumlah']/$totaldata*100;
	$lama=$_POST['lama']/$totaldata*100;

	
	// echo "Hotel : ".$hotel;
	// echo "<br>";

	// echo "Harga : ".$harga;
	// echo "<br>";

	// echo "Jumlah : ".$jumlah;
	// echo "<br>";

	// echo "Lama : ".$lama;
	// echo "<br>";
	

    $query="SELECT *,
	((hotel_rate)/(SELECT MAX(hotel_rate) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$hotel)
	+
	((SELECT MIN(packcage_price) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)/(packcage_price)*$harga)
	 +
	((packcage_amount)/(SELECT MAX(packcage_amount) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$jumlah)
	+
	((packcage_long_tour)/(SELECT MAX(packcage_long_tour) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$lama) AS HASIL
	FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel
	join tb_armada on armada_id=packcage_armada
	

	ORDER BY
	(
	((hotel_rate)/(SELECT MAX(hotel_rate) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$hotel)
	+
	((SELECT MIN(packcage_price) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)/(packcage_price)*$harga)
	 +
	((packcage_amount)/(SELECT MAX(packcage_amount) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$jumlah)
	+
	((packcage_long_tour)/(SELECT MAX(packcage_long_tour) FROM tb_packcage
	JOIN tb_hotel ON hotel_id=packcage_hotel)*$lama )
	) DESC limit 0,3";

    $result=$mysqli->query($query);
    $num_result=$result->num_rows;
    if ($num_result > 0 ) { 
    	$i=0;
        while ($data=mysqli_fetch_assoc($result)) {
        $i+=1;
        extract($data);
                    ?>
	<div class="col-md-4 wel">
		<a href="halaman.php?hal=paket_detail&id=<?php echo $packcage_id; ?>">
		<h6 align="center"><?php echo $packcage_name;?></h6>
		<img align="center" src="assets/pict_packcage/<?php echo $packcage_id.".jpg";?>" width="100%">
		<h4 align="center"><b><?php echo number_format($packcage_price); ?></b></h4>
		</a>
	</div>

	<?php if ($i % 3 == 0) {
		?>
			<div class="clearfix"> </div>
	<hr>
		<?php
		}?>
	<?php }} ?>
</div>
