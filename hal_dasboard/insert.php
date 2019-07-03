<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_produk)as kode from produk");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'], 2,4);
$tambah=$kode+1;
if ($tambah<10) {
		$id="PR000".$tambah;
	}else{
		$id="PR00".$tambah;
	}
?>
<script type="text/javascript">
		var loadFile = function(event){
			var output = document.getElementById('output');
			output.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>
<div class="insert">
	<h2>Input Produk Baru</h2>
	<form method="post" action="proses_insert.php" enctype="multipart/form-data">
	<table border="1">
		<tr>
			<td>ID produk</td>
			<td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>
				<img id="output" height="100" width="150">
				<input type="file" accept="images/*" onchange="loadFile(event)" name="gambar" id="gambar" required>
			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<!--<tr>
			<td>Ukuran</td>
			<td><select name="ukuran">
				<?php 
					$result = mysqli_query($koneksi, "SELECT nama_ukuran FROM ukuran_helm");
					while($data = mysqli_fetch_array($result)){
					echo '<option name="ukuran" value="'.$data['nama_ukuran'].'">'.$data['nama_ukuran'].'</option>';
					}
				?>
			</select></td>	
		</tr>
		<tr>
			<td>Harga</td>
			<td><input type="text" name="harga"></td>
		</tr>-->
	</table><br><br>
	<a href="">
		<input type="submit" name="submit" value="Simpan">
	</a>
	<a href="dasboard.php?page=home"><input type="button" value="Cencel">
	</a>
</form>
</div>