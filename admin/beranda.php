<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<a href="../index.php" class="btn btn-sm btn-default pull-right">Hal Utama</a>
			<h6 class="text-muted m-t-0 text-uppercase">Selamat datang admin.....</h6>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=armada" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Armada</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_armada"); ?></span></h2>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=hotel" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Hotel</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_hotel"); ?></span></h2>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=wisata" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Wisata</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_tour"); ?></span></h2>
		</div>
	</div>

</div>

<div class="row">
	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=Paket" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Paket</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_packcage"); ?></span></h2>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=gallery" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Gallery</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_gallery"); ?></span></h2>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card-box">
			<a href="?hal=member" class="btn btn-sm btn-default pull-right">View</a>
			<h6 class="text-muted m-t-0 text-uppercase">Data Member</h6>
			<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_member"); ?></span></h2>
		</div>
	</div>

</div>
