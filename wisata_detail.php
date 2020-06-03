<div class="agile-about-top">
	<?php
	$kode=$_GET['id'];
    $query="SELECT * from tb_tour join tb_packcage_detail on packcage_tour=tour_id join tb_location on location_id=tour_location where packcage_id='$kode'";
    $result=$mysqli->query($query);
    $num_result=$result->num_rows;
    if ($num_result > 0 ) { 
    	$i=0;
        while ($data=mysqli_fetch_assoc($result)) {
        $i+=1;
        extract($data);
                    ?>
	<div class="col-md-4 wel">
		<h6 align="center"><?php echo $tour_name;?></h6>
		<img align="center" src="assets/pict_tour/<?php echo $tour_photo;?>" width="100%">
		<h4 align="center"><b><?php echo $location_name; ?></b></h4>
	</div>

	<?php if ($i % 3 == 0) {
		?>
			<div class="clearfix"> </div>
	<hr>
		<?php
		}?>
	<?php }} ?>
</div>