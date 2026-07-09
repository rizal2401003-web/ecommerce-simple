<?php

include '../config/koneksi.php';

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

<a href="dashboard.php" class="btn btn-back">
← Dashboard
</a>

<title>Edit Produk</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Edit Produk</h2>

<form action="../proses/edit_produk.php"
method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="text"
name="nama_produk"
value="<?php echo $row['nama_produk']; ?>">

<input type="number"
name="harga"
value="<?php echo $row['harga']; ?>">

<textarea name="deskripsi"><?php echo $row['deskripsi']; ?></textarea>

<button type="submit"
class="btn">
Update
</button>

</form>

</div>

</body>
</html>