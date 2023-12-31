<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      align-items: left;
      justify-content: center;
      margin: 0;
    }

    #preview {
      width: 100%; /* Sesuaikan dengan lebar yang Anda inginkan */
      height: auto; /* Biarkan tinggi menyesuaikan agar tidak terdistorsi */
    }
  </style>
  </head>
  <body>
    <div class="container">
      <a href="logout.php" class="btn btn-danger">Logout</a>
    <div class="container">
        <h1 class="text-center">PAMDesa</h1>

        <div class="card-header bg-primary text-white">
        Scan QR Code
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <video id="preview"></video>
        </div>
        <div class="col-md-6">
          <label>Enter user id</label>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    
                    <input type='text' name="npm" id='npm' class='form-control' placeholder='Enter user id'
                        onkeyup="GetDetail(this.value)" value="">
                </div>
            </div>
        </div>
          
          <button onclick="startScanner()">Start Scanner</button>
          <button onclick="stopScanner()">Stop Scanner</button>
        </div>
      </div>
    </div>

    <script type="text/javascript">
  let scanner = null;

  function startScanner() {
    scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
      console.log(content);
      document.getElementById('npm').value = content; // Autofill the input field
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
<br>
<div class="container">
        
        
        <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Nama:</label> 
          <input type="text" name="nama"
            id="nama" class="form-control"
            placeholder='masukan nama'
            value="" readonly> 
        </div> 
      </div> 
    </div> 
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Alamat:</label> 
          <input type="text" name="alamat"
            id="alamat" class="form-control"
            placeholder='masukan alamat'
            value="" readonly> 
        </div> 
      </div> 
    </div>
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Tanggal:</label> 
          <input type="text" name="tanggal"
            id="tanggal" class="form-control"
            placeholder='masukan tanggal'
            value="" readonly> 
        </div> 
      </div> 
    </div>
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Meteran:</label> 
          <input type="text" name="meteran"
            id="meteran" class="form-control"
            placeholder='masukan meteran'
            value="" readonly> 
        </div> 
      </div> 
    </div>
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Pemakaian:</label> 
          <input type="text" name="pemakaian"
            id="pemakaian" class="form-control"
            placeholder='masukan jumlah pemakaian'
            value="" readonly> 
        </div> 
      </div> 
    </div>
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Tarif:</label> 
          <input type="text" name="tarif"
            id="tarif" class="form-control"
            placeholder='masukan tarif'
            value="" readonly> 
        </div> 
      </div> 
    </div>
    <div class="row"> 
      <div class="col-lg-6"> 
        <div class="form-group"> 
          <label>Tagihan:</label> 
          <input type="text" name="tagihan"
            id="tagihan" class="form-control"
            placeholder='masukan tangihan'
            value="" readonly> 
        </div> 
      </div> 
    </div> 

    </div>

    <script>
        function GetDetail(str) {
            if (str.length == 0) {
                // Clear input fields if user id is empty
                document.getElementById("nama").value = "";
                document.getElementById("alamat").value = "";
                document.getElementById("tanggal").value = ""; 
        document.getElementById("meteran").value = "";
        document.getElementById("pemakaian").value = ""; 
        document.getElementById("tarif").value = "";
        document.getElementById("tagihan").value = "";
                // ... (repeat for other fields)
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("nama").value = myObj.nama;
                        document.getElementById("alamat").value = myObj.alamat;
                        document.getElementById("tanggal").value = myObj.tanggal; 
            document.getElementById("meteran").value = myObj.meteran;
            document.getElementById("pemakaian").value = myObj.pemakaian; 
            document.getElementById("tarif").value = myObj.tarif;
            document.getElementById("tagihan").value = myObj.tagihan;
                        
                    }
                };
                xmlhttp.open("GET", "autofill.php?npm=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
  </body>
</html>
