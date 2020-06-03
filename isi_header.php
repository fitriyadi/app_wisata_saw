<?php

$pilih=$_GET['hal'];

if ($pilih == 'armada'){
	$menu="Armada";

}elseif ($pilih == 'wisata' || $pilih == 'wisata_detail'){
	$menu="Wisata";

}elseif ($pilih == 'hotel'){
	$menu="Hotel";

}elseif ($pilih == 'tentang'){
	$menu="Tentang Kami";

}elseif ($pilih == 'member_daftar'){
	$menu="Member";

}elseif ($pilih == 'gallery'){
	$menu="Gallery";

}elseif ($pilih == 'paket' || $pilih == 'paket_detail'){
	$menu="Paket Tour";

}elseif ($pilih == 'rekomendasi' || $pilih == 'rekomendasi_hasil'){
	$menu="Rekomendasi";

}else{
	$menu="Kosong";
}
echo "<div class='w3-agileits-about-banner'>
	<div class='container'>
	<h2>".$menu."</h2>
	</div>
	</div>";
?>