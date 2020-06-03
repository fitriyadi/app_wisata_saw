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

<style>
p{
    margin-top: 2cm;
}
</style>
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
	<!-- light-box -->
	<link rel="stylesheet" href="assets_user/css/lightbox.css">
	<!-- //light-box -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner">
		<div class="agileinfo-dot">
			<?php require 'menu.php'; ?>

				<div class='w3-agileits-about-banner'>
					<div class='container'>
						<h2>Gallery</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- //banner -->
		<!-- gallery -->
		<div class="gallery">
			<div class="container">
				<div class="gallery-grids" >

					<?php

					$query="SELECT * from tb_gallery order by gallery_id desc";

					$result=$mysqli->query($query);
					$num_result=$result->num_rows;
					$x=0;
					if ($num_result > 0 ) { 
						while ($data=mysqli_fetch_assoc($result)) {
							$x+=1;
							extract($data);
							?>
							<div style="background-color: ; width: 24%; height: 200px; float: left; margin-left: 10px; margin-bottom: 20px;">
								<a class="example-image-link" href="assets/pict_gallery/<?php echo $gallery_photo; ?>" data-lightbox="example-set" data-title="<?php echo $gallery_name; ?>">
								<img src="assets/pict_gallery/<?php echo $gallery_photo; ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius:5px;">
							</div>
							<!-- <div class="col-md-3 gallery-grids-left-subr" style="background-color:  red;">
								<div class="gallery-grid" style="background-color:  blue; float: left;">
									<a class="example-image-link" href="assets/pict_gallery/<?php echo $gallery_photo; ?>" data-lightbox="example-set" 
									data-title="<?php echo $gallery_name; ?>">
									<img src="assets/pict_gallery/<?php echo $gallery_photo; ?>" alt="" />
								</a>
								</div>
							</div> -->
						<?php  
						}} ?>
					</div>
					<script src="assets_user/js/lightbox-plus-jquery.min.js"> </script>
				</div>
			</div>
		</div>
		<!-- //gallery -->
		<!-- footer -->
		<div class="footer">
			<div class="copyright">
				<p>(2017) Sistem Informasi Pemesanan Tour</p>
			</div>
		</div>
		<!-- //footer -->
		<script type="assets_user/text/javascript" src="js/move-top.js"></script>
		<script type="assets_user/text/javascript" src="js/easing.js"></script>
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
			$(document).ready(function() {
/*
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear' 
};
*/

$().UItoTop({ easingType: 'easeOutQuart' });

});
		</script>
		<!-- //here ends scrolling icon -->
	</body>	
	</html>