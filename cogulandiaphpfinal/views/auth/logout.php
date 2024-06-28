<?php
session_start();
session_destroy();
setcookie('senha', '', time() -3600, "/");
header('Location: login.php');
exit();
?>
