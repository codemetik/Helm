<?php
include "koneksi.php";
$cari_kd=mysqli_query($koneksi, "SELECT max(id_faktur)as otm from penjualan");
$tm_cari=mysqli_fetch_array($cari_kd);
$kode=substr($tm_cari['otm'], 2,3);
$tambah=$kode+1;
if ($tambah<10) {
		$ide="FA00".$tambah;
	}else{
		$ide="FA0".$tambah;
	}
?>
<center><h1 style="color: white;">Transaksi Penjualan</h1></center>
<div class="insert">
	<h2>PENJUALAN</h2>
	<form method="post" action="hal_dasboard/proses_penjualan.php">
	<table border="1">
		<tr>
			<td>ID Penjualan</td>
			<td><input type="text" name="id_fak" value="<?php echo $ide; ?>" readonly></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td><input type="text" name="tgl" value="<?php echo date('d - M - Y'); ?>"></td>
		</tr>
		<tr>
			<td>Nama Produk</td>
			<td>
				<select style="width: 150px;" name="master"  onchange='changeValue(this.value)' required>
					<option value="">-Pilih-</option>
<?php
 $query=mysqli_query($koneksi, "SELECT * FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC;"); 
 $result = mysqli_query($koneksi, "SELECT * FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran");  
 $jsAr = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="master"  value="' . $row['nama'] . ',' . $row['nama_ukuran'] . '">' . $row['nama'] . ',' . $row['nama_ukuran'] . '</option>';  
 $jsAr .= "prdName['" . $row['nama'] . "," . $row['nama_ukuran'] . "'] = {id_master:'".addslashes($row['id_master'])."', stok:'".addslashes($row['stok'])."', harga:'".addslashes($row['harga'])."'};\n";
  }
  ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>ID master</td>
			<td><input type="text" name="mstr" id="mstr" readonly></td>
		</tr>
		<tr>
			<td>Stok</td>
			<td><input type="text" name="stok" id="stok" readonly></td>
		</tr>
		<tr>
			<td>harga</td>
			<td><input type="text" name="harga" id="harga" readonly></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><input type="text" name="jumlah" id="jumlah" onchange="totale()"></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><input type="text" name="total" id="total" readonly></td>
		</tr><br>
		<tr>
			<td>Bayar</td>
			<td><input type="text" name="bayar" id="bayar" onchange="byr()"></td>
		</tr>
		<tr>
			<td>Kembali</td>
			<td><input type="text" name="kembali" id="kembali"></td>
		</tr>
	</table><br><br>
	<a href="">
		<input type="submit" name="simpan" value="Simpan">
	</a>
	<a href="dasboard.php?page=dua"><input type="button" value="Cencel">
	</a>
</form>
<script type="text/javascript">
	<?php echo $jsAr; ?>
	function changeValue(id) {
		document.getElementById('mstr').value = prdName[id].id_master;
		document.getElementById('stok').value = prdName[id].stok;
		document.getElementById('harga').value = prdName[id].harga;
	};

	function totale() {
		var jmle = parseInt(document.getElementById('jumlah').value);
		var stke = parseInt(document.getElementById('stok').value);

		if (jmle > stke) {
			alert("Maaf Stok cuma ada "+stke);
			document.getElementById('jumlah').value = stke;
			var juml = parseInt(document.getElementById('jumlah').value) * parseInt(document.getElementById('harga').value);
			var tot = juml;
			document.getElementById('total').value = tot;
		}else{
			var juml = parseInt(document.getElementById('jumlah').value) * parseInt(document.getElementById('harga').value);
			var tot = juml;
			document.getElementById('total').value = tot;
		}
	}

	function byr() {
		var hrg = parseInt(document.getElementById('harga').value);
		var bayr = parseInt(document.getElementById('bayar').value);
		var tot = parseInt(document.getElementById('total').value);
		var kembli = parseInt(document.getElementById('kembali').value);

if (bayr >= hrg ) {}
var balek = bayr - tot;
	document.getElementById('kembali').value = balek;
	}

	
	
</script>
</div>