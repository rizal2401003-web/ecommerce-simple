<?php

session_start();

include 'config/koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$total = $_POST['total'];

mysqli_query(
    $conn,
    "INSERT INTO pesanan
    (nama, alamat, no_hp, total)
    VALUES
    ('$nama','$alamat','$no_hp','$total')"
);

unset($_SESSION['cart']);

header("Location: sukses.php");

?>