<?php
$koneksi = mysqli_connect("localhost","root","","db_koperasi");
 
// Check connection
if (!$koneksi){
	die ("Koneksi database gagal : " . mysqli_connect_error());
}
?>