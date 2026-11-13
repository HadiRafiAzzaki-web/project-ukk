<?php
include_once __DIR__ . '/../connection.php';
include __DIR__ . '/../getUserData.php';

$customName = $_POST['namaPelanggan'];
$productsName = $_POST['nama_produk'];
$productQuantity = $_POST['jumlah_produk'];
$customMoney = $_POST['uang_pelanggan'];

$staffId = $dataUser['id'];

$qCustomer = mysqli_query($connection, "
    select id from pelanggan
    where namaPelanggan = '$customName'
");

$customer = mysqli_fetch_assoc($qCustomer);
$idCustom = $customer['id'];

mysqli_query($connection, "
    insert into penjualan (total_harga, uang_pelanggan, kembalian, pelanggan_id, petugas_id)
    values (0, 0, 0, '$idCustom', '$staffId')
");

$penjualanId = mysqli_insert_id($connection);

$total_harga = 0;

for ($i = 0; $i < count($productsName); $i++) {

    $nama_produk = $productsName[$i];
    $jumlah = $productQuantity[$i];

    if ($nama_produk !== '' && $jumlah > 0) {

        $qProduct = mysqli_query($connection, "
            select id, harga from produk
            where nama_produk = '$nama_produk'
        ");

        $produk = mysqli_fetch_assoc($qProduct);

        if (!$produk) {
            die("tidak menemukan data produk" . $produk['nama_produk']);
        }

        $produk_id = $produk['id'];
        $subtotal = $produk['harga'] * $jumlah;

        $total_harga += $subtotal;

        mysqli_query($connection, "
            insert into detail_penjualan
            (penjualan_id, produk_id, jumlah_produk, subtotal)
            values ('$penjualanId', '$produk_id', '$jumlah', '$subtotal')
        ");

        mysqli_query($connection, "
            update produk
            set stok = stok - $jumlah
            where id = '$produk_id'
        ");
    }
}

$kembalian = $customMoney - $total_harga;

mysqli_query($connection, "
    update penjualan
    set total_harga = '$total_harga',
        uang_pelanggan = '$customMoney',
        kembalian = '$kembalian'
    where id = '$penjualanId'
");

header("Location: /web-kasir/frontend/petugas/dashboard/transaction.php");
exit();
