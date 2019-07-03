<?php 
include "../koneksi.php";

$id = $_POST['id_fak'];
$tgl = $_POST['tgl'];
$nama_produk = $_POST['master'];
$mstr = $_POST['mstr'];
$harga = $_POST['harga'];
$jml = $_POST['jumlah'];
$tot = $_POST['total'];

$query = mysqli_query($koneksi, "INSERT INTO penjualan (id_faktur, tanggal, id_master, nama_produk, harga, jumlah, total )VALUES('$id','$tgl','$mstr','$nama_produk','$harga','$jml','$tot')");
if ($query) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:../dasboard.php?page=dua");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}



?>