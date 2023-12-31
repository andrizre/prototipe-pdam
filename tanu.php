<html>

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
<a href="logout.php" class="btn btn-danger">Logout</a>
    <div class="container">
        <h1 class="text-center">PAMDesa</h1>

        <div class="card-header bg-primary text-white">
        Scan QR Code
      </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>User Id</label>
                    <input type='text' name="npm" id='npm' class='form-control' placeholder='Enter user id'
                        onkeyup="GetDetail(this.value)" value="">
                </div>
            </div>
        </div>

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
