<?php
include __DIR__ . '/../../../backend/connection.php';

$id = $_GET['id'];
$dataProduct = mysqli_query($connection, "select * from produk where id = '$id'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>

        <section class="dashboard">
            <a href="./tool_list.php"><- Kembali</a>
                    <?php while ($product = mysqli_fetch_array($dataProduct)): ?>
                        <form action="../../../backend/controller/admin/edit_controller.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <div class="input-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" value="<?php echo $product['nama_produk'] ?>">
                            </div>
                            <div class="input-group">
                                <label for="harga">Harga Produk</label>
                                <input type="number" name="harga" min="1" value="<?php echo $product['harga'] ?>">
                            </div>
                            <div class="input-group">
                                <label for="stok">Stok Produk</label>
                                <input type="number" name="stok" min="1" value="<?php echo $product['stok'] ?>">
                            </div>
                            <button type="submit">Edit</button>
                        </form>
                    <?php endwhile; ?>
        </section>
    </main>
    </main>
</body>

</html>