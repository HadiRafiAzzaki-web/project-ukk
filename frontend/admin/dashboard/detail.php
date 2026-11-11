<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "
    select detail_penjualan.*, penjualan.*, produk.*, pelanggan.* 
    from detail_penjualan 
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id 
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
    where penjualan.id = '$id'
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
            <a href="./home.php"><- Kembali</a>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($penjualan = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $penjualan['tanggal_penjualan'] ?></td>
                            <td><?php echo $penjualan['namaPelanggan'] ?></td>
                            <td><?php echo $penjualan['nama_produk'] ?></td>
                            <td><?php echo $penjualan['jumlah_produk'] ?></td>
                            <td><?php echo $penjualan['subtotal'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>