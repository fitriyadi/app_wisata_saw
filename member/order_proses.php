<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	

		//Upload Gambar
		$kodekonfirmasi=KodeOtomatis($mysqli,"tb_confirmation","confirmation_id","KNF-","4","6");
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
		$tipe_file      = $_FILES['gambar']['type'];
		$nama_file      = $kodekonfirmasi.'.jpg';

		// Apabila ada gambar yang diupload
		if (!empty($lokasi_file)){		  
			if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
				echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
				//ARAHKAN
				echo "<script>window.location='javascript:history.go(-1)';</script>";
			}else {
				//buat folder
				if(is_dir("../assets/pict_konfirmasi"))
				{
					$tempat_gambar = "../assets/pict_konfirmasi";
				}else{
					mkdir("../assets/pict_konfirmasi");
					$tempat_gambar = "../assets/pict_konfirmasi";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");

			$stmt = $mysqli->prepare("INSERT INTO tb_confirmation 
				(confirmation_id,confirmation_order,confirmation_number_bank,confirmation_bank_user,confirmation_bank_name,confirmation_file) 
				VALUES (?, ?, ?, ?, ?, ?)");

			$stmt->bind_param("ssssss",
				mysqli_real_escape_string($mysqli, $kodekonfirmasi),
				mysqli_real_escape_string($mysqli, $_POST['kode']),
				mysqli_real_escape_string($mysqli, $_POST['norek']),
				mysqli_real_escape_string($mysqli, $_POST['atasnama']),
				mysqli_real_escape_string($mysqli, $_POST['bank']), 
				mysqli_real_escape_string($mysqli, $nama_file));	

			if ($stmt->execute()) { 
				$stmt = $mysqli->prepare("UPDATE tb_order set order_status='Konfirmasi' where order_id=?");
				$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_POST['kode'])); 
				$stmt->execute();

				echo "<script>alert('Data Konfirmasi Berhasil Disimpan')</script>";
				echo "<script>window.location='index.php?hal=konfirmasi';</script>";	
			} else {
				echo "<script>alert('Data Konfirmasi Gagal Disimpan')</script>";
				echo "<script>window.location='javascript:history.go(-1)';</script>";
			}

			}
		}


}else if(isset($_GET['hapus'])){

	$stmt = $mysqli->prepare("DELETE FROM tb_confirmation where confirmation_order=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 
	$stmt->execute();

	$stmt = $mysqli->prepare("DELETE FROM tb_order where order_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Order Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=order';</script>";	
	} else {
		echo "<script>alert('Data Order Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>