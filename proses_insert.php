<?php 

include "koneksi.php";

if (isset($_POST['submit'])) {

$id = $_POST['id'];
$nma = $_POST['nama'];
/*$ukrn = $_POST['ukuran'];
$hrg = $_POST['harga'];*/
$gbr = $_FILES['gambar']['name'];

$query = "INSERT INTO produk(id_produk, gambar, nama) VALUES('$id','$gbr','$nma')";
move_uploaded_file($_FILES['gambar']['tmp_name'],'images/'.$gbr);
$sql = mysqli_query($koneksi, $query);
if ($sql) {
	echo "<script>alert('Data berhasil di upload !'); history.go(-1);</script>";
	header("location:dasboard.php?page=home");
}else{
	echo "<script>alert('Data gagal di upload !'); history.go(-1);</script>";
}

}
?>