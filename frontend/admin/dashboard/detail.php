<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
include_once __DIR__ . '/../../utils/price_format.php';

$id = $_GET['id'];

$queryPenjualan = mysqli_query($connection, "select penjualan_id from detail_penjualan where id = $id");
$dataPenjualan = mysqli_fetch_assoc($queryPenjualan);
$idPenjualan = $dataPenjualan['penjualan_id'];

$query = mysqli_query($connection, "
    select detail_penjualan.*, penjualan.tanggal_penjualan as tanggal, penjualan.id as penjualanId, produk.*, pelanggan.namaPelanggan, users.username
    from detail_penjualan 
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id 
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
    inner join users on penjualan.petugas_id = users.id
    where detail_penjualan.id = '$id' and detail_penjualan.penjualan_id = '$idPenjualan'
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <a href="./transaction.php"><- Kembali</a>
            <table class="nota">
                <?php while ($transaction = mysqli_fetch_assoc($query)): ?>
                    <tr class="info">
                        <td>Id Penjualan:</td>
                        <td><?php echo $transaction['penjualanId'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penjualan:</td>
                        <td><?php echo $transaction['tanggal'] ?></td>
                    </tr>
                    <tr>
                        <td>Kepada Bapak/Ibu:</td>
                        <td><?php echo $transaction['namaPelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>Petugas:</td>
                        <td><?php echo $transaction['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Produk:</td>
                        <td><?php echo $transaction['nama_produk'] ?></td>
                    </tr>
                    <tr>
                        <td>Harga Produk:</td>
                        <td><?php echo Rupiah($transaction['harga']) ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Produk:</td>
                        <td><?php echo $transaction['jumlah_produk'] ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal:</td>
                        <td><?php echo Rupiah($transaction['subtotal']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </section>
    </main>
</body>

</html>