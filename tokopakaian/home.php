<?php

session_start();
if (!isset($_SESSION["nama"])) {
header("Location: login.php");
}
// buka koneksi dengan MySQL
include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	body {
	background-image: url(image/kk.jpg);
	background-size: cover;
	background-attachment: fixed;
   }
	</style>

	<title>Toko Pakaian</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
</head>
<body>
	<?php 
	include ('./formatharga/lib.php');
	?>

	<?php
	include('dbconnect.php');

	//query
	$query = "SELECT * FROM pakaian";

	$result = mysqli_query($link , $query);

	?>

	<div class="container bg-success" style="padding-top: 10px; padding-bottom: 35px;">
		<p id="tanggal" style="text-align: right; font-size: 15px"><?php echo date("d M Y"); ?></p>
		<h1><center> TOKO PAKAIAN </center></h1>
		<div class="row">
			<div class="col-sm-12">
				<a href="tambah.php" class="btn btn-info">Tambah Pakaian</a>
				<h3><center>Daftar Tabel Pakaian<center></h3>
				<table class="table table-striped table-hover dtabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Pakaian</th>
							<th>Warna Pakaian</th>
							<th>Ukuran Pakaian</th>
							<th>Harga Pakaian</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody> 
						
						<?php
							$no = 1;  
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['jenis_pakaian']; ?></td>
							<td><?php echo $row['warna_pakaian']; ?></td>
							<td><?php echo $row['ukuran_pakaian']; ?></td>
							<td><?php echo rupiah ($row['harga_pakaian']); ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['id_pakaian'];?>" class="btn btn-success" role="button">Edit</a>
								<a href="delete.php?id=<?php echo $row['id_pakaian']?>" class="btn btn-danger" role="button">Delete</a>
							</td>
						</tr>

						<?php
							}
							mysqli_close($link); 
						?>
					</tbody>
				</table><a href="logout.php" class="btn btn-danger">Keluar</a>
			</div>
		</div>
	</div>
</body>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.dtabel').DataTable();
	} );
	</script>
</html> 