<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{

		$keterangan=str_replace("\r","", $_POST['keterangan']);
		$keterangan=str_replace("\n","", $keterangan);

		if ($keterangan==""){
			echo "<script>alert('Silahkan isi data informasi')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";		
		}else{
		//Upload Gambar
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
		$tipe_file      = $_FILES['gambar']['type'];
		$nama_file      = $_POST['kode'].'.jpg';

		// Apabila ada gambar yang diupload
		if (!empty($lokasi_file)){		  
			if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
				echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
				//ARAHKAN
				echo "<script>window.location='javascript:history.go(-1)';</script>";
			}else {
				//buat folder
				if(is_dir("../assets/pict_armada"))
				{
					$tempat_gambar = "../assets/pict_armada";
				}else{
					mkdir("../assets/pict_armada");
					$tempat_gambar = "../assets/pict_armada";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");

					
					$stmt = $mysqli->prepare("INSERT INTO tb_armada 
							(armada_id, armada_name,armada_category,armada_information,armada_photo) 
							VALUES (?, ?, ?, ?, ?)");
	
					$stmt->bind_param("sssss",
									mysqli_real_escape_string($mysqli, $_POST['kode']), 
									mysqli_real_escape_string($mysqli, $_POST['nama']), 
									mysqli_real_escape_string($mysqli, $_POST['kategori']), 
									mysqli_real_escape_string($mysqli, $keterangan),
									mysqli_real_escape_string($mysqli, $nama_file));	
					
					if ($stmt->execute()) { 
				   			echo "<script>alert('Data Armada Berhasil Disimpan')</script>";
							echo "<script>window.location='index.php?hal=armada';</script>";	
					} else {
							echo "<script>alert('Data Armada Gagal Disimpan')</script>";
							echo "<script>window.location='javascript:history.go(-1)';</script>";
					}

			}
		}
	}

}else if(isset($_POST['ubah'])){
		$keterangan=str_replace("\r","", $_POST['keterangan']);
		$keterangan=str_replace("\n","", $keterangan);
		

		if ($keterangan==""){
			echo "<script>alert('Silahkan isi dataketerangan')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";		
		}else{

		//Upload Gambar
			$lokasi_file    = $_FILES['gambar']['tmp_name'];
			$tipe_file      = $_FILES['gambar']['type'];
			$nama_file      = $_POST['kode'].'.jpg';
		
			if (isset($_FILES['gambar']['tmp_name'])){		  
			if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
				//echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
				//ARAHKAN
				//echo "<script>window.location='javascript:history.go(-1)';</script>";
			}else {
				//buat folder
				if(is_dir("../assets/pict_armada"))
				{
					$tempat_gambar = "../assets/pict_armada";
				}else{
					mkdir("../assets/pict_armada");
					$tempat_gambar = "../assets/pict_armada";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");
			}
		}

	$stmt = $mysqli->prepare("UPDATE tb_armada  SET 
													armada_name=?,
													armada_category=?,
													armada_information=?
													where armada_id=?");
	$stmt->bind_param("ssss",
					mysqli_real_escape_string($mysqli, $_POST['nama']),
					mysqli_real_escape_string($mysqli, $_POST['kategori']),
					mysqli_real_escape_string($mysqli, $keterangan),
					mysqli_real_escape_string($mysqli, $_POST['kode']));	
	 
	if ($stmt->execute()) { 
   			echo "<script>alert('Data Armada Berhasil Diubah')</script>";
			echo "<script>window.location='index.php?hal=armada';</script>";	
	} else {
			echo "<script>alert('Data Armada Gagal Diubah')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
}
}else if(isset($_GET['hapus'])){
	
	$stmt = $mysqli->prepare("DELETE FROM tb_armada where armada_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
   			echo "<script>alert('Data Armada Berhasil Dihapus')</script>";
			echo "<script>window.location='index.php?hal=armada';</script>";	
	} else {
			echo "<script>alert('Data Armada Gagal Dihapus')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
	
}
?>