<?php 
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['name'];

if ($_POST['ubah']) {
	$gbr = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$fotobaru = date('dmYHis').$gbr;
	$path = "images/".$fotobaru;
	if (move_uploaded_file($tmp, $path)) {
		$query = "SELECT * FROM produk WHERE id_produk='".$id."'";
		$sql = mysqli_query($koneksi, $query);

		$data = mysqli_fetch_array($sql);

		if (is_file("images/".$data['gambar']))
			unlink("images/".$data['gambar']);

		$query = "UPDATE produk set nama='".$nama."', gambar='".$fotobaru."' WHERE id_produk='".$id."'";

		$sql = mysqli_query($koneksi, $query);

		if ($sql) {
			header("location:dasboard.php?page=home");
		}else{
			echo " maaf terjadi kesalahan saat menyimpan ke database";
			echo "<br><a href='dasboard.php?page=home'>kembali ke from</a></br>";
		}
	}else{
		echo "maaf, gambar gagal untuk di upload";
		echo "<br><a href='dasboard.php?page=update'>kembali ke from</a></br>";
	}
}else{
	//jika user tidak menceklish checkbox.
	$query = "UPDATE produk set nama='".$nama."' WHERE id_produk='".$id."'";
	$sql = mysqli_query($koneksi, $query);
	if ($sql) {
		header("location:dasboard.php?page=home");
	}else{
		echo "maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database";
		echo "<><a href='dasboard.php?page=home'>kembali ke from</a>";
	}
}
?>