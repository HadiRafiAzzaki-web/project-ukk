<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';
include __DIR__ . '/../../utils/price_format.php';
include __DIR__ . '/../../../backend/queries/petugas/transaction_query.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Barang</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php' ?>
            <a href="./add_transaction.php" class="btn-add">+ Tambah Transaksi</a>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk yang Dibeli</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produk = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $produk['tanggal_penjualan'] ?></td>
                            <td><?php echo $produk['namaPelanggan'] ?></td>
                            <td><?php echo $produk['daftar_produk'] ?></td>
                            <td><?php echo Rupiah($produk['total_harga']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>