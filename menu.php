<div class="head">
				<div class="container">
					<div class="navbar-top">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
								 <div class="navbar-brand logo ">
									<h1 class="animated wow pulse" data-wow-delay=".5s">
									<a href="index.html">Paket <span>Travel</span></a></h1>
								</div>

							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							 <ul class="nav navbar-nav link-effect-4">
								<li><a href="index.php" data-hover="Home">Home</a> </li>
								<li><a href="halaman.php?hal=tentang" data-hover="About"> Profil</a> </li>
								<li><a href="gallery.php"  data-hover="Gallery">Gallery</a></li>
								
								<li class="dropdown">
									<a href="codes.html" class="dropdown-toggle" data-hover="Pages" data-toggle="dropdown">Paket <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<!-- <li><a href="halaman.php?hal=wisata">Wisata</a></li> -->
										<li><a href="halaman.php?hal=armada">Armada</a></li>
										<li><a href="halaman.php?hal=hotel">Hotel</a></li>
										<li><a href="halaman.php?hal=paket">Paket</a></li>
										<li><a href="halaman.php?hal=rekomendasi">Rekomendasi Paket</a></li>
									</ul>
							  </li>
							  	<?php if (isset($_SESSION['member'])){ ?>
							  		<li><a href="member/index.php" data-hover="Contact">Beranda Member</a></li>

							  	<?php 	}else{  ?> 
								<li><a href="halaman.php?hal=member_daftar" data-hover="Contact">Member</a></li>

									<?php } ?>
							  </ul>
							</div><!-- /.navbar-collapse -->
						</div>
			
					<div class="header-left animated wow fadeInLeft animated" data-wow-delay=".5s" >
							<ul>
								<li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">info@tour.com</a></li>
								<li><i class="glyphicon glyphicon-earphone"></i>(0274) 561 789</li>
								
							</ul>
						</div>
					  <div class="clearfix"></div>	
				</div>
			</div>