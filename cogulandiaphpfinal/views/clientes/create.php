<!DOCTYPE html>
<html>
<head>
    <title>Criar Cliente</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../dashboard.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header><br>
    <div class="login-wrapper">
        <div class="login">
            <h1>Criar Cliente</h1>
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
            <form action="../../controllers/clienteController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($_SESSION['post_data']['nome'] ?? '', ENT_QUOTES); ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['post_data']['email'] ?? '', ENT_QUOTES); ?>">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" value="<?php echo htmlspecialchars($_SESSION['post_data']['senha'] ?? '', ENT_QUOTES); ?>">
                <input type="submit" value="Criar">
            </form>
            <?php unset($_SESSION['post_data']); ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
