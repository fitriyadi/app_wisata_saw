<div class="agile-about-top">
	<?php
    $query="SELECT * from tb_armada";
    $result=$mysqli->query($query);
    $num_result=$result->num_rows;
    if ($num_result > 0 ) { 
        while ($data=mysqli_fetch_assoc($result)) {
        extract($data);
                    ?>
	<div class="col-md-4 wel">
		<h6><?php echo $armada_category; ?></h6>
		<img src="assets/pict_armada/<?php echo $armada_photo;?>" width="100%">
	</div>

	<div class="col-md-8 wel">
		<h3><?php echo $armada_name; ?></h3>
		<p><?php echo $armada_information; ?></p>
	</div>
	<div class="clearfix"> </div>
	<hr>
	<?php }} ?>

</div>