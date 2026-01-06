<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
<?php include 'sidebar.php'; ?>

<main class="content">
<h2>Edit Produk</h2>

<form action="produk_update.php" method="post" class="form">
    <input type="hidden" name="id" value="<?= $p['id'] ?>">

    <input type="text" name="nama_produk" value="<?= $p['nama_produk'] ?>" required>

    <select name="jenis">
        <option <?= $p['jenis']=='Sparepart'?'selected':'' ?>>Sparepart</option>
        <option <?= $p['jenis']=='Jasa'?'selected':'' ?>>Jasa</option>
    </select>

    <input type="number" name="harga" value="<?= $p['harga'] ?>" required>
    <input type="number" name="stok" value="<?= $p['stok'] ?>" required>

    <button type="submit" class="btn-primary">Update</button>
</form>
</main>
</div>

</body>
</html>
