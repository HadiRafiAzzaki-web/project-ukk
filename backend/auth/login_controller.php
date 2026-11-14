<?php
include_once __DIR__ . '/../connection.php';

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connection, "select * from users where username = '$username' and password = '$password'");

if ($user = mysqli_fetch_array($query)) {
    $_SESSION['id'] = $user['id'];

    switch ($user['role']) {
        case 'admin':
            header("location: /web-kasir/frontend/admin/dashboard/home.php");
            exit();
        case 'petugas':
            header("location: /web-kasir/frontend/petugas/dashboard/home.php");
            exit();
        default:
        $_SESSION['error'] = "Role pengguna tidak valid";
        header("Location: /web-kasir/frontend/auth/page/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Username atau password salah";
    header("Location: /web-kasir/frontend/auth/page/login.php");
    exit();
}
