<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';

$query = mysqli_query($connection, "select * from produk");
$jumlahProduk = mysqli_num_rows($query);

$queryPetugas = mysqli_query($connection, "select * from users where role = 'petugas'");
$jumlahPetugas = mysqli_num_rows($queryPetugas);

$queryPenjualan = mysqli_query($connection, "select *, pelanggan.namaPelanggan as nama from penjualan inner join pelanggan on penjualan.pelanggan_id = pelanggan.id");
$query = mysqli_query($connection, "
    select detail_penjualan.*, penjualan.*, produk.*, pelanggan.* 
    from detail_penjualan 
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id 
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
");
$jumlahTransaksi = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
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
                    <h4>Jumlah Transaksi</h4>
                    <p><?php echo $jumlahTransaksi ?></p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>