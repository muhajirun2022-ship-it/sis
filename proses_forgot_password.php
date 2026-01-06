<?php
include 'koneksi.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);

// Cek email admin
$query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
$admin = mysqli_fetch_assoc($query);

if (!$admin) {
    // Email tidak ditemukan
    header("Location: forgot_password.php?error=email_not_found");
    exit;
}

// Generate token aman
$token = bin2hex(random_bytes(32));
$expired = date("Y-m-d H:i:s", strtotime("+1 hour"));

// Simpan token ke database
mysqli_query($conn, "
    UPDATE admin SET 
        reset_token='$token',
        token_expired='$expired'
    WHERE email='$email'
");

header("Location: reset_password.php?token=$token");
exit;
