<?php
include_once __DIR__ . '/../connection.php';
require __DIR__ . '/../auth.php';
include_once __DIR__ . '/../getUserData.php';

$name = $_POST['namaPelanggan'];
$address = $_POST['alamat'];
$noPhone = $_POST['noPhone'];
$staffId = $dataUser['id'];

$query = mysqli_query($connection, "insert into pelanggan (namaPelanggan, alamat, noPhone, petugas_id) values ('$name', '$address', '$noPhone', '$staffId')");

if ($query) {
    header("Location: /web-kasir/frontend/petugas/dashboard/home.php");
}