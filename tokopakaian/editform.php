<?php
session_start();
if (!isset($_SESSION["nama"])) {
header("Location: login.php");
}
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
	
	<title>Form Edit Pakaian</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
$id = $_GET['id']; 

include('dbconnect.php');

//query
$query = "SELECT * FROM pakaian WHERE id_pakaian='$id'";
$result = mysqli_query($link, $query);

?>

<div class="container bg-success" style="padding-top: 20px; padding-bottom: 20px;">

	<h3>Update Data Buku</h3>
	<form role="form" action="edit.php" method="get">

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
		 	
		?>

		<input type="hidden" name="id_pakaian" value="<?php echo $row['id_pakaian']; ?>">

		<div class="form-group">
			<label>Jenis Pakaian</label>
			<input type="text" name="jenis_pakaian" class="form-control" value="<?php echo $row['jenis_pakaian']; ?>">			
		</div>

		<div class="form-group">
			<label>Warna Pakaian</label>
			<input type="text" name="warna_pakaian" class="form-control" value="<?php echo $row['warna_pakaian']; ?>">			
		</div>

		<div class="form-group">
			<label>Ukuran Pakaian</label>
			<input type="text" name="ukuran_pakaian" class="form-control" value="<?php echo $row['ukuran_pakaian']; ?>">			
		</div>

		<div class="form-group">
			<label>Harga Pakaian</label>
			<input type="text" name="harga_pakaian" class="form-control" value="<?php echo $row['harga_pakaian']; ?>">			
		</div>
		<button type="submit" class="btn btn-success btn-block">Update Pakaian</button><br><br>
		<a href="index.php" class="btn btn-danger btn-block">Batal</a>
		<?php 
		}
		mysqli_close($link);
		?>				
	</form>
</div>
</body>
</html> 