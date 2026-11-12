<?php
include __DIR__ . '/../connection.php';
require __DIR__ . '/../auth.php';

$name = $_POST['username'];
$pass = $_POST['password'];

if (isset($name) && isset($pass)) {
    mysqli_query($connection, "insert into users (username, password, role) values ('$name', '$pass', 'petugas')");
    header("location: /web-kasir/frontend/admin/dashboard/home.php");
}