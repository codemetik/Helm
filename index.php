<!DOCTYPE html>
<html>
<head>
	<title>Penjualan Helm</title>
	<style type="text/css">
		*{
			margin: 0px auto;
		}
		.container{
			margin-top: 0;
			position: relative;
		}
	.header{
			position: fixed;
			color: white;
			background-color: grey;
			height: 50px;
			width: 100%;
			z-index: 1000;
		}

		.box-produk{
			position: relative;
			margin: 0px 20px;
		}
		.produk{
			float: left;
			border: 5px solid black;
			margin-top: 60px;
			width: 150px;
			height: 220px;
			background-color: white;

		}
		.produk_detail{
			float: left;
			border: 5px solid black;
			margin-top: 60px;
			width: 370px;
			height: 380px;
			background-color: white;

		}
		img{
			border:1px solid white;
			background-color: white;
		}
		p{
			margin-top: 0px;
			border:1px solid grey;
			float: center;
			color: black
		}
		ul{
			margin: 4px;
	list-style:none;
}
li a{
	text-decoration: none;
}
.ul_atas li{
	display: inline;
	background-color: red;
	padding: 5px;
}
.das_table {
	margin-top: 0px;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.das_table td, .das_table th {
  border: 1px solid #ddd;
  padding: 8px;
}

.das_table tr:nth-child(even){
  background-color: #f2f2f2;
}

.das_table tr:hover {background-color: #ddd;}

.das_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
  width: 150px;
}
.das_table td{
	background-color: #808080;
}
	</style>
</head>
<body>
	<div class="container">
<div class="header">
	<center><h1>Helm</h1></center>
</div>
<div class="box-produk">
<?php 
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	switch ($page) {
		case 'detail':
			include "index_2.php";
			break;
		case 'index_1':
			include "index_1.php";
			break;
		default:
			echo "<h1>Maaf Halaman Tidak Ada</h1>";
			break;
	}
}else{
	include "index_1.php";
}

?>
</div>
</div>
</body>
</html>