<?php

session_start();

$id = $_GET['id'];

$_SESSION['cart'][$id]--;

if($_SESSION['cart'][$id] <= 0){

    unset($_SESSION['cart'][$id]);

}

header("Location: keranjang.php");

?>