<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location:user/user_login.php");
    exit;
}

include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
$conn,
"SELECT * FROM produk WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Produk</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="container">

<a href="index.php" class="btn btn-back">
← Kembali
</a>

<br><br>

<div class="detail">

<div>
<img src="assets/gambar/<?php echo $row['gambar']; ?>">
</div>

<div>

<h1>
<?php echo $row['nama_produk']; ?>
</h1>

<br>

<div class="price">
Rp <?php echo number_format($row['harga']); ?>
</div>

<p>
<?php echo $row['deskripsi']; ?>
</p>

<br>

<a href="proses/cart.php?id=<?php echo $row['id']; ?>"
class="btn">
+ Keranjang
</a>

</div>

</div>

</div>

</body>
</html>