<?php
include_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../auth.php';

$id = $_POST['id'];
$tanggal = $_POST['tanggal_penjualan'];
$pelanggan = $_POST['pelanggan_id'];
$uang = $_POST['uang_pelanggan'];

$detail_id = $_POST['detail_id'];
$produk_id = $_POST['produk_id'];
$jumlah = $_POST['jumlah_produk'];

$total = 0;

foreach ($detail_id as $key => $detail) {
    $produk = $produk_id[$key];
    $qty = $jumlah[$key];

    $query = mysqli_query($connection, "select harga from produk where id = '$produk'");
    $dataHarga = mysqli_fetch_assoc($query);

    $subtotal = $dataHarga['harga'] * $qty;
    $total += $subtotal;

    mysqli_query($connection, "
        update detail_penjualan
        set produk_id = '$produk',
            jumlah_produk = '$qty',
            subtotal = '$subtotal'
        where id = '$detail'
        and penjualan_id = '$id'
    ");
}

$kembalian = $uang - $total;

mysqli_query($connection, "
    update penjualan
    set tanggal_penjualan = '$tanggal',
        pelanggan_id = '$pelanggan',
        total_harga = '$total',
        uang_pelanggan = '$uang',
        kembalian = '$kembalian'
    where id = '$id'
");

header("Location: /web-kasir/frontend/admin/dashboard/transaction.php");
exit;