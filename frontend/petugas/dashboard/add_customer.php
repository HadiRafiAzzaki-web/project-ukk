<?php
require __DIR__ . '/../../../backend/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php' ?>

            <form action="/web-kasir/backend/controller/add_customer_controller.php" method="post">
                <div class="input-group">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" placeholder="Masukkan Nama Pelanggan">
                </div>
                <div class="input-group">
                    <label for="alamat">Alamat Pelanggan</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat Pelanggan">
                </div>
                <div class="input-group">
                    <label for="noPhone">No. Hp Pelanggan</label>
                    <input type="text" name="noPhone" placeholder="Masukkan No. Hp Pelanggan">
                </div>
                <button type="submit" class="btn-add">Tambahkan</button>
            </form>
        </section>
    </main>
</body>
</html>