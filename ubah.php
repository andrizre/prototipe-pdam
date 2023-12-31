<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data pemain berdasarkan id
$pmn = query("SELECT * FROM pemain WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
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
	<title>Ubah Data Pemain Bola</title>
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
		<input type="hidden" name="id" value="<?= $pmn["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $pmn["gambar"]; ?>">
		<p class="login-text" style="font-size: 1 rem; font-weight: 600;">Ubah Data Pemain</p>
			<div class="input-group">
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $pmn["nama"]; ?>">
			</div>
			<div class="input-group">
				<label for="npm">ID : </label>
				<input type="text" name="npm" id="npm" required value="<?= $pmn["npm"]; ?>">
			</div>
			<div class="input-group">
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat" value="<?= $pmn["alamat"]; ?>">
			</div>
			<div class="input-group">
				<label for="tanggal">Tanggal :</label>
				<input type="text" name="tanggal" id="tanggal" value="<?= $pmn["tanggal"]; ?>">
			</div>
			<div class="input-group">
				<label for="meteran">Meteran :</label>
				<input type="text" name="meteran" id="meteran" value="<?= $pmn["meteran"]; ?>">
			</div>
			<div class="input-group">
				<label for="pemakaian">Pemakaian :</label>
				<input type="text" name="pemakaian" id="pemakaian" value="<?= $pmn["pemakaian"]; ?>">
			</div>
			<div class="input-group">
				<label for="tarif">tarif :</label>
				<input type="text" name="tarif" id="tarif" value="<?= $pmn["tarif"]; ?>">
			</div>
			<div class="input-group">
				<label for="tagihan">tagihan :</label>
				<input type="text" name="tagihan" id="tagihan" value="<?= $pmn["tagihan"]; ?>">
			</div>
			 <br> <br>
			<div class="input-group">
				<button type="submit" class="btn" name="submit">Ubah Data!</button>
			</div>
			</p class="login-register-text">Back? <a href="index.php">Here</a>.</p>
	</form>
</div>



</body>
</html>