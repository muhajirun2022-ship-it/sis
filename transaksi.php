<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// Query dengan JOIN agar kita dapat nama pelanggan, bukan cuma ID
$query = "SELECT transaksi.*, pelanggan.nama_pelanggan 
          FROM transaksi 
          JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id 
          ORDER BY transaksi.id DESC";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
    <?php include 'sidebar.php'; ?>

    <main class="content">
        <header class="topbar">
            <div style="display: flex; align-items: center;">
                <button id="hamburger" class="hamburger">☰</button>
                <h2>Data Transaksi</h2>
            </div>
            <a href="transaksi_tambah.php" class="btn-primary">+ Transaksi Baru</a>
        </header>

        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total Belanja</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($data) > 0): ?>
                            <?php $no=1; while($t = mysqli_fetch_assoc($data)): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d/m/Y', strtotime($t['tanggal'])) ?></td>
                                    <td><?= htmlspecialchars($t['nama_pelanggan']) ?></td>
                                    <td style="font-weight: 600;">Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="transaksi_detail.php?id=<?= $t['id'] ?>" class="btn-sm btn-detail">Detail</a>
                                        <a href="transaksi_hapus.php?id=<?= $t['id'] ?>" 
                                           class="btn-sm btn-delete"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align:center; padding: 30px; color: var(--muted);">
                                    Belum ada data transaksi saat ini.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script src="js/dashboard.js"></script>
</body>
</html>