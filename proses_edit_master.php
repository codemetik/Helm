<?php 
include "koneksi.php";

$id = $_POST['id'];
$stk = $_POST['stok'];
$hrg = $_POST['harga'];

$query = mysqli_query($koneksi, "UPDATE data_master SET stok='".$stk."', harga= '".$hrg."' WHERE id_master ='".$id."' ");
if ($query) {
	header("location:dasboard.php?page=data_master");
}else{
	echo "Maaf, Terjadi Kesalahan saat masukan data";
}
?>