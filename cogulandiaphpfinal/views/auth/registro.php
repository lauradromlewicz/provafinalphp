<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Cogulandia</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header><br><br>

    <div class="login-wrapper">
        <div class="login">
            <h1>Registrar-se</h1>

            <?php
            session_start();
            if (isset($_SESSION['errors'])):
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            ?>
            <div class="errors">
                    <?php foreach ($errors as $error): ?>
                        <?php echo htmlspecialchars($error); ?><br>
                    <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <form action="../../controllers/UsuarioController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="username">Usuário:</label>
                <input type="text" name="username">
                <label for="email">Email:</label>
                <input type="email" name="email">
                <label for="senha">Senha:</label>
                <input type="password" name="senha">
                <input type="submit" value="Registrar">
            </form>
            <p><a href="login.php">Já tem uma conta? Faça login</a></p>
        </div>
    </div>
<footer class="footer">
    <div class="footer-bottom">
        <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
    </div>
</footer>
</body>
</html>