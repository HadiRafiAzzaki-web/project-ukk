<?php
include_once __DIR__ . '/../connection.php';

$id = $_GET['id'];

$deleteDetail = mysqli_query($connection, "
    delete from detail_penjualan
    where penjualan_id = '$id'
");

$deletePenjualan = mysqli_query($connection, "
    delete from penjualan
    where id = '$id'
");

if ($deletePenjualan) {
    header("Location: /web-kasir/frontend/admin/dashboard/transaction.php");
    exit;
} else {
    echo "Gagal menghapus transaksi: " . mysqli_error($connection);
}