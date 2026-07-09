<?php
session_start();

include 'config/koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>

<title>Toko Online Modern</title>

<link rel="stylesheet"href="assets/css/style.css">

</head>

<body>

<header>

<nav>

<div class="logo">
DevaShop
</div>
<ul>
    <?php if(isset($_SESSION['user_id'])){ ?>
<li>
    Halo, <?php echo $_SESSION['username']; ?>
</li>

<li>
    <a href="user/logout_user.php">Logout</a>
</li>
<?php } ?>
    <li><a href="index.php">Home</a></li>
    <li><a href="produk.php">Produk</a></li>
    <li><a href="keranjang.php">Keranjang</a></li>
    <li><a href="admin/index_login.php">Admin</a></li>
</ul>

</nav>

</header>

<section class="hero">

<h1>Belanja Mudah & Modern</h1>

<p>
Temukan produk terbaik dengan harga terbaik
</p>
<?php if(!isset($_SESSION['user_id'])){ ?>

<br>

<a href="user/user_login.php" class="btn">
Login Untuk Mulai Belanja
</a>

<?php } ?>

</section>

<div class="container">

<h2 class="title">
Produk Terbaru
</h2>

<div class="produk-grid">

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<div class="card">

<img src="assets/gambar/<?php echo $row['gambar']; ?>">

<div class="card-body">

<h3>
<?php echo $row['nama_produk']; ?>
</h3>

<div class="price">
Rp <?php echo number_format($row['harga']); ?>
</div>

<a href="detail.php?id=<?php echo $row['id']; ?>"
class="btn">
Lihat Detail
</a>

</div>

</div>

<?php } ?>

</div>

</div>

<footer>

<p>
© 2026 DevaShop
</p>

</footer>

</body>
</html>