<!DOCTYPE html>
<html>
<head>

<a href="dashboard.php" class="btn btn-back">
← Dashboard
</a>

<title>Tambah Produk</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Tambah Produk</h2>

<form action="../proses/tambah_produk.php"
method="POST"
enctype="multipart/form-data">

<input type="text"
name="nama_produk"
placeholder="Nama Produk">

<input type="number"
name="harga"
placeholder="Harga">

<textarea name="deskripsi"
placeholder="Deskripsi"></textarea>

<input type="file"
name="gambar">

<button type="submit"
class="btn">
Simpan
</button>

</form>

</div>

</body>
</html>