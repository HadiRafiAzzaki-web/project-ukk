<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';

$query = mysqli_query($connection, "select * from produk");
$jumlahProduk = mysqli_num_rows($query);

$queryPetugas = mysqli_query($connection, "select * from users where role = 'petugas'");
$jumlahPetugas = mysqli_num_rows($queryPetugas);

$queryPenjualan = mysqli_query($connection, "select *, pelanggan.namaPelanggan as nama from penjualan inner join pelanggan on penjualan.pelanggan_id = pelanggan.id");
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
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($penjualan = mysqli_fetch_assoc($queryPenjualan)): ?>
                        <tr>
                            <td><?php echo $penjualan['tanggal_penjualan'] ?></td>
                            <td><?php echo $penjualan['nama'] ?></td>
                            <td><?php echo $penjualan['total_harga'] ?></td>
                            <td><a href="./detail.php?id=<?php echo $penjualan['id']; ?>">Detail</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>