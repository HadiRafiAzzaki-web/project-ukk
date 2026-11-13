<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
include_once __DIR__ . '/../../utils/price_format.php';
include __DIR__ . '/../../../backend/queries/admin/detail_query.php';

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
            <a href="./transaction.php" class="btn-return"><- Kembali</a>
                    <table class="nota">
                        <?php $first = mysqli_fetch_assoc($query) ?>
                        <?php if ($first): ?>
                            <tr>
                                <td>Id Penjualan:</td>
                                <td><?php echo $first['penjualanId'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Penjualan:</td>
                                <td><?php echo $first['tanggal'] ?></td>
                            </tr>
                            <tr>
                                <td>Kepada Bapak/Ibu:</td>
                                <td><?php echo $first['namaPelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Petugas:</td>
                                <td><?php echo $first['username'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Daftar Produk</strong></td>
                            </tr>

                            <?php
                            $totalPrice = 0;
                            $products = [$first];

                            while ($product = mysqli_fetch_assoc($query)) {
                                $products[] = $product;
                            }
                            ?>

                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>Produk:</td>
                                    <td><?php echo $product['nama_produk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Produk:</td>
                                    <td><?php echo Rupiah($product['harga']) ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Produk:</td>
                                    <td><?php echo $product['jumlah_produk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Subtotal:</td>
                                    <td><?php echo Rupiah($product['subtotal']) ?></td>
                                </tr>
                                <?php $totalPrice += $product['subtotal'] ?>
                            <?php endforeach; ?>
                            <tr>
                                <td>Total Harga:</td>
                                <td><?php echo Rupiah($totalPrice) ?></td>
                            </tr>
                            <tr>
                                <td>Uang Pelanggan:</td>
                                <td><?php echo Rupiah($product['uang_pelanggan']) ?></td>
                            </tr>
                            <tr>
                                <td>Kembalian:</td>
                                <td><?php echo Rupiah($product['kembalian']) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td>Tidak ada Data</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                    <div class="action">
                        <a href="/web-kasir/backend/controller/delete_detail_controller.php?id=<?php echo $first['penjualanId']; ?>" class="action delete">
                            Hapus
                        </a>
                    </div>
        </section>
    </main>
</body>

</html>