<?php
include_once __DIR__ . '/../../connection.php';

$customName = $_POST['namaPelanggan'];
$address = $_POST['alamat'];
$noPhone = $_POST['nomorTelepon'];
$nameProduct = $_POST['nama_produk'];
$totalProduct = $_POST['jumlah_produk'];

$queryCustomer = mysqli_query($connection, "select * from pelanggan where namaPelanggan = '$customName'");
$checkCustomer = mysqli_num_rows($queryCustomer);

if ($checkCustomer === 0) {
    mysqli_query($connection, "insert into pelanggan (namaPelanggan, alamat, nomorTelepon) values ('$customName', '$address', '$noPhone')");

$queryProduct = mysqli_query($connection, "select id, harga from produk where nama_produk = '$nameProduct'");
$productData = mysqli_fetch_assoc($queryProduct);
$idProduct = $productData['id'];
$productPrice = $productData['harga'];

$queryCustomer = mysqli_query($connection, "select id from pelanggan where namaPelanggan = '$customName'");
$dataCustomer = mysqli_fetch_assoc($queryCustomer);
$idCustomer = $dataCustomer['id'];

$subtotal = $productPrice * $totalProduct;

mysqli_query($connection, "insert into penjualan (total_harga, pelanggan_id) values ('$productPrice', '$idCustomer')");

$queryPenjualan = mysqli_query($connection, "select id from penjualan order by id desc limit 1");
$dataPenjualan = mysqli_fetch_assoc($queryPenjualan);
$idPenjualan = $dataPenjualan['id'];

mysqli_query($connection, "insert into detail_penjualan (penjualan_id, produk_id, jumlah_produk, subtotal) values ('$idPenjualan', '$idProduct', '$totalProduct', '$subtotal')");

header("Location: /web-kasir/frontend/petugas/dashboard/transaction.php");
exit();
}

$queryProduct = mysqli_query($connection, "select id, harga from produk where nama_produk = '$nameProduct'");
$productData = mysqli_fetch_assoc($queryProduct);
$idProduct = $productData['id'];
$productPrice = $productData['harga'];

$queryCustomer = mysqli_query($connection, "select id from pelanggan where namaPelanggan = '$customName'");
$dataCustomer = mysqli_fetch_assoc($queryCustomer);
$idCustomer = $dataCustomer['id'];

$subtotal = $productPrice * $totalProduct;

mysqli_query($connection, "insert into penjualan (total_harga, pelanggan_id) values ('$productPrice', '$idCustomer')");

$queryPenjualan = mysqli_query($connection, "select id from penjualan order by id desc limit 1");
$dataPenjualan = mysqli_fetch_assoc($queryPenjualan);
$idPenjualan = $dataPenjualan['id'];

mysqli_query($connection, "insert into detail_penjualan (penjualan_id, produk_id, jumlah_produk, subtotal) values ('$idPenjualan', '$idProduct', '$totalProduct', '$subtotal')");

header("Location: /web-kasir/frontend/petugas/dashboard/transaction.php");