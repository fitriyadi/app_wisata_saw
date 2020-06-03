<?php
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';
require_once 'setting/fungsi.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Informasi Pemesanan Paket Wisata</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="assets_user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="assets_user/css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="assets_user/css/font-awesome.css" rel="stylesheet"> 

<script src="assets_user/js/jquery-1.11.1.min.js"></script>
<script src="assets_user/js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

</head>
<body>
	<!-- banner -->
	<div class="banner">
		<div class="agileinfo-dot">
			<?php require 'menu.php'; ?>
			<?php require 'isi_header.php'; ?>
		</div>
	</div>
	<!-- //banner -->
	<!-- content-about -->
	<div class="content-about agileits">
		<div class="container">
			<?php
			$hal = @$_GET['hal'];
			$modul = "";
			$default = $modul."informasi_tentang.php";
			if(!$hal){
				require_once "$default";
			}else{
				switch($hal){
					case $hal:
						if(is_file($modul.$hal.".php"))
						{
							require_once $modul.$hal.".php";
						}
						else
						{
							require_once "$default";
						}
						break;
					default:
						require_once "$default";
				}
			}
			?>
		</div>
	</div>
	<!-- //content-about -->


	<!-- footer -->
	<div class="footer">
		<div class="copyright">
			<p>(2017) Sistem Informasi Pemesanan Tour</p>
		</div>
	</div>
	<!-- //footer -->

</body>	
</html>