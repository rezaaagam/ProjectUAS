<?php
// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
session_start();
if (!isset($_SESSION["nama"])) {
header("Location: login.php");
}
// buka koneksi dengan MySQL
include('dbconnect.php');

$jenis = $_POST['jenis_pakaian'];
$warna = $_POST['warna_pakaian'];
$ukuran = $_POST['ukuran_pakaian'];
$harga = $_POST['harga_pakaian'];


$query =  "INSERT INTO pakaian(jenis_pakaian , warna_pakaian , ukuran_pakaian , harga_pakaian) VALUES('$jenis' , '$warna' , '$ukuran' , '$harga')";

if (mysqli_query($link , $query)) {
	header("location:home.php");
}
else{
	echo "ERROR, tidak berhasil". mysqli_error($link);
}

mysqli_close($link);
?>