<?php
include 'koneksi.php';

$id     = $_POST['id'];
$nama   = $_POST['nama_pelanggan'];
$no_hp  = $_POST['no_hp'];
$alamat = $_POST['alamat'];

mysqli_query($conn, "
    UPDATE pelanggan SET
        nama_pelanggan='$nama',
        no_hp='$no_hp',
        alamat='$alamat'
    WHERE id='$id'
");

header("Location: pelanggan.php");
exit;
