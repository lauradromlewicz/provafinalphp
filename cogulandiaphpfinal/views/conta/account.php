<?php
session_start();
require_once __DIR__ . '/../../models/Usuario.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta - Cogulandia</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../dashboard.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header>
    <div class="account-wrapper">
        <div class="account">
            <h1>Minha Conta</h1>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <a href="update.php" class="btn">Editar Informações</a>
            <form method="POST" action="delete.php">
                <button type="submit" class="btn" onclick="return confirm('Você tem certeza que deseja excluir sua conta?');">Deletar Conta</button>
            </form>
            <a href="../dashboard.php" class="btn">Voltar</a>
        </div>
    </div>
</body>
</html>
