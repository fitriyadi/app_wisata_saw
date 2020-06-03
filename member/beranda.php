<div class="row">
	<div class="col-md-12">
		<div class="card-box">
			<a href="../index.php" class="btn btn-sm btn-default pull-right">Situs Utama</a>
		<section class="content-header">
			<h3>
				<i class="fa fa-home icon-title"></i>&nbsp; Beranda
			</h3>
			<div class="panel panel-danger" style="background-color: red; height: 4px;">
			</div>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info">
						<a type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
						<p style="font-size:15px">
							<i class="icon fa fa-user"></i> Selamat datang <strong></strong> di Member Pemesanan Paket Wisata.
						</p>        
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<form method="post" enctype="multipart/form-data">
	<!-- <div class="col-md-12"></div> -->
	<div class="col-md-6">
		<div class="card card-stats">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big text-center icon-info"><i class="fa fa-globe text-info" style="font-size: 300%"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<h6 class="text-muted m-t-0 text-uppercase">Data Order</h6>
						<?php $kode=$_SESSION['member']; ?>
						<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_order where order_status='Pending' and order_member='$kode'"); ?></span></h2>
					</div>
				</div>
				<div class="footer"><hr>
					<div class="text-center">
						<div class="icon">
							<a href="?hal=order" class="btn btn-sm btn-default pull-center" rel="tooltip" title="Lihat">View</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card card-stats">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big text-center icon-danger"><i class="fa fa-globe text-danger" style="font-size: 300%"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<h6 class="text-muted m-t-0 text-uppercase">Data Konfirmasi</h6>
						<h2 class="m-b-20"><span><?php echo JumlahData($mysqli,"tb_confirmation join tb_order on order_id=confirmation_order and order_member='$kode'"); ?></span></h2>
					</div>
				</div>
				<div class="footer"><hr>
					<div class="text-center">
						<div class="icon">
							<a href="?hal=konfirmasi" class="btn btn-sm btn-default pull-center" rel="tooltip" title="Lihat">View</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
