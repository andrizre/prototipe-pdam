<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/print.css">

	<title>Halaman Registrasi</title>
</head>
<body>
<style>
		body{
			background-image: url(img/bg.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
<div class="container">

<form action="" method="POST" class="login-username">
	<p class="login-text" style="font-size: 2rem; font-weight: 600;">Register</p>
		<div class="input-group">
			<label for="username">Username :</label>
			<input type="text" placeholder="masukan username" name="username" id="username">
		</div>
		<div class="input-group">
			<label for="password">Password :</label>
			<input type="password" placeholder="masukan password" name="password" id="password">
		</div>
		<div class="input-group">
			<label for="password2">Konfirmasi Password :</label>
			<input type="password" placeholder="konfirmasi password" name="password2" id="password2">
		</div><br>
		<div class="input-group">
			<button type="submit" class="btn" name="register">Register!</button>
		</div>
	</p class="login-register-text">Already have an account? <a href="index.php">Sign Up</a>.</p>
</form>
</div>
</body>
</html>