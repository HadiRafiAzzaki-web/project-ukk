<?php

include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';

$query = mysqli_query($connection, "select * from produk");
$jumlahProduk = mysqli_num_rows($query);

$queryPetugas = mysqli_query($connection, "select * from users where role = 'petugas'");
$jumlahPetugas = mysqli_num_rows($queryPetugas);

$queryPenjualan = mysqli_query($connection, "select *, pelanggan.namaPelanggan as nama from penjualan inner join pelanggan on penjualan.pelanggan_id = pelanggan.id");
$query = mysqli_query($connection, "
    select detail_penjualan.*, penjualan.*, produk.*, pelanggan.* 
    from detail_penjualan 
    inner join penjualan on detail_penjualan.penjualan_id = penjualan.id 
    inner join produk on detail_penjualan.produk_id = produk.id
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
");
$jumlahTransaksi = mysqli_num_rows($query);