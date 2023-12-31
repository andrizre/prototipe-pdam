<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
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
	
	<title>Tambah Data Tagihan</title>
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
	<form action="" method="post" class="login-username" enctype="multipart/form-data">
		<p class="login-text" style="font-size: 1 rem; font-weight: 600;">Tambahkan Data Pemain</p>
			<div class="input-group">
				<label for="nama">Nama : </label>
				<input type="text" placeholder="masukan nama tagihan" name="nama" id="nama">
			</div>
			<div class="input-group">
				<label for="npm">ID : </label>
				<input type="text" placeholder="masukan ID tagihan" name="npm" id="npm">
			</div>
			<div class="input-group">
				<label for="alamat">Alamat : </label>
				<input type="text" placeholder="masukan alamat tagihan" name="alamat" id="alamat">
			</div>
			<div class="input-group">
				<label for="tanggal">BLN/THN :</label>
				<input type="text" placeholder="masukan tanggal tagihan" name="tanggal" id="tanggal">
			</div>
			<div class="input-group">
				<label for="meteran">Meteran :</label>
				<input type="text" placeholder="masukan meteran tagihan" name="meteran" id="meteran">
			</div>
			<div class="input-group">
				<label for="pemakaian">Pemakaian :</label>
				<input type="text" placeholder="masukan pemakaian tagihan" name="pemakaian" id="pemakaian">
			</div>
			<div class="input-group">
				<label for="tarif">Tarif :</label>
				<input type="text" placeholder="masukan tarif pemain" name="tarif" id="tarif">
			</div>
			<div class="input-group">
				<label for="tagihan">Tagihan :</label>
				<input type="text" placeholder="masukan status tagihan" name="tagihan" id="tagihan">
			</div>
			<br>
			<div class="input-group">
				<button type="submit" class="btn" name="submit">Tambah Data!</button>
			</div>
		</p class="login-register-text">Back? <a href="index.php">Here</a>.</p>
	</form>
	</div>



</body>
</html>