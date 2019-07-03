<center><h1 style="color: white;">Data Master</h1></center>
<div class="das_bawah">
	<table class="das_table">
		<thead>
		<tr>
			<th>ID Master</th>
			<th>ID Produk</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Ukuran</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>
				<?php 
				include "koneksi.php";

				$qwer = mysqli_query($koneksi, "SELECT CONCAT('Rp. ',FORMAT(SUM(harga * stok),0)) AS total FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC");
while ($dat =mysqli_fetch_array($qwer)) {
 	echo $dat['total'];
 } 
				?>
			</th>
			<th>Option</th>
		</tr>
		</thead>
			<?php
			include "koneksi.php";

			$query = mysqli_query($koneksi, "SELECT X.id_master, Y.id_produk, Z.id_ukuran, gambar, nama, Z.nama_ukuran, stok, CONCAT('RP. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(harga * stok,0)) AS total FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC");
			while ($data = mysqli_fetch_array($query)) {?>
		<tbody>
		<tr>
			<td><?php echo $data['id_master']; ?></td>
			<td><?php echo $data['id_produk']; ?></td>
			<td><?php echo "<img src='images/".$data['gambar']."' width='50' height='50'>" ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['nama_ukuran']; ?></td>
			<td><?php echo $data['stok']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['total']; ?></td>
			<td style="padding: 0px;">
				<ul class="ul_atas">
					<li class="li_atas">
						<a href="dasboard.php?page=update_master&id=<?php echo $data['id_master'] ?>">Edit Stok & Harga</a>
					</li>
				</ul>
			</td>
			<?php } ?>
		</tr>
		</tbody>
	</table>
</div>