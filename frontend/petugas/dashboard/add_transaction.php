<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';

$queryProduct = mysqli_query($connection, "select * from produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>

        <section class="dashboard">
            <form action="/web-kasir/backend/controller/admin/add_transaction_controller.php" method="post">
                <div class="input-group">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" placeholder="Masukkan Nama Pelanggan">
                </div>
                <div class="input-group">
                    <label for="alamat">Alamat Pelanggan</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat Pelanggan">
                </div>
                <div class="input-group">
                    <label for="nomorTelepon">No. Hp Pelanggan</label>
                    <input type="text" name="nomorTelepon" placeholder="Masukkan Nomor Telepon Pelanggan">
                </div>
                <div class="input-group">
                    <label for="nama_produk">Produk yang Dibeli Pelanggan</label>
                    <input type="text" name="nama_produk" list="product-list" placeholder="Masukkan Nama Produk Pelanggan">
                    <datalist name="nama_produk" id="product-list">
                        <?php while ($product = mysqli_fetch_assoc($queryProduct)): ?>
                            <option value="<?php echo $product['nama_produk']; ?>"><?php echo $product['nama_produk']; ?></option>
                        <?php endwhile; ?>
                    </datalist>
                </div>
                <div class="input-group">
                    <label for="jumlah_produk">Jumlah Produk</label>
                    <input type="text" name="jumlah_produk" placeholder="Masukkan Jumlah Produk Pelanggan">
                </div>
                <button type="submit">Tambah</button>
            </form>
        </section>
    </main>
</body>

</html>