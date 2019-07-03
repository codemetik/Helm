<?php 

include "koneksi.php";

if (isset($_POST['submit'])) {

$id = $_POST['id'];
$id_prod = $_POST['id_produk'];
$ukrn = $_POST['id_ukuran'];
$stk = $_POST['stok'];
$hrg = $_POST['harga'];

$query = "INSERT INTO data_master(id_master, id_produk, id_ukuran, stok, harga) VALUES('$id','$id_prod','$ukrn','$stk','$hrg')";
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:dasboard.php?page=home");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>