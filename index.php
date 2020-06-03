<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Pemesanan Paket Wisata</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Perfect Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link href="assets_user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="assets_user/css/style.css" type="text/css" media="all" />
	<!--// css -->
	<link rel="stylesheet" href="assets_user/css/flexslider.css" type="text/css" media="screen" property="" />
	<!-- font-awesome icons -->
	<link href="assets_user/css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<link rel="stylesheet" href="assets_user/css/owl.carousel.css" type="text/css" media="all">
	<link href="assets_user/css/owl.theme.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="assets_user/css/cm-overlay.css" />


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
	<script>
		$(document).ready(function() { 
			$("#owl-demo").owlCarousel({
				
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		autoPlay:true,
		items : 3,
		itemsDesktop : [640,5],
		itemsDesktopSmall : [414,4]
		
	});
			
		}); 
	</script>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner">
		<div class="agileinfo-dot">
			<?php require 'menu.php'; ?>
			<div class="banner-slider">
				<div class="container">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="w3l_banner_info">
										<h3>Banner 1</h3>
										<p>Isi keterangan Banner 1.</p>
									</div>
								</li>
								<li>
									<div class="w3l_banner_info">
										<h3>Banner 2</h3>
										<p>Isi keterangan Banner 2.</p>
									</div>
								</li>
								<li>
									<div class="w3l_banner_info">
										<h3>Banner 3</h3>
										<p>Isi keterangan Banner 3.</p>
									</div>
								</li>
								<li>
									<div class="w3l_banner_info">
										<h3>Banner 4</h3>
										<p>Isi keterangan Banner 4.</p>
									</div>
								</li>
								<li>
									<div class="w3l_banner_info">
										<h3>Banner 5</h3>
										<p>Isi keterangan Banner 5.</p>
									</div>
								</li>
							</ul>
						</div>
					</section>

					<!-- flexSlider -->
					<script defer src="assets_user/js/jquery.flexslider.js"></script>
					<script type="text/javascript">
						$(window).load(function(){
							$('.flexslider').flexslider({
								animation: "slide",
								start: function(slider){
									$('body').removeClass('loading');
								}
							});
						});
					</script>
					<!-- //flexSlider -->
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome" id="welcome">
		<div class="container">
			<div class="w3-welcome-heading">
				<h2>Selamat Datang</h2>
			</div>
			<div class="w3l-welcome-info">
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="assets_user/images/14.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="assets_user/images/12.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p>Yogyakarta (Jogjakarta, Jogja, Yogya) adalah salah satu daerah tujuan wisata yang paling diminati di Indonesia. Merupakan pusat kebudayaan Jawa, Yogyakarta terletak di kaki Gunung Merapi di bagian tengah-selatan Pulau Jawa. Yogyakarta memiliki tradisi yang diwariskan secara turun-temurun mulai dari abad 16 dan 17 dan hingga kini telah menyatu dalam sendi kehidupan masyarakatnya. Yogyakarta terbentuk pada tahun 1755 dimana saat itu Kerajaan Mataram terbagi menjadi dua yakni ke Kesultanan Yogyakarta (Ngayogyakarta Hadiningrat) dan Surakarta (Surakarta Hadiningrat) di Solo. </p>
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- services -->
	<div id="services" class="services">
		<div class="container">  
			<div class="w3-welcome-heading">
				<h3>Mengapa Memesan Melalui Tour and Travel Kami?</h3>
			</div>
			<div class="services-w3ls-row">
				<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<span class="glyphicon glyphicon-home effect-1" aria-hidden="true"></span>
					<h5>Jaminan Pelayanan Terbaik</h5>
					<p>Jaminan layanan perencanaan dan pemesanan produk perjalanan wisata yang mudah dan murah, didukung dengan konfirmasi singkat dan proses yang akurat.</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<span class="glyphicon glyphicon-list-alt effect-1" aria-hidden="true"></span>
					<h5>Transaksi Aman dan Terpercaya</h5>
					<p>Transaksi perjalanan Anda dijamin aman, didukung dengan sistem teknologi reservasi dan verifikasi terkini yang terpercaya.</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts">
					<span class="glyphicon glyphicon-tree-deciduous effect-1" aria-hidden="true"></span>
					<h5>Jaringan Terluas dan Terlengkap</h5>
					<p>Dengan lebih dari 90 kantor cabang yang tersebar di Indonesia, Dwidayatour menghadirkan berbagai pilihan produk dan layanan perjalanan ke berbagai destinasi domestik dan internasional.</p>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 services-grid">
					<span class="glyphicon glyphicon-globe effect-1" aria-hidden="true"></span>
					<h5>Hotline 24 jam</h5>
					<p>Jangan sungkan untuk menghubungi kami. Travel Consultant kami yang berpengalaman siap melayani 24 jam setiap harinya, dimanapun Anda berada.</p>
				</div> 
				<div class="clearfix"> </div>
			</div>  
		</div>
	</div>
	<!-- //services -->
	<!-- feedback -->
	
	<!-- footer -->
	<div class="footer">

		<div class="copyright">
			<p>(2017) Sistem Informasi Pemesanan Tour</p>
		</div>
	</div>
	<!-- //footer -->
	<script src="assets_user/js/jarallax.js"></script>
	<script src="assets_user/js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<script type="text/javascript" src="assets_user/js/move-top.js"></script>
	<script type="text/javascript" src="assets_user/js/easing.js"></script>
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
		<script src="assets_user/js/owl.carousel.js"></script>
		<script type="text/javascript">
		function validasi_input(form){
			pola_nama=/^[a-zA-Z ]$/;
			if (!pola_nama.test(form.nama.value)){
				alert ('Nama tidak boleh terdiri dari selain huruf');
				form.nama.focus();
				return false;
			}
			return (true);
		}
	</script>
	</body>	
	</html>