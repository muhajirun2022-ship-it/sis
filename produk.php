<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">

<?php include 'sidebar.php'; ?>

<main class="content">
    <header class="topbar">
        <h2>Data Produk</h2>
        <a href="produk_tambah.php" class="btn-primary">+ Tambah Produk</a>
    </header>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; while($p = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama_produk'] ?></td>
                    <td><?= $p['jenis'] ?></td>
                    <td>Rp <?= number_format($p['harga']) ?></td>
                    <td><?= $p['stok'] ?></td>
                    <td>
                        <a href="produk_edit.php?id=<?= $p['id'] ?>" class="btn-edit">Edit</a>
                        <a href="produk_hapus.php?id=<?= $p['id'] ?>" class="btn-delete" onclick="return confirm('Hapus produk?')">Hapus</a>
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
