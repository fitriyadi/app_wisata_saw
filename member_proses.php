<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';


if(isset($_POST['daftar']))
{
	$user=$_POST['username'];
	$kodemember=KodeOtomatis($mysqli,"tb_member","member_id","M-","2","3");

	if(CekExist($mysqli,"SELECT * FROM tb_member where member_username='$user' and member_id !='$kodemember'") == true){

		echo "<script>alert('Username sudah terdaftar')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}elseif($_POST['password'] <> $_POST['konpassword']){

		echo "<script>alert('Password dan Konfirmasi tidak sesuai')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
	$stmt = $mysqli->prepare("INSERT INTO tb_member 
		(member_id,member_name,member_username,member_password,member_phone) 
		VALUES (?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss",
		mysqli_real_escape_string($mysqli, $kodemember),
		mysqli_real_escape_string($mysqli, $_POST['nama']),
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']), 
		mysqli_real_escape_string($mysqli, $_POST['telpon']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Pendaftaran Berhasil Disimpan, Silahkan Login Member')</script>";
		echo "<script>window.location='halaman.php?hal=member_daftar';</script>";	
	} else {
		echo "<script>alert('Data Pendaftaran Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
}

}else if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];

	$sqluser="Select * from tb_member where member_username='$user' and member_password='$pass'";
	
	if (CekExist($mysqli,$sqluser)== true){
		
		$_SESSION['member']=caridata($mysqli,"Select member_id from tb_member where member_username='$user'");
		echo "<script>alert('Selamat datang Member')</script>";
		echo "<script>window.location='member/index.php?hal=beranda';</script>";

	}else{		
		echo "<script>alert('Username atau password tidak terdaftar')</script>";
		echo "<script>window.location='halaman.php?hal=member_daftar';</script>";
	
	}

}

?>