<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tool</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/add_tool.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <a href="./tool_list.php"><- Kembali</a>
                    <form action="/web-kasir/backend/controller/add_tool_controller.php" method="post">
                        <div class="input-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk">
                        </div>
                        <div class="input-group">
                            <label for="harga">Harga Produk</label>
                            <input type="number" name="harga" min="1">
                        </div><div class="input-group">
                            <label for="stok">Stok Produk</label>
                            <input type="number" name="stok" min="1">
                        </div>
                        <button type="submit">Tambahkan</button>
                    </form>
        </section>
    </main>
</body>

</html>