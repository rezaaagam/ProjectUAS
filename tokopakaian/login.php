<?php
if (isset($_GET["pesan"])) {
	$pesan = $_GET["pesan"]; }
if (isset($_POST["submit"])) 
{
	$username = htmlentities(strip_tags(trim($_POST["username"])));
	$password = htmlentities(strip_tags(trim($_POST["password"])));
	$pesan_error="";
	if (empty($username)) {
		$pesan_error .= "Username belum diisi <br>";
	}
	if (empty($password)) {
		$pesan_error .= "Password belum diisi <br>";
	}
	include("dbconnect.php");
	$username = mysqli_real_escape_string($link,$username);
	$password = mysqli_real_escape_string($link,$password);
	// $password_sha1 = sha1($password);
	$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result) == 0 ) {
		$pesan_error .= "Username dan/atau Password tidak sesuai";
	}
	mysqli_free_result($result);
	mysqli_close($link);
	if ($pesan_error === "") {
		session_start();
		$_SESSION["nama"] = $username;
		header("Location: index.php");
	}
}
else {
	$pesan_error = "";
	$username = "";
	$password = "";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<style>
	body {
	background-image: url(image/kk.jpg);
	background-size: cover;
	background-attachment: fixed;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 90vh;
	flex-direction: column;
	}

	*{
		font-family: sans-serif;
		box-sizing: border-box;
	}

	form {
		width: 500px;
		border: 2px solid #ccc;
		padding: 30px;
		border-radius: 15px;
	}

	h2 {
		text-align: center;
		margin-bottom: 40px;
	}

	input {
		display: block;
		border: 2px solid #ccc;
		width: 95%;
		padding: 10px;
		margin: 10px auto;
		border-radius: 5px;
	}
	label {
		color: #fff;
		font-size: 18px;
		padding: 10px;
		font-style: italic;
		font-family: time-new-roman;
	}

	button {
		float: right;
		background: #555;
		padding: 10px 15px;
		color: #fff;
		border-radius: 5px;
		margin-right: 10px;
		border: none;
	}
	button:hover{
		opacity: .7;
	}
	.error {
	   background: #F2DEDE;
	   color: #A94442;
	   padding: 10px;
	   width: 95%;
	   border-radius: 5px;
	   margin: 20px auto;
	}

	h1 {
		text-align: center;
		color: #fff;
		font-size: 40px;
		font-family: time-new-roman;
	}

	a {
		float: right;
		background: #555;
		padding: 10px 15px;
		color: #fff;
		border-radius: 5px;
		margin-right: 10px;
		border: none;
		text-decoration: none;
	}
	a:hover{
		opacity: .7;
	}

	legend{
		color: #fff;
		font-family: time-new-roman;
	}
	</style>
</head>
<body>
	<div class="container">
		<h1>Selamat Datang</h1>

<?php
if (isset($pesan)) {
	echo "<div class=\"pesan\">$pesan</div>";
}
if ($pesan_error !== "") {
	echo "<div class=\"error\">$pesan_error</div>";
}
?>

	<form action="login.php" method="post">
      <fieldset>
         <legend>Login</legend>
            <p>
               <label for="username">Username : </label>
               <input type="text" name="username" id="username" value="<?php echo $username ?>">
            </p>
            <p>
               <label for="password">Password : </label>
               <input type="password" name="password" id="password" value="<?php echo $username ?>">
            </p>
            <p>
               <input type="submit" name="submit" value="LOGIN">
            </p>
      </fieldset>
	</form>
	</div>
</body>
</html>