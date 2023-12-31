<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$pemain = query("SELECT * FROM pemain");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$pemain = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>

    body {
      display: flex;
      align-items: left;
      justify-content: center;
      margin: 0;
    }
		.loader {
			width: 100px;
			position: absolute;
			top: 118px;
			left: 210px;
			z-index: -1;
			display: none;
		}

		@media print {
			.logout, .tambah, .form-cari, .aksi {
				display: none;
			}
		}
	</style>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

<div class="container">
<a href="logout.php" class="btn btn-danger">Logout</a>

<h1 class="text-center">PAMDesa</h1>

<table border="1" cellpadding="10" cellspacing="0">
	  <div class="card-header bg-primary text-white">
	    Input Penduduk
	  </div> 
	  <div class="card-body">
<form action="" method="post" class="form-cari">
	<input type="text" name="keyword" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari!</button>
	<img src="img/loader.gif" class="loader">
</form>
</div>
<a href="tambah.php" class="btn btn-success">Tambah Data Tagihan</a>
<div class="card mt-3">
	  <table class="table table-bordered table-striped">
	<tr>
		<th>No.</th>
		<th class="aksi">Aksi</th>
		<th>Nama</th>
		<th>ID</th>
		<th>Alamat</th>
		<th>Tanggal</th>
		<th>Meteran</th>
		<th>Pemakaian</th>
		<th>Tarif</th>
		<th>Tagihan</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $pemain as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td class="aksi">
			<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning">ubah</a>
			<a href="hapus.php?id=<?= $row["id"]; ?> "onclick="return confirm('yakin?');" class="btn btn-danger">hapus</a>
		</td>
		
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["npm"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["tanggal"]; ?></td>
		<td><?= $row["meteran"]; ?></td>
		<td><?= $row["pemakaian"]; ?></td>
		<td><?= $row["tarif"]; ?></td>
		<td><?= $row["tagihan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	
</table>
</table>
</div>
</body>
</html>