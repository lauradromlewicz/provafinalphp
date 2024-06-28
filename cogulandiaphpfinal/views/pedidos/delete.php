<!DOCTYPE html>
<html>
<head>
    <title>Deletar Pedido</title>
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
        <h1>Deletar Pedido</h1>
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
                <p>ID: <?php echo $pedido['id']; ?></p>
                <p>Cliente ID: <?php echo $pedido['cliente_id']; ?></p>
                <p>Produto ID: <?php echo $pedido['produto_id']; ?></p>
                <p>Quantidade: <?php echo $pedido['quantidade']; ?></p>
                <p>Data do Pedido: <?php echo $pedido['data_pedido']; ?></p>
                <form action="../../controllers/PedidoController.php" method="POST">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                    <button type="submit">Confirmar Deleção</button>
                </form>
                <a href="read.php">Cancelar</a>
        <?php
            else:
                echo "<p>Pedido não encontrado.</p>";
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
