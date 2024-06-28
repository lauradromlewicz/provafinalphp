<!DOCTYPE html>
<html>
<head>
    <title>Listar Produtos</title>
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
        <h1>Listar Produtos</h1>
        <?php
        include_once __DIR__ . '/../../controllers/ProdutoController.php';
        $controller = new ProdutoController();
        $produtos = $controller->listar();

        function formatarNumero($numero) {
            return number_format($numero, 2, ',', '.');
        }
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo "R$". formatarNumero($produto['preco']); ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $produto['id']; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $produto['id']; ?>">Deletar</a>
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
