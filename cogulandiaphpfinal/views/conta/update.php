<?php
session_start();
require_once __DIR__ . '/../../models/Usuario.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    Usuario::updateUser($_SESSION['user_id'], $username, $email, $senha);

    $_SESSION['user'] = Usuario::getUserById($_SESSION['user_id']);

    header('Location: account.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações - Cogulandia</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../dashboard.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../conta/account.php" class="btn-login">Minha Conta</a></li>
            </ul>
        </nav>
    </header>
    <br><br>
    <div class="account-wrapper">
        <div class="account">
            <h1>Editar Informações</h1>
            <form method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br>
                <label for="senha">Nova Senha:</label>
                <input type="password" id="senha" name="senha"><br>
                <button type="submit" class="btn">Salvar</button>
            </form>
            <a href="account.php" class="btn">Voltar</a>
        </div>
    </div>
</body>
</html>
