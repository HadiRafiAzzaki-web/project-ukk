<?php
include_once __DIR__ . '/../../connection.php';
require __DIR__ . '/../../auth.php';

$query = mysqli_query($connection, "
    select penjualan.id,
    penjualan.tanggal_penjualan,
    penjualan.total_harga,
    pelanggan.namaPelanggan,
        group_concat(
            concat(produk.nama_produk, ' (', detail_penjualan.jumlah_produk, ')')
            separator ', '
        ) as daftar_produk
    from penjualan
    inner join pelanggan on penjualan.pelanggan_id = pelanggan.id
    inner join detail_penjualan on penjualan.id = detail_Penjualan.penjualan_id
    inner join produk on detail_penjualan.produk_id = produk.id
    group by penjualan.id
    order by penjualan.id desc
");