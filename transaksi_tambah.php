<?php
session_start();
include 'koneksi.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$produk = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Baru</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
<?php include __DIR__ . '/sidebar.php'; ?>

<main class="content">
<header class="topbar"><h2>Transaksi Baru</h2></header>

<div class="card">
<form action="transaksi_simpan.php" method="post">

<label>Pelanggan</label>
<select name="pelanggan_id" required>
    <?php while($p = mysqli_fetch_assoc($pelanggan)): ?>
        <option value="<?= $p['id'] ?>"><?= $p['nama_pelanggan'] ?></option>
    <?php endwhile; ?>
</select>

<label>Tanggal</label>
<input type="date" name="tanggal" required>

<label>Produk/Jasa</label>
<select name="produk_id">
    <?php while($pr = mysqli_fetch_assoc($produk)): ?>
        <option value="<?= $pr['id'] ?>">
            <?= $pr['nama_produk'] ?> - Rp <?= number_format($pr['harga']) ?>
        </option>
    <?php endwhile; ?>
</select>

<label>Qty</label>
<input type="number" name="qty" value="1" min="1">

<button type="submit" class="btn-primary">Simpan</button>

</form>
</div>
</main>
</div>

</body>
</html>
