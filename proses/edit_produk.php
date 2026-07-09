<?php

include '../config/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

mysqli_query($conn,
"UPDATE produk SET

nama_produk='$nama',
harga='$harga',
deskripsi='$deskripsi'

WHERE id='$id'
");

header("Location: ../admin/dashboard.php");

?>