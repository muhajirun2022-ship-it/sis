<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
<?php include 'sidebar.php'; ?>

<main class="content">
<h2>Tambah Produk</h2>

<form action="produk_simpan.php" method="post" class="form">
    <input type="text" name="nama_produk" placeholder="Nama Produk" required>
    
    <select name="jenis" required>
        <option value="">-- Pilih Jenis --</option>
        <option>Sparepart</option>
        <option>Jasa</option>
    </select>

    <input type="number" name="harga" placeholder="Harga" required>
    <input type="number" name="stok" placeholder="Stok" required>

    <button type="submit" class="btn-primary">Simpan</button>
</form>
</main>
</div>

</body>
</html>
