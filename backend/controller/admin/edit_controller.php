<?php
include_once __DIR__ . '/../../connection.php';
include __DIR__ . '/../../getUserData.php';

$id = $_POST['id'];
$name = $_POST['nama_produk'];
$price = $_POST['harga'];
$stock = $_POST['stok'];

mysqli_query($connection, "update produk set nama_produk='$name', harga='$price', stok='$stock' where id='$id'");

if ($dataUser['role'] === 'admin') {
    header("location: /web-kasir/frontend/admin/dashboard/tool_list.php");
} else if ($dataUser['role'] === 'petugas') {
    header("Location: /web-kasir/frontend/petugas/dashboard/tool_list.php");
}
