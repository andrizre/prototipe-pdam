<?php 
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pemain
            WHERE
          nama LIKE '%$keyword%' OR
          npm LIKE '%$keyword%' OR
          alamat LIKE '%$keyword%' OR
          tanggal LIKE '%$keyword%' OR
          tagihan LIKE '%$keyword%'
        ";
$pemain = query($query);
?>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
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
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
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