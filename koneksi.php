<?php
$koneksi = mysqli_connect("localhost", "root", "", "sistem bengkel");

if (!$koneksi) {
    die("Koneksi database gagal");
}
?>
