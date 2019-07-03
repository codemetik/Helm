<!DOCTYPE html>
<html>
<head>
	<title>Helm Pantura</title>
	<link rel="stylesheet" type="text/css" href="../das_utami.css">
	<style type="text/css">
		th{
			text-align: left;
		}
	</style>
</head>
<body>
	<br>
<table>
	<tr>
		<th>Nama</th>
		<td>: Laporan Data Barang</td>
	</tr>
	<tr>
		<th>Toko</th>
		<td>: Helm Pantura</td>
	</tr>
	<tr>
		<th>Tanggal</th>
		<td>: <?php echo date('d - M - Y') ?></td>
	</tr>
</table>
<hr size="10px;" color="black">
<br>
<div class="das_bawah">
	<table class="das_table">
		<thead>
		<tr>
			<th style="width: 100px;">ID Produk</th>
			<th style="width: 120px;">Gambar</th>
			<th>Nama</th>
		</tr>
		</thead>
			<?php
			include "../koneksi.php";

			$query = mysqli_query($koneksi, "SELECT * FROM produk");
			while ($data = mysqli_fetch_array($query)) {?>
		<tbody>
		<tr>
			<td><?php echo $data['id_produk']; ?></td>
			<td><?php echo "<img src='../images/".$data['gambar']."' width='100' height='100'>" ?></td>
			<td><?php echo $data['nama']; ?></td>
			<?php } ?>
		</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>