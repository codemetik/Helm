<div class="das_atas">
		<ul class="ul_atas">
			<li class="li_atas"><a href="dasboard.php?page=penjualan">Penjualan</a></li>
		</ul>
</div>
<div class="das_bawah">
	<table class="das_table">
		<thead>
		<tr>
			<th style="width: 100px;">ID Faktur</th>
			<th style="width: 100px;">Tanggal</th>
			<th style="width: 100px;">ID Master</th>
			<th style="width: 120px;">Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total</th>
		</tr>
		</thead>
			<?php
			include "koneksi.php";

			$query = mysqli_query($koneksi, "SELECT * FROM penjualan");
			while ($data = mysqli_fetch_array($query)) {?>
		<tbody>
		<tr>
			<td><?php echo $data['id_faktur']; ?></td>
			<td><?php echo $data['tanggal']; ?></td>
			<td><?php echo $data['id_master']; ?></td>
			<td><?php echo $data['nama_produk']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['total']; ?></td>
			<?php } ?>
		</tr>
		</tbody>
	</table>
</div>