<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: login.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/print.css">
	<title>Halaman Login</title>
</head>
<body>
	<style>
		body{
			background-image: url(img/bg.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
	<button onclick="showLoginForm()">Admin</button>
  

  <div id="loginContainer" style="display: none;" class="container">
    <?php if( isset($error) ) : ?>
      <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post" class="login-username">
    	<button onclick="hideLoginForm()" style="display: none;">Kembali</button>
    	<button class="btn"><a href="coba.php">Informasi Tagihan</button>.</p>
      <p class="login-text" style="font-size: 2rem; font-weight: 600;">Login</p>
      <div class="input-group">
        <label for="username">Username :</label>
        <input type="text" placeholder="username" name="username" id="username">
      </div>
      <div class="input-group">
        <label for="password">Password :</label>
        <input type="password" placeholder="password" name="password" id="password">
      </div>
      <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="login">Login</button>
      </div>
      <p class="login-register-text">Don't have an account? <a href="registrasi.php">Register Here</a>.</p>
      
      	
    </form>
  </div>

  <script>
    function showLoginForm() {
      var loginContainer = document.getElementById("loginContainer");
      var showButton = document.querySelector("button[onclick='showLoginForm()']");
      var hideButton = document.querySelector("button[onclick='hideLoginForm()']");

      loginContainer.style.display = "block";
      showButton.style.display = "none";
      hideButton.style.display = "inline-block";
    }

    function hideLoginForm() {
      var loginContainer = document.getElementById("loginContainer");
      var showButton = document.querySelector("button[onclick='showLoginForm()']");
      var hideButton = document.querySelector("button[onclick='hideLoginForm()']");

      loginContainer.style.display = "none";
      showButton.style.display = "inline-block";
      hideButton.style.display = "none";
    }
  </script>
</body>
</html>