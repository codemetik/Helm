<?php 
	session_start();
	if ($_SESSION['status']!="login") {
		# code...
	header("location:halaman.php");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Helm Pantura</title>
	<meta charset="utf-8" name="viewport" content="width-device-width, initiaol-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="das_utami.css">
</head>
<body>
<div class="container">
<div class="header"><h1>Helm Pantura</h1></div>
<nav class="topnav">
	<a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
<p class="nameuser">Selamat Datang <?php echo "<b>".$_SESSION['username']."</b><a href='submit_out.php'>LOGOUT</a>"; ?></p>
</nav>
<div class="das_utama">
	<div class="sidenav" id="sideNavigation">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<ul class="ul_kir">
			<li class="li_kir"><a href="dasboard.php?page=dua">Home</a></li>
			<li><a href="dasboard.php?page=penjualan">Transaksi</a></li>
			<li><a href="dasboard.php?page=data_barang">Data Barang</a></li>
			<li><a href="dasboard.php?page=data_master">Data Master</a></li>
			<li><a href="dasboard.php?page=laporan">Laporan</a></li>
		</ul>
	</div>
	<div class="das_kanan">
		<?php if (isset($_GET['page'])){
			$page = $_GET['page'];
			switch ($page) {
				case 'home':
					include "hal_dasboard/hal_utama.php";
					break;
				case 'data_barang':
					include "hal_dasboard/hal_utama.php";
					break;
				case 'dua':
				include "hal_dasboard/hal_kedua.php";
					break;
				case 'insert':
					include "hal_dasboard/insert.php";
					break;
				case 'update':
					include "edit_produk.php";
					break;
				case 'update_master':
					include "edit_master.php";
					break;
				case 'detail':
					include "detail_produk.php";
					break;
				case 'ukuran':
					include "hal_dasboard/input_ukuran.php";
					break;
				case 'penjualan':
					include "hal_dasboard/input_penjualane.php";
					break;
				case 'data_master':
					include "hal_dasboard/data_master.php";
					break;
				case 'detail_master':
					include "hal_dasboard/detail_datamaster.php";
					break;
				case 'laporan':
					include "hal_dasboard/laporan.php";
					break;
				case 'lap_produk':
					include "hal_dasboard/lap_produk.php";
					break;
				case 'lap_produk_masuk':
					include "hal_dasboard/lap_produk_masuk.php";
					break;
				case 'lap_penjualan':
					include "hal_dasboard/lap_penjualan.php";
					break;
				default:
					echo "Halaman tidak ada";
					break;
			}
		}else{
			include "hal_dasboard/hal_kedua.php";
		}
		?>
	</div>
</div>
</div>
<script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("container").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("container").style.marginLeft = "0";
}
</script>
</body>
</html>