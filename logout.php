<?php
session_start();
session_unset();
session_destroy();
$expiry = time()-100;
setcookie('id',"",$expiry);
setcookie('randstr',"",$expiry);
unset($_COOKIE['id']);
unset($_COOKIE['randstr']);
header('Location: login.php',true,302);
?>