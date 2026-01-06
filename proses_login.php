<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, 
    "SELECT * FROM admin WHERE username='$username' AND password='$password'"
);

$data = mysqli_fetch_array($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['nama_admin'] = $data['nama_admin'];
    header("location:dashboard.php");
} else {
    echo "Login gagal";
}
?>

