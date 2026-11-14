<?php
include __DIR__ . '/../../connection.php';
require __DIR__ . '/../../auth.php';

$id = $_GET['id'];

$query = mysqli_query($connection, "select * from penjualan where id = '$id'");
$transaksi = mysqli_fetch_assoc($query);

$queryTransaction = mysqli_query($connection, "
    select detail_penjualan.*, produk.nama_produk, produk.harga
    from detail_penjualan
    join produk on detail_penjualan.produk_id = produk.id
    where detail_penjualan.penjualan_id = '$id'
");

$details = mysqli_fetch_all($queryTransaction, MYSQLI_ASSOC);

$pelanggan = mysqli_query($connection, "select * from pelanggan");
$produk = mysqli_query($connection, "select * from produk");