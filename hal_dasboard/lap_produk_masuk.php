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
		<td>: Laporan Produk</td>
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
			<th style="width: 100px;">ID Master</th>
			<th style="width: 120px;">ID Produk</th>
			<th>ID Ukuran</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Ukuran</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
		</thead>
			<?php
			include "../koneksi.php";

			$query = mysqli_query($koneksi, "SELECT X.id_master, Y.id_produk, Z.id_ukuran, gambar, nama, Z.nama_ukuran, stok, CONCAT('RP. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(harga * stok,0)) AS total FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC");
			while ($data = mysqli_fetch_array($query)) {?>
		<tbody>
		<tr>
			<td><?php echo $data['id_master']; ?></td>
			<td><?php echo $data['id_produk']; ?></td>
			<td><?php echo $data['id_ukuran']; ?></td>
			<td><?php echo "<img src='../images/".$data['gambar']."' width='100' height='100'>" ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['nama_ukuran']; ?></td>
			<td><?php echo $data['stok']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['total']; ?></td>
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