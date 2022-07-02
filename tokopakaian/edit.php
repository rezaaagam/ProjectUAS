<?php
// periksa apakah user sudah login, cek kehadiran session name
// jika tidak ada, redirect ke login.php
session_start();
if (!isset($_SESSION["nama"])) {
header("Location: login.php");
}
// buka koneksi dengan MySQL
include('dbconnect.php');

$id = $_GET['id_pakaian'];
$jenis = $_GET['jenis_pakaian'];
$warna = $_GET['warna_pakaian'];
$ukuran = $_GET['ukuran_pakaian'];
$harga = $_GET['harga_pakaian'];

//query update
$query = "UPDATE pakaian SET jenis_pakaian='$jenis' , warna_pakaian='$warna' , ukuran_pakaian='$ukuran' , harga_pakaian='$harga' WHERE id_pakaian='$id' ";

if (mysqli_query($link, $query)) {
	header("location:home.php");
	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($link);
}

mysqli_close($link);
?>