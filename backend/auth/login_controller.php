<?php
include_once __DIR__ . '/../connection.php';

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connection, "select * from users where username = '$username' and password = '$password'");

if ($user = mysqli_fetch_array($query)) {
    switch ($user['role']) {
        case 'admin':
            $_SESSION['id'] = $user['id'];
            header("location: /web-kasir/frontend/admin/dashboard/home.php");
            break;
        case 'petugas':
            $_SESSION['id'] = $user['id'];
            header("location: /web-kasir/frontend/petugas/dashboard/home.php");
    }
}
