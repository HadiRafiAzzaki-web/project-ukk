<?php
include_once __DIR__ . '/connection.php';
require __DIR__ . '/auth.php';

$idUser = $_SESSION['id'];
$query = mysqli_query($connection, "select * from users where id = '$idUser'");
$dataUser = mysqli_fetch_assoc($query);