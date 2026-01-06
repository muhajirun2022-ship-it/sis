<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">

<?php include __DIR__ . '/sidebar.php'; ?>

<main class="content">
    <header class="topbar">
        <h2>Data Pelanggan</h2>
        <a href="pelanggan_tambah.php" class="btn-primary">+ Tambah Pelanggan</a>
    </header>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; while($p = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama_pelanggan'] ?></td>
                    <td><?= $p['no_hp'] ?></td>
                    <td><?= $p['alamat'] ?></td>
                    <td>
                        <a href="pelanggan_edit.php?id=<?= $p['id'] ?>" class="btn-edit">Edit</a>
                        <a href="pelanggan_hapus.php?id=<?= $p['id'] ?>" 
                           class="btn-delete"
                           onclick="return confirm('Hapus pelanggan?')">Hapus</a>
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
