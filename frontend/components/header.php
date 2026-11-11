<?php
include_once __DIR__ . '/../../backend/getUserData.php';
?>

<header>
    <div class="user-info">
        <h3>Username: <?php echo $dataUser['username']; ?></h3>
        <p>Role: <?php echo $dataUser['role']; ?></p>
    </div>
</header>