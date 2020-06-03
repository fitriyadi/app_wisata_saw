<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_GET['valid'])){

	$stmt = $mysqli->prepare("update tb_order set order_status='Valid' where order_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['valid'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Konfirmasi Berhasil Di Ubah')</script>";
		echo "<script>window.location='index.php?hal=konfirmasi';</script>";	
	} else {
		echo "<script>alert('Data Konfirmasi Gagal Di ubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}elseif (isset($_GET['tidakvalid'])){

	$stmt = $mysqli->prepare("update tb_order set order_status='Tidak Valid' where order_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['tidakvalid'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Konfirmasi Berhasil Di Ubah')</script>";
		echo "<script>window.location='index.php?hal=konfirmasi';</script>";	
	} else {
		echo "<script>alert('Data Konfirmasi Gagal Di Ubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>