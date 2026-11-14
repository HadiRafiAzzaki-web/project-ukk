<?php
include_once __DIR__ . '/../../../backend/connection.php';
include_once __DIR__ . '/../../../backend/getUserData.php';
require __DIR__ . '/../../../backend/auth.php';
include __DIR__ . '/../../../backend/queries/admin/edit_transaction_query.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php'; ?>

        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php'; ?>
            <h2>Edit Transaksi #<?php echo $id ?></h2>
            <div class="form">
                <form action="/web-kasir/backend/controller/edit_transaction_controller.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal_penjualan"
                            value="<?php echo $transaksi['tanggal_penjualan'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="pelanggan_id" required>
                            <?php while ($p = mysqli_fetch_assoc($pelanggan)): ?>
                                <option value="<?php echo $p['id'] ?>"
                                    <?php echo $p['id'] == $transaksi['pelanggan_id'] ? 'selected' : '' ?>>
                                    <?php echo $p['namaPelanggan'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <h3>Produk</h3>
                    <?php foreach ($details as $detail): ?>
                        <div class="product-item">
                            <input type="hidden" name="detail_id[]"
                                value="<?php echo $detail['id'] ?>">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <select name="produk_id[]" required>
                                    <?php
                                    mysqli_data_seek($produk, 0);
                                    while ($item = mysqli_fetch_assoc($produk)):
                                    ?>
                                        <option value="<?php echo $item['id'] ?>"
                                            <?php echo $item['id'] == $detail['produk_id'] ? 'selected' : '' ?>>
                                            <?php echo $item['nama_produk'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah_produk[]"
                                    value="<?php echo $detail['jumlah_produk'] ?>" min="1" required>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group">
                        <label>Uang Pelanggan</label>
                        <input type="number" name="uang_pelanggan"
                            value="<?php echo $transaksi['uang_pelanggan'] ?>" min="0" required>
                    </div>
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                    <a href="./transaction.php" class="btn-cancel">Batal</a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>