<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <main class="container">
        <div class="card">
            <a href="../../index.php" class="btn-return"><- Kembali</a>
            <form action="/web-kasir/backend/auth/login_controller.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="text" name="password">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </main>
</body>

</html>