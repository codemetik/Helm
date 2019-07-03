<form action="proses_edit.php" method="post" enctype="multipart/form-data">
	<?php 
		include "koneksi.php";
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
		$data = mysqli_fetch_array($query);
	?>
	<table class="das_table">
		<tr>
			<th>Id</th>
			<td>
				<input type="text" name="id" value="<?php echo $data['id_produk'] ?>" readonly>
			</td>
		</tr>
		</tr>
			<th>Gambar</th>
			<td>
				<?php echo "<img src='images/".$data['gambar']."' width='100' height='100'>" ?>
				<input type="checkbox" name="ubah" value="true">
				<input type="file" name="gambar">
			</td>
		</tr>
		<tr>
			<th>Nama</th>
			<td>
				<input type="text" name="name" value="<?php echo $data['nama'] ?>">
			</td>
		</tr>
		<tr><td></td>
			<td>
				<input type="submit" name="update" value="Update"><a href="dasboard.php?page=home">Cencel</a>
			</td>
		</tr>
	</table>
</form>