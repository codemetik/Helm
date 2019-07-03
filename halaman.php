<!DOCTYPE html>
<html>
<head>
	<title>Penjualan Helm</title>
	<meta charset="utf-8" name="viewport" content="width-device-width, initiaol-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="countainer">
<div class="header"><h1>Pesanan Helm</h1></div>
<div class="kanan"><i>Selamat Datang Di Toko Kami</i></div>
<div class="login">
	<?php include "login.php"; ?>
</div>
	<?php if (isset($_GET['page'])){
		$page = $_GET['page'];
		switch ($page) {
			case 'register':
			?>
<div class="reg">
	<?php include "register.php";	?>	
	<?php break;
			default:
				echo "<center><h1>Halaman Tidak Ada<h1></center>";
			break;
		}
	}
	?>
</div>
</body>
</html>