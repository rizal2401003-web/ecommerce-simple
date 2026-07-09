<?php

session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'"
);

$cek = mysqli_num_rows($data);
if($cek > 0){
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
}else{
    echo "Login gagal";
}
?>