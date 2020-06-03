<div class="agile-contact-form">
	<div class="col-md-6 contact-form-left">
		<div class="contact-form-top">
			<h3>Login Member</h3>
		</div>
		<div class="agileinfo-contact-form-grid">
			<form action="member_proses.php" method="post">
				<input type="text" name="username" placeholder="Isikan Username" required="">
				<input type="password" name="password" placeholder="isikan Password" required="">

				<button class="btn1" name="login">Login</button>
			</form>
		</div>
	</div>
	<div class="col-md-6 contact-form-right">
		<div class="contact-form-top">
			<h3>Daftar Member</h3>
		</div>
		<div class="agileinfo-contact-form-grid">
			<form action="member_proses.php" method="post">
				<input type="text" name="nama" placeholder="Nama" required="">
				<input type="text" name="username" placeholder="Username" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<input type="password" name="konpassword" placeholder="Ulangi Password" required="">
				<input type="text" name="telpon" placeholder="No Telpon" required="">
				<button class="btn1" name="daftar">Daftar</button>
			</form>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
