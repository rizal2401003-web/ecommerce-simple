<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
}

include '../config/koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM produk");

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Dashboard Admin</h2>

<a href="tambah.php"
class="btn">
Tambah Produk
</a>

<a href="logout.php"
class="btn">
Logout
</a>

<table>

<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Gambar</th>
<th>Aksi</th>
</tr>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $row['nama_produk']; ?></td>

<td>
Rp <?php echo number_format($row['harga']); ?>
</td>

<td>
<img src="../assets/gambar/<?php echo $row['gambar']; ?>"
width="100">
</td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="hapus.php?id=<?php echo $row['id']; ?>">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>