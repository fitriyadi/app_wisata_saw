<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{

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
				if(is_dir("../assets/pict_gallery"))
				{
					$tempat_gambar = "../assets/pict_gallery";
				}else{
					mkdir("../assets/pict_gallery");
					$tempat_gambar = "../assets/pict_gallery";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");

					
					$stmt = $mysqli->prepare("INSERT INTO tb_gallery 
							(gallery_id, gallery_name,gallery_photo) 
							VALUES (?, ?, ?)");
	
					$stmt->bind_param("sss",
									mysqli_real_escape_string($mysqli, $_POST['kode']), 
									mysqli_real_escape_string($mysqli, $_POST['nama']), 

									mysqli_real_escape_string($mysqli, $nama_file));	
					
					if ($stmt->execute()) { 
				   			echo "<script>alert('Data gallery Berhasil Disimpan')</script>";
							echo "<script>window.location='index.php?hal=gallery';</script>";	
					} else {
							echo "<script>alert('Data gallery Gagal Disimpan')</script>";
							echo "<script>window.location='javascript:history.go(-1)';</script>";
					}

			}
		}


}else if(isset($_POST['ubah'])){

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
				if(is_dir("../assets/pict_gallery"))
				{
					$tempat_gambar = "../assets/pict_gallery";
				}else{
					mkdir("../assets/pict_gallery");
					$tempat_gambar = "../assets/pict_gallery";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");
			}
		}

	$stmt = $mysqli->prepare("UPDATE tb_gallery  SET 
													gallery_name=?
													where gallery_id=?");
	$stmt->bind_param("ss",
					mysqli_real_escape_string($mysqli, $_POST['nama']),
					mysqli_real_escape_string($mysqli, $_POST['kode']));	
	 
	if ($stmt->execute()) { 
   			echo "<script>alert('Data gallery Berhasil Diubah')</script>";
			echo "<script>window.location='index.php?hal=gallery';</script>";	
	} else {
			echo "<script>alert('Data gallery Gagal Diubah')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){
	
	$stmt = $mysqli->prepare("DELETE FROM tb_gallery where gallery_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
   			echo "<script>alert('Data gallery Berhasil Dihapus')</script>";
			echo "<script>window.location='index.php?hal=gallery';</script>";	
	} else {
			echo "<script>alert('Data gallery Gagal Dihapus')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
	}
	
}
?>