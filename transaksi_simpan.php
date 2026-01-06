<?php
include 'koneksi.php';

$pelanggan_id = $_POST['pelanggan_id'];
$tanggal      = $_POST['tanggal'];
$produk_id    = $_POST['produk_id'];
$qty          = $_POST['qty'];

// Ambil harga produk
$produk = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT harga FROM produk WHERE id='$produk_id'")
);

$harga    = $produk['harga'];
$subtotal = $harga * $qty;

// Simpan transaksi utama
mysqli_query($conn, "
    INSERT INTO transaksi (pelanggan_id, tanggal, total)
    VALUES ('$pelanggan_id', '$tanggal', '$subtotal')
");

$transaksi_id = mysqli_insert_id($conn);

// Simpan detail
mysqli_query($conn, "
    INSERT INTO transaksi_detail (transaksi_id, produk_id, harga, qty, subtotal)
    VALUES ('$transaksi_id', '$produk_id', '$harga', '$qty', '$subtotal')
");

// Kurangi stok produk (jika sparepart)
mysqli_query($conn, "
    UPDATE produk SET stok = stok - $qty
    WHERE id='$produk_id' AND jenis='Sparepart'
");

header("Location: transaksi.php");
exit;
