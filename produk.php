<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: user/user_login.php");
    exit;
}

include 'config/koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>

    <a href="index.php" class="btn btn-back">
    Kembali ke Home
</a>

    <link rel="stylesheet"
    href="assets/css/style.css">
</head>

<body>

<div class="container">

<h2>Semua Produk</h2>

<div class="produk-grid">

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<div class="card">

<img src="assets/gambar/<?php echo $row['gambar']; ?>">

<h3><?php echo $row['nama_produk']; ?></h3>

<p>Rp <?php echo number_format($row['harga']); ?></p>

<a href="detail.php?id=<?php echo $row['id']; ?>"
class="btn">
Detail
</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>