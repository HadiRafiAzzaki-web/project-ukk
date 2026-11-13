<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
include __DIR__ . '/../../utils/price_format.php';
include __DIR__ . '/../../../backend/queries/petugas/add_transaction_query.php';

?>

<!DOCTYPE html>
<html lang="id">

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
            <?php include __DIR__ . '/../../components/header.php' ?>

            <a href="./transaction.php" class="btn-return">← Kembali</a>

            <form method="post">
                <div class="input-group">
                    <label>Nama Pelanggan</label>
                    <input
                        type="text"
                        name="namaPelanggan"
                        list="nama-pelanggan"
                        placeholder="Masukkan Nama Pelanggan"
                        value="<?php echo $customer ?>"
                        required>
                    <datalist id="nama-pelanggan">
                        <?php while ($name = mysqli_fetch_assoc($queryCustomer)): ?>
                            <option value="<?php echo $name['namaPelanggan'] ?>">
                            </option>
                        <?php endwhile; ?>
                    </datalist>
                </div>
                <datalist id="product-list">
                    <?php foreach ($productData as $product): ?>
                        <option value="<?php echo $product['nama_produk'] ?>" label="<?php echo Rupiah($product['harga']) ?>">
                        </option>
                    <?php endforeach; ?>
                </datalist>
                <input type="hidden" name="count_input" value="<?php echo $addInput ?>">
                <?php for ($i = 0; $i < $addInput; $i++): ?>
                    <div class="input-group">
                        <label>Produk <?php echo $i + 1 ?></label>
                        <input
                            type="text"
                            name="nama_produk[]"
                            list="product-list"
                            placeholder="Masukkan Nama Produk"
                            value="<?php echo $products[$i] ?? '' ?>"
                            required>
                    </div>
                    <div class="input-group">
                        <label>Jumlah Produk</label>
                        <input
                            type="number"
                            name="jumlah_produk[]"
                            placeholder="Masukkan Jumlah"
                            min="1"
                            value="<?php echo $quantities[$i] ?? '' ?>"
                            required>
                    </div>
                <?php endfor; ?>
                <div class="input-group">
                    <label>Total Belanja</label>
                    <input type="text" name="total_harga" placeholder="Total Belanja" value="<?php echo Rupiah($totalHarga) ?>" readonly>
                </div>
                <div class="input-group">
                    <label>Uang Pelanggan</label>
                    <input type="number" min="1" name="uang_pelanggan" placeholder="Masukkan Uang Pelanggan" value="<?php echo $uangPelanggan ?>">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Uang Kembalian" value="<?php echo $kembalian !== '' ? Rupiah($kembalian) : '' ?>" readonly>
                </div>
                <div class="actions-form">
                    <button type="submit" name="add_input" class="btn-add">
                        + Tambah Produk Lain
                    </button>
                    <button type="submit" name="hitung_kembalian" class="btn-add">Hitung Kembalian</button>
                    <button type="submit" formaction="/web-kasir/backend/controller/add_transaction_controller.php" class="btn-add">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>