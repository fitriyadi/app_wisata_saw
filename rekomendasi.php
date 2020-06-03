<p class="wow fadeInUp animated" data-wow-delay=".5s"># Pilih Parameter Rekomendasi</p> 

<form action="halaman.php?hal=rekomendasi_hasil" method="post">
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th width="40%">Parameter</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Fasilitas Hotel</td>
			<td><select name="hotel" class="form-control">
				<option value="1">Sangat Tidak Penting</option>
				<option value="2">Tidak Penting</option>
				<option value="3">Normal</option>
				<option value="4">Penting</option>
				<option value="5">Sangat Penting</option>
			</select> </td>
		</tr>
		<tr>
			<td>2</td>
			<td>Harga Paket</td>
			<td><select name="harga" class="form-control">
				<option value="1">Sangat Tidak Penting</option>
				<option value="2">Tidak Penting</option>
				<option value="3">Normal</option>
				<option value="4">Penting</option>
				<option value="5">Sangat Penting</option>
			</select> </td>
		</tr>
		<tr>
			<td>3</td>
			<td>Jumlah Wisata</td>
			<td><select name="jumlah" class="form-control">
				<option value="1">Sangat Tidak Penting</option>
				<option value="2">Tidak Penting</option>
				<option value="3">Normal</option>
				<option value="4">Penting</option>
				<option value="5">Sangat Penting</option>
			</select> </td>
		</tr>
		<tr>
			<td>4</td>
			<td>Lama Wisata</td>
			<td><select name="lama" class="form-control">
				<option value="1">Sangat Tidak Penting</option>
				<option value="2">Tidak Penting</option>
				<option value="3">Normal</option>
				<option value="4">Penting</option>
				<option value="5">Sangat Penting</option>
			</select> </td>
		</tr>
	</tbody>
</table>

<button class="btn1" style="float:right;" name="daftar">Hasil</button>
</form>