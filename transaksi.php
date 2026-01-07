<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$data = mysqli_query($conn, "
    SELECT transaksi.*, pelanggan.nama_pelanggan 
    FROM transaksi 
    JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
    ORDER BY transaksi.id DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
<?php include __DIR__ . '/sidebar.php'; ?>

<main class="content">
    <header class="topbar">
        <h2>Data Transaksi</h2>
        <a href="transaksi_tambah.php" class="btn-primary">+ Transaksi Baru</a>
    </header>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; while($t = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $t['tanggal'] ?></td>
                    <td><?= $t['nama_pelanggan'] ?></td>
                    <td>Rp <?= number_format($t['total']) ?></td>
                    <td>
                        <a href="transaksi_detail.php?id=<?= $t['id'] ?>" class="btn-edit">Detail</a>
                        <a href="transaksi_hapus.php?id=<?= $t['id'] ?>" 
                           class="btn-delete"
                           onclick="return confirm('Hapus transaksi?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

</body>
</html>
