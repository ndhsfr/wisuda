<?php
include_once dirname(__FILE__).'/../.plugins/.remake-secure/index.php';

$host = "localhost"; // server
$user = "wisudago_uwisuda"; // username
$pass = "Br4ngk4s%Wisuda#*"; // password
$database = "wisudago_dwisuda"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $database); // menggunakan mysqli_connect

if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}
?>