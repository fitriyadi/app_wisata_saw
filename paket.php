<div class="agile-about-top">
	<?php
    $query="SELECT * from tb_packcage
                            join tb_armada on armada_id=packcage_armada
                            join tb_hotel on hotel_id=packcage_hotel";
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