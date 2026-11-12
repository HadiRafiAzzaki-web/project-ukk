<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';
include __DIR__ . '/../../utils/price_format.php';

$queryProduk = mysqli_query($connection, "select * from produk");
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
            <a href="./add_tool.php">+ Tambah Produk</a>

            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produk = mysqli_fetch_assoc($queryProduk)): ?>
                        <tr>
                            <td><?php echo $produk['nama_produk'] ?></td>
                            <td><?php echo Rupiah($produk['harga']) ?></td>
                            <td><?php echo $produk['stok'] ?></td>
                            <td>
                                <a href="./edit_product.php?id=<?php echo $produk['id']; ?>" class="action update">Edit</a>
                                <a href="/web-kasir/backend/controller/admin/delete_controller.php?id=<?php echo $produk['id']; ?>" class="action delete">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>