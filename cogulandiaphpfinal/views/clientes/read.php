<!DOCTYPE html>
<html>
<head>
    <title>Listar Clientes</title>
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
        <h1>Listar Clientes</h1>
        <?php
        include_once __DIR__ . '/../../controllers/ClienteController.php';
        $controller = new ClienteController();
        $clientes = $controller->listar();
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
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
