<?php
session_start();
session_destroy();

header("Location: /web-kasir/frontend/auth/page/login.php");
exit();