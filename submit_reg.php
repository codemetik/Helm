<?php 
include 'koneksi.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);

	if (!empty($user)&&!empty($pass)) {
	# code...
	$sql = mysqli_query($koneksi, "INSERT INTO user (id, username, password) values('','$user','$pass');");
	echo "<script>alert('regisrasi berhasil')";
	header("location:halaman.php");
	echo "</script>";
	}else{
	echo "Maaf tidak Boleh ada field yg kosong !";
	}
	mysql_close($koneksi);
?>