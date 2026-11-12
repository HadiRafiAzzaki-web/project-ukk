<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php' ?>
            <form action="/web-kasir/backend/controller/register_controller.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Masukkan Username Petugas">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" placeholder="Masukkan Password Petugas">
                </div>
                <button type="submit">Tambahkan</button>
            </form>
        </section>
    </main>
</body>

</html>