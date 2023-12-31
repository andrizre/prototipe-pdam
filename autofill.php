<?php

// Get the user id
$npm = $_REQUEST['npm'];

// Database connection
$conn = mysqli_connect("localhost", "root", "", "pemain");

if ($npm !== "") {

    // Get corresponding information for that user id
    $query = mysqli_query($conn, "SELECT nama, alamat, tanggal, meteran, pemakaian, tarif, tagihan FROM pemain WHERE npm='$npm'");

    $row = mysqli_fetch_array($query);

    // Get the information
    $nama = $row["nama"];
    $alamat = $row["alamat"];
    $tanggal = $row["tanggal"];
    $meteran = $row["meteran"];
    $pemakaian = $row["pemakaian"];
    $tarif = $row["tarif"];
    $tagihan = $row["tagihan"];
}

// Store it in an array
$result = array("nama" => $nama, "alamat" => $alamat, "tanggal" => $tanggal, "meteran" => $meteran, "pemakaian" => $pemakaian, "tarif" => $tarif, "tagihan" => $tagihan);

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;

?>
