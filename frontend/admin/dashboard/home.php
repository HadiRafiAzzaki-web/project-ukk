<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';
include __DIR__ . "/../../utils/price_format.php";
include __DIR__ . '/../../../backend/queries/admin/home_query.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php' ?>

            <div class="tool-info">
                <div class="card">
                    <h4>Jumlah Barang</h4>
                    <p><?php echo $jumlahProduk ?></p>
                </div>
                <div class="card">
                    <h4>Jumlah Petugas</h4>
                    <p><?php echo $jumlahPetugas ?></p>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($penjualan = mysqli_fetch_assoc($queryPenjualan)): ?>
                        <tr>
                            <td><?php echo $penjualan['tanggal_penjualan'] ?></td>
                            <td><?php echo $penjualan['namaPelanggan'] ?></td>
                            <td><?php echo $penjualan['daftar_produk'] ?></td>
                            <td><?php echo Rupiah($penjualan['total_harga']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>