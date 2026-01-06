<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$nama  = $_POST['nama_produk'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok  = $_POST['stok'];

mysqli_query($conn, "
    INSERT INTO produk (nama_produk, jenis, harga, stok)
    VALUES ('$nama','$jenis','$harga','$stok')
");

header("Location: produk.php");
exit;
