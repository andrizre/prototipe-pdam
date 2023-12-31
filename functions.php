<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pemain");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$meteran = htmlspecialchars($data["meteran"]);
	$pemakaian = htmlspecialchars($data["pemakaian"]);
	$tarif = htmlspecialchars($data["tarif"]);
	$tagihan = htmlspecialchars($data["tagihan"]);

	$query = "INSERT INTO pemain
				VALUES
			  ('', '$nama', '$npm', '$alamat', '$tanggal', '$meteran', '$pemakaian', '$tarif', '$tagihan')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pemain WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$meteran = htmlspecialchars($data["meteran"]);
	$pemakaian = htmlspecialchars($data["pemakaian"]);
	$tarif = htmlspecialchars($data["tarif"]);
	$tagihan = htmlspecialchars($data["tagihan"]);
	
	$query = "UPDATE pemain SET
				nama = '$nama',
				npm = '$npm',
				alamat = '$alamat',
				tanggal = '$tanggal',
				meteran = '$meteran',
				pemakaian = '$pemakaian',
				tarif = '$tarif',
				tagihan = '$tagihan'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM pemain
				WHERE
			  nama LIKE '%$keyword%' OR
			  npm LIKE '%$keyword%' OR
			  alamat LIKE '%$keyword%' OR
			  tanggal LIKE '%$keyword%' OR
			  meteran LIKE '%$keyword%' OR
			  pemakaian LIKE '%$keyword%' OR
			  tarif LIKE '%$keyword%' OR
			  tagihan LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>