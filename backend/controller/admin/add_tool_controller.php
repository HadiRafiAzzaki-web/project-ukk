<?php
include_once __DIR__ . '/../../connection.php';
include __DIR__ . '/../../getUserData.php';

$productName = $_POST['nama_produk'];
$productPrice = $_POST['harga'];
$productStock = $_POST['stok'];

$query = mysqli_query($connection, "insert into produk (nama_produk, harga, stok) values ('$productName', '$productPrice', '$productStock')");

if ($dataUser['role'] === 'admin') {
    header("location: /web-kasir/frontend/admin/dashboard/tool_list.php");
} else if ($dataUser['role'] === 'petugas') {
    header("Location: /web-kasir/frontend/petugas/dashboard/tool_list.php");
}
