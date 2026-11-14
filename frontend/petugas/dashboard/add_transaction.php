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
        <?php include __DIR__ . '/../../components/sidebar.php'; ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php'; ?>
            <a href="./transaction.php" class="btn-return">← Kembali</a>
            <h2>Tambah Transaksi</h2>
            <form method="post" class="form-edit">
                <input type="hidden" name="count_input" value="<?php echo $addInput ?>">
                <h3 class="form-title">Informasi Pelanggan</h3>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input
                        type="text"
                        name="namaPelanggan"
                        list="nama-pelanggan"
                        placeholder="Masukkan nama pelanggan"
                        value="<?php echo $customer ?>"
                        required>
                    <datalist id="nama-pelanggan">
                        <?php
                        mysqli_data_seek($queryCustomer, 0);
                        while ($name = mysqli_fetch_assoc($queryCustomer)):
                        ?>
                            <option value="<?php echo $name['namaPelanggan'] ?>">
                        <?php endwhile; ?>
                    </datalist>
                </div>
                <h3 class="form-title">Daftar Produk</h3>
                <?php for ($i = 0; $i < $addInput; $i++): ?>
                    <div class="product-item">
                        <div class="form-group">
                            <label>Produk <?php echo $i + 1 ?></label>
                            <select name="nama_produk[]" required>
                                <option value="">Pilih Produk</option>
                                <?php foreach ($productData as $product): ?>
                                    <option
                                        value="<?php echo $product['nama_produk'] ?>"
                                        <?php echo (($products[$i] ?? '') === $product['nama_produk']) ? 'selected' : '' ?>>
                                        <?php echo $product['nama_produk'] ?>
                                        - <?php echo Rupiah($product['harga']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Produk</label>
                            <input
                                type="number"
                                name="jumlah_produk[]"
                                min="1"
                                placeholder="Masukkan jumlah"
                                value="<?php echo $quantities[$i] ?? '' ?>"
                                required>
                        </div>
                    </div>
                <?php endfor; ?>
                <h3 class="form-title">Pembayaran</h3>
                <div class="form-group">
                    <label>Total Belanja</label>
                    <input
                        type="text"
                        value="<?php echo Rupiah($totalHarga) ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Uang Pelanggan</label>
                    <input
                        type="number"
                        name="uang_pelanggan"
                        min="1"
                        placeholder="Masukkan uang pelanggan"
                        value="<?php echo $uangPelanggan ?>">
                </div>
                <div class="form-group">
                    <label>Uang Kembalian</label>
                    <input
                        type="text"
                        value="<?php echo $kembalian !== '' ? Rupiah($kembalian) : '' ?>"
                        readonly>
                </div>
                <div class="actions-form">
                    <button type="submit" name="add_input" class="btn-add">
                        + Tambah Produk
                    </button>
                    <button type="submit" name="hitung_kembalian" class="btn-add">
                        Hitung Kembalian
                    </button>
                    <button
                        type="submit"
                        formaction="/web-kasir/backend/controller/add_transaction_controller.php"
                        class="btn-save">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
