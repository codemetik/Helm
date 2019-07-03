<div class="das_atas">
		<ul class="ul_atas">
			<li class="li_atas"><a href="dasboard.php?page=insert">Tambah Produk</a></li>
			<li><a href="dasboard.php?page=ukuran">Masukan Ukuran & Harga</a></li>
		</ul>
</div>
<center><h1 style="color: white;">Data Barang</h1></center>
<div class="das_bawah">
	<table class="das_table">
		<thead>
		<tr>
			<th style="width: 100px;">ID Produk</th>
			<th style="width: 120px;">Gambar</th>
			<th>Nama</th>
			<th>Cek</th>
			<th>Option</th>
		</tr>
		</thead>
			<?php
			include "koneksi.php";

			$query = mysqli_query($koneksi, "SELECT * FROM produk");
			while ($data = mysqli_fetch_array($query)) {?>
		<tbody>
		<tr>
			<td><?php echo $data['id_produk']; ?></td>
			<td><?php echo "<img src='images/".$data['gambar']."' width='100' height='100'>" ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><ul class="ul_atas"><li class="li_atas"><a href="dasboard.php?page=detail&id=<?php echo $data['id_produk'] ?>">Detail Produk</a></li></ul></td>
			<td><ul class="ul_atas"><li class="li_atas"><a href="dasboard.php?page=update&id=<?php echo $data['id_produk'] ?>">Edit</a></li>
				<li><a href="hapus_produk.php?id=<?php echo $data['id_produk']?>">Hapus</a></li></ul></td>
			<?php } ?>
		</tr>
		</tbody>
	</table>
</div>