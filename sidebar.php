<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h1 class="logo">BENGKEL</h1>
        <button class="close-sidebar" id="closeSidebar">✕</button>
    </div>

    <?php 
    // Ambil nama file saat ini (contoh: dashboard.php)
    $page = basename($_SERVER['PHP_SELF']); 
    ?>

    <nav>
        <a href="dashboard.php" class="<?= $page == 'dashboard.php' ? 'active' : '' ?>">
            🏠 Dashboard
        </a>
        
        <a href="produk.php" class="<?= ($page == 'produk.php' || $page == 'produk_tambah.php') ? 'active' : '' ?>">
            🛠 Data Produk
        </a>
        
        <a href="pelanggan.php" class="<?= $page == 'pelanggan.php' ? 'active' : '' ?>">
            👥 Data Pelanggan
        </a>
        
        <a href="transaksi.php" class="<?= ($page == 'transaksi.php' || $page == 'transaksi_detail.php') ? 'active' : '' ?>">
            💳 Transaksi
        </a>
        
        <a href="logout.php" class="logout">
            🚪 Logout
        </a>
    </nav>
</aside>