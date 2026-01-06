<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$id = $_GET['id'];

// Ambil data pelanggan berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id='$id'");
$pelanggan = mysqli_fetch_assoc($query);

if (!$pelanggan) {
    echo "Data pelanggan tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="app">

<?php include __DIR__ . '/sidebar.php'; ?>

<main class="content">
    <header class="topbar">
        <h2>Edit Pelanggan</h2>
    </header>

    <div class="card">
        <form action="pelanggan_update.php" method="post" class="form">
            <input type="hidden" name="id" value="<?= $pelanggan['id'] ?>">

            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan"
                   value="<?= $pelanggan['nama_pelanggan'] ?>" required>

            <label>No HP</label>
            <input type="text" name="no_hp"
                   value="<?= $pelanggan['no_hp'] ?>" required>

            <label>Alamat</label>
            <textarea name="alamat"><?= $pelanggan['alamat'] ?></textarea>

            <button type="submit" class="btn-primary">Update</button>
            <a href="pelanggan.php" class="btn-secondary">Batal</a>
        </form>
    </div>
</main>

</div>
</body>
</html>
