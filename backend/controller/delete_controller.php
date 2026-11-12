<?php
include_once __DIR__ . '/../connection.php';
include __DIR__ . '/../getUserData.php';

$id = $_GET['id'];

mysqli_query($connection, "delete from produk where id = '$id'");

if ($dataUser['role'] === 'admin') {
    header("location: /web-kasir/frontend/admin/dashboard/tool_list.php");
} else if ($dataUser['role'] === 'petugas') {
    header("Location: /web-kasir/frontend/petugas/dashboard/tool_list.php");
}
