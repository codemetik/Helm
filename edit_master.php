<form action="proses_edit_master.php" method="post" enctype="multipart/form-data">
	<?php 
		include "koneksi.php";
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran WHERE X.id_master = '$_GET[id]' ORDER BY id_master");
		$data = mysqli_fetch_array($query);
	?>
	<table class="das_table">
		<tr>
			<th>ID Master</th>
			<td>
				<input type="text" name="id" value="<?php echo $data['id_master'] ?>" readonly>
			</td>
		</tr>
		<tr>
			<th>ID Produk</th>
			<td><input type="text" name="produk" value="<?php echo $data['id_produk'] ?>" readonly></td>
		</tr>
		</tr>
			<th>Gambar</th>
			<td>
				<?php echo "<img src='images/".$data['gambar']."' width='100' height='100'>" ?>
			</td>
		</tr>
		<tr>
			<th>Nama</th>
			<td>
				<input type="text" name="name" value="<?php echo $data['nama'] ?>" readonly>
			</td>
		</tr>
		<tr>
			<th>Ukuran</th>
			<td><input type="text" name="ukuran" value="<?php echo $data['nama_ukuran'] ?>" readonly></td>
		</tr>
		<tr>
			<th>Stok</th>
			<td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>
		</tr>
		<tr>
			<th>Harga</th>
			<td><input type="text" name="harga" value="<?php echo $data['harga'] ?>"></td>
		</tr>
		<tr><td></td>
			<td>
				<input type="submit" name="ubah" value="Update">
				<a href="dasboard.php?page=data_master">Cencel</a>
			</td>
		</tr>
	</table>
</form>