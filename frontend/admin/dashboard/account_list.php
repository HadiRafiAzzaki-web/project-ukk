<?php
include_once __DIR__ . '/../../../backend/connection.php';
require __DIR__ . '/../../../backend/auth.php';
include_once __DIR__ . '/../../../backend/getUserData.php';

$query = mysqli_query($connection, "select * from users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Akun</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../../components/sidebar.php' ?>
        <section class="dashboard">
            <?php include __DIR__ . '/../../components/header.php' ?>
            <table>
                <thead>
                    <th>Id Petugas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                </thead>
                <tbody>
                    <?php while ($staff = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $staff['id'] ?></td>
                            <td><?php echo $staff['username'] ?></td>
                            <td><?php echo $staff['password'] ?></td>
                            <td><?php echo $staff['role'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>