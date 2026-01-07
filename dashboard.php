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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
    <?php include 'sidebar.php'; ?>

    <main class="content">
        <header class="topbar">
            <div style="display: flex; align-items: center;">
                <h2>Halo, <span style="color: var(--primary)"><?= $_SESSION['nama_admin'] ?? 'Admin'; ?></span> 👋</h2>
            </div>
            <button id="themeToggle" style="background:none; border:none; font-size:20px; cursor:pointer;">🌙</button>
        </header>

        <section class="cards">
            <a href="produk.php" class="card" style="text-decoration: none;">
                <h3>🛠 Produk</h3>
                <p style="color: var(--muted); margin-top: 5px;">Kelola stok sparepart</p>
            </a>

            <a href="pelanggan.php" class="card" style="text-decoration: none;">
                <h3>👥 Pelanggan</h3>
                <p style="color: var(--muted); margin-top: 5px;">Data customer setia</p>
            </a>

            <a href="transaksi.php" class="card" style="text-decoration: none;">
                <h3>💳 Transaksi</h3>
                <p style="color: var(--muted); margin-top: 5px;">Laporan keuangan</p>
            </a>
        </section>
    </main>
</div>

<script src="js/dashboard.js"></script>
</body>
</html>