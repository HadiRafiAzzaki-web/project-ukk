<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';
include __DIR__ . '/../../utils/price_format.php';

$query = mysqli_query($connection, "
    select detail_penjualan.*, penjualan.*, produk.*, pelanggan.* 
    from detail_penjualan 
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id 
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
");
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
            <a href="./add_transaction.php">+ Tambah Transaksi</a>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk yang Dibeli</th>
                        <th>Jumlah Produk yang Dibeli</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produk = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $produk['tanggal_penjualan'] ?></td>
                            <td><?php echo $produk['namaPelanggan'] ?></td>
                            <td><?php echo $produk['nama_produk'] ?></td>
                            <td><?php echo $produk['jumlah_produk'] ?></td>
                            <td><?php echo Rupiah($produk['subtotal']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>