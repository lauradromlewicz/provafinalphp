<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pedido</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../dashboard.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header><br><br>
    <div class="login-wrapper">
        <div class="login">
            <h1>Atualizar Pedido</h1>
            <?php
            include_once __DIR__ . '/../../controllers/PedidoController.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $controller = new PedidoController();
                $id = $_GET['id'];
                $pedidos = $controller->listar();
                $pedido = null;

                foreach ($pedidos as $p) {
                    if ($p['id'] == $id) {
                        $pedido = $p;
                        break;
                    }
                }

                if ($pedido):
            ?>
                    <form action="<?php echo '../../controllers/PedidoController.php'; ?>" method="POST">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                        <label for="cliente_id">Cliente ID:</label>
                        <input type="number" name="cliente_id" value="<?php echo $pedido['cliente_id']; ?>">
                        <label for="produto_id">Produto ID:</label>
                        <input type="number" name="produto_id" value="<?php echo $pedido['produto_id']; ?>">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" value="<?php echo $pedido['quantidade']; ?>">
                        <input type="submit" value="Atualizar">
                    </form>
            <?php
                else:
                    echo "<p>Pedido não encontrado.</p>";
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
