<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{
	$user=$_POST['username'];
	$kodeadmin=$_POST['kode'];

	if(CekExist($mysqli,"SELECT * FROM tb_admin where admin_username='$user' and admin_id !='$kodeadmin'") == true){

		echo "<script>alert('Username sudah terdaftar')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{

		$stmt = $mysqli->prepare("INSERT INTO tb_admin 
			(admin_id,admin_name,admin_username,admin_password,admin_email,admin_status) 
			VALUES (?,?,?,?,?,?)");

		$stmt->bind_param("ssssss",
			mysqli_real_escape_string($mysqli, $_POST['kode']), 
			mysqli_real_escape_string($mysqli, $_POST['nama']), 
			mysqli_real_escape_string($mysqli, $_POST['username']), 
			mysqli_real_escape_string($mysqli, $_POST['password']), 
			mysqli_real_escape_string($mysqli, $_POST['email']), 
			mysqli_real_escape_string($mysqli, $_POST['status']));	

		if ($stmt->execute()) { 
			echo "<script>alert('Data Admin Berhasil Disimpan')</script>";
			echo "<script>window.location='index.php?hal=admin';</script>";	
		} else {
			echo "<script>alert('Data Admin Gagal Disimpan')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}
}
?>