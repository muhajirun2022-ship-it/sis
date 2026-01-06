<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">

    <!-- Sidebar -->
    <aside class="sidebar">
        <h1 class="logo">BENGKEL</h1>

        <nav>
            <a href="dashboard.php" class="active">🏠 Dashboard</a>
            <a href="produk.php">🛠 Data Produk</a>
            <a href="pelanggan.php">👥 Data Pelanggan</a>
            <a href="transaksi.php">💳 Transaksi</a>
            <a href="logout.php" class="logout">🚪 Logout</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="content">
        <header class="topbar">
            <h2>Selamat datang, <span><?= $_SESSION['nama_admin']; ?></span></h2>
            <button id="themeToggle">🌙</button>
        </header>

        <!-- Cards -->
        <section class="cards">
            <div class="card">
                <h3>Produk</h3>
                <p>Kelola sparepart & jasa</p>
            </div>

            <div class="card">
                <h3>Pelanggan</h3>
                <p>Data pelanggan bengkel</p>
            </div>

            <div class="card">
                <h3>Transaksi</h3>
                <p>Riwayat servis & pembayaran</p>
            </div>
        </section>
    </main>

</div>

<script src="js/dashboard.js"></script>
</body>
</html>
