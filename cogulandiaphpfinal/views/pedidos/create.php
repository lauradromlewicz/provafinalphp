<!DOCTYPE html>
<html>
<head>
    <title>Criar Pedido</title>
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
            <h1>Criar Pedido</h1>
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
            <form action="../../controllers/pedidoController.php" method="POST">
                <input type="hidden" name="acao" value="criar">
                <label for="cliente_id">Cliente ID:</label>
                <input type="number" name="cliente_id" value="<?php echo htmlspecialchars($_SESSION['post_data']['cliente_id'] ?? '', ENT_QUOTES); ?>">
                <label for="produto_id">Produto ID:</label>
                <input type="number" name="produto_id" value="<?php echo htmlspecialchars($_SESSION['post_data']['produto_id'] ?? '', ENT_QUOTES); ?>">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" value="<?php echo htmlspecialchars($_SESSION['post_data']['quantidade'] ?? '', ENT_QUOTES); ?>">
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
