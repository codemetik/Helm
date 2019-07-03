<?php 
$koneksi = mysqli_connect("localhost","root","","helm");
 /*$koneksi = mysqli_connect("localhost","id9893417_arman04lana","arman04lana","id9893417_armanlana");*/
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>