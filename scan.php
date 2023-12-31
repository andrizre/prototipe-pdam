<?php 
session_start();


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
    <title>Halaman Scan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
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
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
</head>
<body>

<div class="container">
<a href="index.php" class="btn btn-danger">Kembali</a>

<h1 class="text-center">PAMDesa</h1>

<table border="1" cellpadding="10" cellspacing="0">
      <div class="card-header bg-primary text-white">
        Input Penduduk
      </div> 
      <div class="card-body">
<form action="" method="post" class="form-cari">
    <input type="text" name="keyword" size="140" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    <img src="img/loader.gif" class="loader">
</form>
</div>
<button onclick="startScanner()" class="btn btn-success">Start Scanner</button>
<button onclick="stopScanner()" class="btn btn-danger">Stop Scanner</button>

<div class="card mt-3">
      <table class="table table-bordered table-striped">
<video id="preview"></video>
    <script type="text/javascript">
  let scanner = null;

  function startScanner() {
    scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
      console.log(content);
      document.getElementById('keyword').value = content; // Autofill the input field
      stopScanner(); // Stop the scanner after a successful scan
    });

    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  }

  function stopScanner() {
    if (scanner !== null) {
      scanner.stop();
      console.log('Scanner stopped');
    }
  }
</script>
  
    <tr>
        <th>No.</th>
        
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