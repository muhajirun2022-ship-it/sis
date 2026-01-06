<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$id    = $_POST['id'];
$nama  = $_POST['nama_produk'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok  = $_POST['stok'];

mysqli_query($conn, "
    UPDATE produk SET
        nama_produk='$nama',
        jenis='$jenis',
        harga='$harga',
        stok='$stok'
    WHERE id='$id'
");

header("Location: produk.php");
exit;
