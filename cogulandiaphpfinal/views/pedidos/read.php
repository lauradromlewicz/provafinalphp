<!DOCTYPE html>
<html>
<head>
    <title>Listar Pedidos</title>
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
        <h1>Listar Pedidos</h1>
        <?php
        include_once __DIR__ . '/../../controllers/PedidoController.php';
        $controller = new PedidoController();
        $pedidos = $controller->listar();
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Cliente ID</th>
                <th>Produto ID</th>
                <th>Quantidade</th>
                <th>Data do Pedido</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido['id']; ?></td>
                    <td><?php echo $pedido['cliente_id']; ?></td>
                    <td><?php echo $pedido['produto_id']; ?></td>
                    <td><?php echo $pedido['quantidade']; ?></td>
                    <td><?php echo $pedido['data_pedido']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $pedido['id']; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $pedido['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
