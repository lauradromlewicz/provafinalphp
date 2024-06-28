<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../Imgs/cogulogos.jpg"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
            <a href="../dashboard.php" class="btn-login">Voltar ao Dashboard</a>  
        </nav>
    </header><br><br>
    <div class="login-wrapper">
        <div class="login">
            <h1>Atualizar Produto</h1>
            <?php
            include_once __DIR__ . '/../../controllers/ProdutoController.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller = new ProdutoController();
                $id = $_GET['id'];
                $produtos = $controller->listar();
                $produto = null;

                foreach ($produtos as $p) {
                    if ($p['id'] == $id) {
                        $produto = $p;
                        break;
                    }
                }

                if ($produto):
            ?>
            <?php

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
                <form action="<?php echo '../../controllers/ProdutoController.php'; ?>" method="POST">
                    <input type="hidden" name="acao" value="atualizar">
                    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>">
                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>">
                    <label for="preco">Preço:</label>
                    <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>">
                    <input type="submit" value="Atualizar">
                </form>
            <?php
                else:
                    echo "<p>Produto não encontrado.</p>";
                endif;
            } else {
                echo "<p>ID inválido.</p>";
            }
            ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
