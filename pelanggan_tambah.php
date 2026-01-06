<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">
<?php include __DIR__ . '/sidebar.php'; ?>

<main class="content">
    <header class="topbar">
        <h2>Tambah Pelanggan</h2>
    </header>

    <div class="card">
        <form action="pelanggan_simpan.php" method="post" class="form">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" required>

            <label>No HP</label>
            <input type="text" name="no_hp" required>

            <label>Alamat</label>
            <textarea name="alamat"></textarea>

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</main>
</div>

</body>
</html>
