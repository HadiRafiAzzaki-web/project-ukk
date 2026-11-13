<?php
include_once __DIR__ . '/../../connection.php';
require __DIR__ . '/../../auth.php';

$id = $_GET['id'];

$query = mysqli_query($connection, "
    select detail_penjualan.*,
    penjualan.tanggal_penjualan as tanggal,
    penjualan.id as penjualanId,
    penjualan.total_harga,
    penjualan.uang_pelanggan,
    penjualan.kembalian,
    produk.nama_produk,
    produk.harga,
    pelanggan.namaPelanggan,
    users.username
    from detail_penjualan
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
    inner join users on penjualan.petugas_id = users.id
    where detail_penjualan.penjualan_id = '$id'
");