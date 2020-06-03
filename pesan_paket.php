<?php 
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';


if (isset($_SESSION['member'])){
	$tanggal=$_POST['tanggal'];
	
	$kodeorder=KodeOtomatis($mysqli,"tb_order","order_id","ORD-","4","6");

	$stmt = $mysqli->prepare("INSERT INTO tb_order 
		(order_id,order_date,order_packcage,order_status,order_member,order_reservasi,order_count,order_price,order_total) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$stmt->bind_param("sssssssss",
		mysqli_real_escape_string($mysqli, $kodeorder),
		mysqli_real_escape_string($mysqli, date('Y-m-d')),
		mysqli_real_escape_string($mysqli, $_POST['id']),
		mysqli_real_escape_string($mysqli, "Pending"), 
		mysqli_real_escape_string($mysqli, $_SESSION['member']),
		mysqli_real_escape_string($mysqli, $_POST['tanggal']),
		mysqli_real_escape_string($mysqli, $_POST['jumlah']),
		mysqli_real_escape_string($mysqli, $_POST['harga']),
		mysqli_real_escape_string($mysqli, ($_POST['harga']*$_POST['jumlah'])));	


	if ($stmt->execute()) { 
		echo "<script>alert('Pemesanan berhasil disimpan')</script>";
		echo "<script>window.location='member/index.php?hal=order';</script>";	
	} else {
		echo "<script>alert('Data Pemesanan Gagal Disimpan')</script>";
		//echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else{
	echo "<script>alert('Silahkan login terlebih dahulu, atau mendaftar member')</script>";
	echo "<script>window.location='halaman.php?hal=member_daftar';</script>";	
}

?>