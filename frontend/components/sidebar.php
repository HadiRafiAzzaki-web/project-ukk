<?php
include_once __DIR__ . '/../../backend/getUserData.php';
?>

<section class="sidebar">

    <?php if ($dataUser['role']  === 'admin'): ?>
        <div class="sidebar-container">
            <a href="home.php">Dashboard</a>
            <a href="tool_list.php">Pendataan Barang</a>
            <a href="transaction.php">Lihat Transaksi</a>
            <a href="register.php">Tambah Petugas</a>
            <a href="account_list.php">Lihat Akun</a>
        </div>
        <a href="/web-kasir/backend/auth/logout.php" class="btn-logout">Logout</a>
    <?php elseif ($dataUser['role'] === 'petugas'): ?>
        <div class="sidebar-container">
            <a href="home.php">Dashboard</a>
            <a href="tool_list.php">Pendataan Barang</a>
            <a href="transaction.php">Transaksi</a>
        </div>
        <a href="/web-kasir/backend/auth/logout.php" class="btn-logout">Logout</a>
    <?php endif; ?>
    </div>
</section>