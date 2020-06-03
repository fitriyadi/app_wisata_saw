<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';

	$user=$_POST['username'];
	$pass=$_POST['password'];

	$sqladmin="Select * from tb_admin where admin_username='$user' and admin_password='$pass'";
	
	if (CekExist($mysqli,$sqladmin)== true){
		
		$_SESSION['admin']=caridata($mysqli,"Select admin_id from tb_admin where admin_username='$user'");
		echo "<script>alert('Anda login sebagai admin')</script>";
		echo "<script>window.location='admin/index.php?hal=beranda';</script>";

	}else{
		
		echo "<script>alert('Username atau password tidak terdaftar')</script>";
		echo "<script>window.location='login.php';</script>";
	
	}

?>