<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location:user/user_login.php");
    exit;
}

include 'config/koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>

<title>Keranjang</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="container">

<h2 class="title">
Keranjang Belanja
</h2>

<a href="index.php" class="btn btn-back">
← Belanja Lagi
</a>

<br><br>

<?php

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
    foreach($_SESSION['cart'] as $id => $qty){
        $data = mysqli_query(
            $conn,
            "SELECT * FROM produk WHERE id='$id'"
    );
    $row = mysqli_fetch_assoc($data);
    $subtotal = $row['harga'] * $qty;
    $total += $subtotal;
?>

<div class="card"
style="margin-bottom:20px;">

<img src="assets/gambar/<?php echo $row['gambar']; ?>"
style="height:200px; object-fit:cover;">

<div class="card-body">

<h3>
<?php echo $row['nama_produk']; ?>
</h3>

<div class="price">
Rp <?php echo number_format($row['harga']); ?>
</div>

<div style="margin:10px 0;">

<a href="kurang_qty.php?id=<?php echo $id; ?>"
class="btn">
-
</a>

<strong style="margin:0 10px;">
<?php echo $qty; ?>
</strong>

<a href="tambah_qty.php?id=<?php echo $id; ?>"
class="btn">
+
</a>

</div>

<p>
Subtotal :
<strong>
Rp <?php echo number_format($subtotal); ?>
</strong>
</p>

<a href="hapus_keranjang.php?id=<?php echo $id; ?>"
class="btn"
onclick="return confirm('Hapus produk dari keranjang?')">
Hapus
</a>

</div>

</div>

<?php

}

?>

<h2>
Total Belanja :
Rp <?php echo number_format($total); ?>
</h2>

<br>

<form action="proses_checkout.php" method="POST">

    <h2>Checkout</h2>

    <input
    type="text"
    name="nama"
    placeholder="Nama Pembeli"
    required>

    <input
    type="text"
    name="no_hp"
    placeholder="Nomor HP"
    required>

    <textarea
    name="alamat"
    placeholder="Alamat Lengkap"
    required></textarea>

    <input
    type="hidden"
    name="total"
    value="<?php echo $total; ?>">

    <br><br>

    <button
    type="submit"
    class="btn">
        Checkout Sekarang
    </button>

</form>

<?php

}else{

echo "
<div class='card'>
<h3>Keranjang masih kosong</h3>
</div>
";

}

?>

</div>

</body>
</html>