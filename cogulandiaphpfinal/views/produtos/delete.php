<!DOCTYPE html>
<html>
<head>
    <title>Deletar Produto</title>
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
    <div class="content">
        <h1>Deletar Produto</h1>
        <?php
        include_once __DIR__ . '/../../controllers/ProdutoController.php';

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            echo "ID Capturado: " . $_GET['id']; // Mensagem de depuração
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
                <p>ID: <?php echo $produto['id']; ?></p>
                <p>Nome: <?php echo $produto['nome']; ?></p>
                <p>Descrição: <?php echo $produto['descricao']; ?></p>
                <p>Preço: <?php echo $produto['preco']; ?></p>
                <form action="../../controllers/ProdutoController.php" method="POST">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                    <button type="submit">Confirmar Deleção</button>
                </form>
                <a href="read.php">Cancelar</a>
        <?php
            else:
                echo "<p>Produto não encontrado.</p>";
            endif;
        } else {
            echo "<p>ID inválido.</p>";
        }
        ?>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
