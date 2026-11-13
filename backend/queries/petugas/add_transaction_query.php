<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';

$queryProduct = mysqli_query($connection, "select nama_produk, harga from produk");
$queryCustomer = mysqli_query($connection, "select namaPelanggan from pelanggan");

$productData = [];

while ($data = mysqli_fetch_assoc($queryProduct)) {
    $productData[] = $data;
}

$products = $_POST['nama_produk'] ?? [];
$quantities = $_POST['jumlah_produk'] ?? [];
$customer = $_POST['namaPelanggan'] ?? '';


$addInput = isset($_POST['count_input']) ? $_POST['count_input'] : 1;

if (isset($_POST['add_input'])) {
    $addInput++;
}

$totalHarga = 0;
$uangPelanggan = $_POST['uang_pelanggan'] ?? '';
$kembalian = 0;

foreach ($products as $i => $namaProduk) {
    foreach ($productData as $product) {
        if ($product['nama_produk'] == $namaProduk) {
            $totalHarga += $product['harga'] * ($quantities[$i] ?? 0);
            break;
        }
    }
}

if (isset($_POST['hitung_kembalian'])) {
    if ($uangPelanggan >= $totalHarga) {
        $kembalian = $uangPelanggan - $totalHarga;
    }
}