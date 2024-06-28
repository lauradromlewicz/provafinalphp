<?php
session_start();
require_once __DIR__ . '/../../models/Usuario.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

Usuario::deleteUser($user_id);
session_destroy();

header('Location: ../auth/login.php');
exit();
?>
