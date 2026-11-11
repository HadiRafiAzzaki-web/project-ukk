<?php
$connection = mysqli_connect("localhost", "root", "", "db_kasir");

if (!$connection) {
    die("Tidak ada koneksi" . mysqli_connect_error());
}