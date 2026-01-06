<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION['nama_admin']; ?></h2>

    <ul>
        <li><a href="produk.php">Data Produk</a></li>
        <li><a href="pelanggan.php">Data Pelanggan</a></li>
        <li><a href="transaksi.php">Transaksi</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
