<?php 

include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk='".$id."'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);
if (is_file("images/".$data['gambar']))
	unlink("images/".$data['gambar']);

$query2 = "DELETE FROM produk WHERE id_produk='".$id."'";
$sql2 = mysqli_query($koneksi,$query2);
if ($sql2) {
	header("location:dasboard.php?page=home");
}else{
	echo "Data gagal di Hapus <a href='dasboard.php?page=home'>Kembali</a>";
}
?>