<?php

include '../config/koneksi.php';

$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file(
$tmp,
"../assets/gambar/".$gambar
);

mysqli_query($conn,
"INSERT INTO produk
(nama_produk,harga,deskripsi,gambar)

VALUES
('$nama','$harga','$deskripsi','$gambar')
");

header("Location: ../admin/dashboard.php");

?>