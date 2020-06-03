	<?php
	if (isset($_GET['id'])){
    	$kode=$_GET['id'];
    	extract(ArrayData($mysqli,"tb_packcage join tb_armada on armada_id=packcage_armada
                            join tb_hotel on hotel_id=packcage_hotel","packcage_id='$kode'"));
	}

	?>
	<div class="contact">
		<div class="container">
			<div class="agile-contact-form">

				<div class="col-md-6 contact-form-left">
					<div class="w3layouts-contact-form-top">
						<h3>Informasi Paket</h3>
						<p><?php echo $packcage_detail; ?></p>
					</div>
				</div>

				<div class="col-md-6 contact-form-right">
					<div class="contact-form-top">
						<h3 align="center"><?php echo $packcage_name; ?></h3>
						<p align="center">
						<img src="assets/pict_packcage/<?php echo $packcage_id.".jpg";?>" width="360px" height="200px">
						</p>
						<h4 align="center"><?php echo number_format($packcage_price); ?></h4>

						<div class="agileinfo-contact-form-grid">
						<form action="pesan_paket.php" method="post">
							<input type="hidden" name="id" value="<?php echo $kode; ?>">
							<input type="hidden" name="harga" value="<?php echo $packcage_price;  ?>">
							<input type="number" name="jumlah" placeholder="Jumlah pemesan" required="" min="1">
							<input type="date" name="tanggal" min="<?php echo date('Y-m-d',strtotime(date('Y-m-d'). "+1 days")); ?>" required="">
							<button class="btn1">Pesan</button>
						</form>
					</div>
					</div>


					<hr>
					<div class="contact-form-top">
						<h3 align="center"><?php echo $hotel_name;; ?></h3>
						<p align="center">
						<img src="assets/pict_hotel/<?php echo $hotel_photo;?>" width="360px" height="200px">
						</p>
					</div>

										<hr>
					<!-- <div class="contact-form-top">
						<h3 align="center"><?php echo $armada_name; ?></h3>
						<p align="center">
						<img src="assets/pict_armada/<?php echo $armada_photo;?>" width="360px" height="200px">
						</p>
					</div> -->

				</div>
				<hr>
				<div class="clearfix"> </div>




			</div>
		</div>
	</div>