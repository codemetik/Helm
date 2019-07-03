<div class="produk_detail">
<form method="post" enctype="multipart/form-data">
	<?php 
		include "koneksi.php";
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
		$data = mysqli_fetch_array($query);
	?>
	<table class="das_table">
		<tr>
			<th style="width: 150px;">Id</th>
			<td>
				<input type="text" name="id" value="<?php echo $data['id_produk'] ?>" readonly>
			</td>
		</tr>
		</tr>
			<th style="width: 150px;">Gambar</th>
			<td>
				<?php echo "<img src='images/".$data['gambar']."' width='100' height='100'>" ?>
			</td>
		</tr>
		<tr>
			<th style="width: 150px;">Nama</th>
			<td>
				<input type="text" name="name" value="<?php echo $data['nama'] ?>" readonly>
			</td>
		</tr>
		<tr>
			<th style="width: 150px;">Cek</th>
			<td><select name="id_barang" onchange='changeValue(this.value)' required>
					<option value="">-Pilih-</option>
 <?php
 $query=mysqli_query($koneksi, "SELECT * FROM data_master Y
JOIN produk X ON Y.`id_produk` = X.`id_produk`
JOIN ukuran_helm Z ON Y.`id_ukuran` = Z.`id_ukuran` 
ORDER BY Z.id_ukuran ASC"); 
 $result = mysqli_query($koneksi, "SELECT * FROM data_master Y
JOIN produk X ON Y.`id_produk` = X.`id_produk`
JOIN ukuran_helm Z ON Y.`id_ukuran` = Z.`id_ukuran`
WHERE X.id_produk ='$_GET[id]'");  
 $jsArray = "var prdName = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="id_barang"  value="' . $row['nama_ukuran'] . '">' . $row['nama_ukuran'] . '</option>';  
 $jsArray .= "prdName['" . $row['nama_ukuran'] . "'] = {stok:'" . addslashes($row['stok'])."', harga:'" . addslashes($row['harga'])."'};\n";
  }
  ?>
				</select></td>
		</tr>
		<tr>
			<th style="width: 150px;">Stok</th>
			<td><input type="text" name="stok" id="stok" readonly></td>
		</tr>
		<tr>
			<th style="width: 150px;">Harga /pcs</th>
			<td><input type="text" name="harga" id="harga" readonly></td>
		</tr>
		<tr><td></td>
			<td><a href="index.php?page=index_1">Kembali</a>
			</td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('stok').value = prdName[id].stok;
    document.getElementById('harga').value = prdName[id].harga;
};
</script>