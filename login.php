<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Bengkel</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- Dark mode toggle -->
    <button class="theme-toggle" id="themeToggle">🌙</button>

    <div class="login-container">
        <!-- Logo -->
        <img src="assets/logo_bengkel.png" alt="Logo Bengkel" class="logo">

        <h2>Admin Bengkel</h2>
        <p class="subtitle">Kelola sistem bengkel Anda</p>

        <form action="proses_login.php" method="post">
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>

            <div class="input-group password-group">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
                <span class="toggle-password" id="togglePassword">👁</span>
            </div>

            <button type="submit">Masuk</button>
        </form>
    </div>

    <!-- JS -->
    <script src="js/login.js"></script>
</body>
</html>
