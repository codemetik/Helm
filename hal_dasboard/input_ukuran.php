<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_master)as otm from data_master");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['otm'], 1,3);
$tambah=$kode+1;
if ($tambah<10) {
		$ide="M00".$tambah;
	}else{
		$ide="M0".$tambah;
	}
?>
<div class="insert">
	<h2>Input Ukuran Produk</h2>
	<form method="post" action="proses_ukuran.php" >
	<table border="1">
		<tr>
			<td>ID Master</td>
			<td><input type="text" name="id" value="<?php echo $ide; ?>" readonly></td>
		</tr>
		<tr>
			<td>ID Produk</td>
			<td>
				<select name="id_produk" onchange='Valuee(this.value)' required>
					<option value="">-Pilih-</option>
 <?php
 $query=mysqli_query($koneksi, "SELECT * FROM produk 
ORDER BY Z.id_produk ASC"); 
 $result = mysqli_query($koneksi, "SELECT * FROM produk");  
 $jsArr = "var prd = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="id_produk"  value="' . $row['id_produk'] . '">' . $row['id_produk'] . '</option>';
 $jsArr .= "prd['" . $row['id_produk'] . "'] = { nama:'".addslashes($row['nama'])."'};\n";
  }
  ?>
				</select>
				<input type="text" name="nama" id="nama" readonly>
			</td>
		</tr>
		<tr>
			<td>Ukuran</td>
			<td>
				<select name="id_ukuran" onchange='changeValue(this.value)' required>
					<option value="">-Pilih-</option>
 <?php
 $query=mysqli_query($koneksi, "SELECT * FROM ukuran_helm 
ORDER BY Z.id_ukuran ASC"); 
 $result = mysqli_query($koneksi, "SELECT * FROM ukuran_helm");  
 $jsAr = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="id_ukuran"  value="' . $row['id_ukuran'] . '">' . $row['id_ukuran'] . '</option>';
 $jsAr .= "prdName['" . $row['id_ukuran'] . "'] = { nama_ukuran:'".addslashes($row['nama_ukuran'])."'};\n";
  }
  ?>
				</select>
				<input type="text" name="ukuran" id="ukuran" readonly>
			</td>
		</tr>
		<tr>
			<td>Stok</td>
			<td><input type="tex" name="stok"></td>
		</tr>
		<tr><td>Harga</td>
			<td><input type="text" name="harga"></td></tr>
	</table><br><br>
	<a href="">
		<input type="submit" name="submit" value="Simpan">
	</a>
	<a href="dasboard.php?page=home"><input type="button" value="Cencel">
	</a>
</form>
</div>
<script type="text/javascript">
	<?php echo $jsAr; ?>
	function changeValue(id) {
		document.getElementById('ukuran').value = prdName[id].nama_ukuran;
	}
	<?php echo $jsArr; ?>
	function Valuee(id) {
		document.getElementById('nama').value = prd[id].nama;
	}
</script>