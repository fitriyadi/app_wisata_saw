<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
session_start();

if(isset($_POST['ubah'])){

	$password=$_POST['password'];
	$passwordlama=$_POST['passwordlama'];
	$konfirmasi=$_POST['konfirmasi'];
	$kode=$_SESSION['member'];

	$passdata=SingleData($mysqli,"member_password","tb_member where member_id='$kode'");

	if ($password != $konfirmasi){
		echo "<script>alert('Password Kofrimasi tidak sesuai')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else if ($passdata!=$passwordlama){
		echo "<script>alert('Password lama tidak sesuai')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
		$stmt = $mysqli->prepare("UPDATE tb_member  SET 
			member_username=?,
			member_password=?,
			member_phone=? where member_id=?");
		$stmt->bind_param("ssss",
			mysqli_real_escape_string($mysqli, $_POST['username']), 
			mysqli_real_escape_string($mysqli, $_POST['password']),
			mysqli_real_escape_string($mysqli, $_POST['telpon']),  
			mysqli_real_escape_string($mysqli, $_SESSION['member']));	

		if ($stmt->execute()) { 
			echo "<script>alert('Data User Berhasil Diubah')</script>";
			echo "<script>window.location='index.php?hal=profil';</script>";	
		} else {
			echo "<script>alert('Data Profil Gagal Diubah')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}

}elseif(isset($_POST['simpan'])){

		$stmt = $mysqli->prepare("UPDATE tb_member  SET 
			member_phone=?,
			member_ktp_no=?,
			member_location=?,
			member_birth=?,
			member_addres=?,
			member_gender=? where member_id=?");
		$stmt->bind_param("sssssss",
			mysqli_real_escape_string($mysqli, $_POST['telpon']), 
			mysqli_real_escape_string($mysqli, $_POST['ktp']),
			mysqli_real_escape_string($mysqli, $_POST['tempat']),  
			mysqli_real_escape_string($mysqli, $_POST['tanggal']), 
			mysqli_real_escape_string($mysqli, $_POST['alamat']),
			mysqli_real_escape_string($mysqli, $_POST['jk']),  
			mysqli_real_escape_string($mysqli, $_SESSION['member']));	

		if ($stmt->execute()) { 
			echo "<script>alert('Data Member Berhasil Diubah')</script>";
			echo "<script>window.location='index.php?hal=data';</script>";	
		} else {
			echo "<script>alert('Data Profil Gagal Diubah')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}


}
?>