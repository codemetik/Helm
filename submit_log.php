<?php 
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);

if (!empty($user) && !empty($pass)) {
	# code...
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
$result = mysqli_num_rows($sql);
if ($result>0) {
	# code...
	session_start();
	$_SESSION['username']=$user;
	$_SESSION['status']="login";
	header("location:dasboard.php");
}else{
	echo "Username dan Password Salah !";
}
}else{
	echo "Email Dan password Tidak Boleh Kosong, Silahkan Di isi";
}
?>