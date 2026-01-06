<?php
include 'koneksi.php';

$nama   = $_POST['nama_pelanggan'];
$no_hp  = $_POST['no_hp'];
$alamat = $_POST['alamat'];

mysqli_query($conn, "
    INSERT INTO pelanggan (nama_pelanggan, no_hp, alamat)
    VALUES ('$nama', '$no_hp', '$alamat')
");

header("Location: pelanggan.php");
exit;
