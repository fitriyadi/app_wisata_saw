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
				if(is_dir("../assets/pict_packcage"))
				{
					$tempat_gambar = "../assets/pict_packcage";
				}else{
					mkdir("../assets/pict_packcage");
					$tempat_gambar = "../assets/pict_packcage";
				}
					
				if (isset($_POST['wisata'])){
					UploadImage($nama_file, $tempat_gambar ,"gambar");

					$stmt = $mysqli->prepare("INSERT INTO tb_packcage 
						(packcage_id, packcage_name,packcage_armada,packcage_hotel,packcage_long_tour,packcage_detail,packcage_price,packcage_amount) 
						VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

					$stmt->bind_param("ssssssss",
						mysqli_real_escape_string($mysqli, $_POST['kode']),
						mysqli_real_escape_string($mysqli, $_POST['nama']), 
						mysqli_real_escape_string($mysqli, $_POST['armada']),
						mysqli_real_escape_string($mysqli, $_POST['hotel']),  
						mysqli_real_escape_string($mysqli, $_POST['lama']),  
						mysqli_real_escape_string($mysqli, $keterangan),
						mysqli_real_escape_string($mysqli, $_POST['harga']),
						mysqli_real_escape_string($mysqli, count($_POST['wisata'])));	

					if ($stmt->execute()) { 

					foreach ($_POST['wisata'] as $key => $value) {
								$stmt = $mysqli->prepare("INSERT INTO tb_packcage_detail 
						(packcage_id,packcage_tour) 
						VALUES (?, ?)");

					$stmt->bind_param("ss",
						mysqli_real_escape_string($mysqli, $_POST['kode']),
						mysqli_real_escape_string($mysqli, $key));
					$stmt->execute();
					
					}

					echo "<script>alert('Data Paket Berhasil Disimpan')</script>";
					echo "<script>window.location='index.php?hal=paket';</script>";	
					} else {
						echo "<script>alert('Data Paket Gagal Disimpan')</script>";
						echo "<script>window.location='javascript:history.go(-1)';</script>";
					}
				}else{
					echo "<script>alert('Minimal memilih 1 Wisata')</script>";
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
				if(is_dir("../assets/pict_packcage"))
				{
					$tempat_gambar = "../assets/pict_packcage";
				}else{
					mkdir("../assets/pict_packcage");
					$tempat_gambar = "../assets/pict_packcage";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");
			}
		}

			if (isset($_POST['wisata'])){

				$stmt = $mysqli->prepare("UPDATE tb_packcage  SET 
					packcage_name=?,
					packcage_armada=?,
					packcage_hotel=?,
					packcage_long_tour=?,
					packcage_detail=?,
					packcage_price=?,
					packcage_amount=?
					where packcage_id=?");

				$stmt->bind_param("ssssssss",
					mysqli_real_escape_string($mysqli, $_POST['nama']), 
					mysqli_real_escape_string($mysqli, $_POST['armada']),
					mysqli_real_escape_string($mysqli, $_POST['hotel']),  
					mysqli_real_escape_string($mysqli, $_POST['lama']),  
					mysqli_real_escape_string($mysqli, $keterangan),
					mysqli_real_escape_string($mysqli, $_POST['harga']),
					mysqli_real_escape_string($mysqli, count($_POST['wisata'])),
					mysqli_real_escape_string($mysqli, $_POST['kode']));	

				if ($stmt->execute()) { 
					
					$stmt = $mysqli->prepare("DELETE FROM tb_packcage_detail where packcage_id=?");
					$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_POST['kode']));
					$stmt->execute(); 

					foreach ($_POST['wisata'] as $key => $value) {
								$stmt = $mysqli->prepare("INSERT INTO tb_packcage_detail 
						(packcage_id,packcage_tour) 
						VALUES (?, ?)");

					$stmt->bind_param("ss",
						mysqli_real_escape_string($mysqli, $_POST['kode']),
						mysqli_real_escape_string($mysqli, $key));
					$stmt->execute();
					
					}

					echo "<script>alert('Data Paket Berhasil Diubah')</script>";
					echo "<script>window.location='index.php?hal=paket';</script>";	
				} else {
					echo "<script>alert('Data packcage Gagal Diubah')</script>";
					echo "<script>window.location='javascript:history.go(-1)';</script>";
				}

			}else{
				echo "<script>alert('Minimal memilih 1 Wisata')</script>";
				echo "<script>window.location='javascript:history.go(-1)';</script>";	
			}
}


}else if(isset($_GET['hapus'])){

	$stmt = $mysqli->prepare("DELETE FROM tb_packcage_detail where packcage_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 
	$stmt->execute();

	$stmt = $mysqli->prepare("DELETE FROM tb_packcage where packcage_id=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Paket Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=paket';</script>";	
	} else {
		echo "<script>alert('Data Paket Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>