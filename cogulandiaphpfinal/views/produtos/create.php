<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
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
    <div class="login-wrapper">
        <div class="login">
            <h1>Criar Produto</h1>
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
            <form action="../../controllers/produtoController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($_SESSION['post_data']['nome'] ?? '', ENT_QUOTES); ?>">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" value="<?php echo htmlspecialchars($_SESSION['post_data']['descricao'] ?? '', ENT_QUOTES); ?>">
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" name="preco" value="<?php echo htmlspecialchars($_SESSION['post_data']['preco'] ?? '', ENT_QUOTES); ?>">
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
