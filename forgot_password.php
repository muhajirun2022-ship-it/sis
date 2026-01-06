<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/forgot_password.css">
</head>
<body>

<button class="theme-toggle" id="themeToggle">🌙</button>

<div class="forgot-container">
    <img src="img/logo-bengkel.png" class="logo" alt="Logo Bengkel">

    <h2>Lupa Password?</h2>
    <p class="subtitle">
        Masukkan email admin untuk reset password
    </p>

    <form action="proses_forgot_password.php" method="post">
        <div class="input-group">
            <input type="email" name="email" required>
            <label>Email Admin</label>
        </div>

        <button type="submit">Kirim Link Reset</button>
    </form>

    <a href="login.php" class="back-link">← Kembali ke Login</a>
</div>

<script src="js/forgot_password.js"></script>
</body>
</html>
