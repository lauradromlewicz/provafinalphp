<!DOCTYPE html>
<html>
<head>
    <title>Deletar Cliente</title>
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
        <h1>Deletar Cliente</h1>
        <?php
        include_once __DIR__ . '/../../controllers/ClienteController.php';

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            echo "ID do Cliente: " . $_GET['id'];
            $controller = new ClienteController();
            $id = $_GET['id'];
            $clientes = $controller->listar();
            $cliente = null;

            foreach ($clientes as $c) {
                if ($c['id'] == $id) {
                    $cliente = $c;
                    break;
                }
            }

            if ($cliente):
        ?>
                <p>ID: <?php echo $cliente['id']; ?></p>
                <p>Nome: <?php echo $cliente['nome']; ?></p>
                <p>Email: <?php echo $cliente['email']; ?></p>
                <form action="../../controllers/ClienteController.php" method="POST">
                    <input type="hidden" name="acao" value="deletar">
                    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                    <button type="submit">Confirmar Deleção</button>
                </form>
                <a href="read.php">Cancelar</a>
        <?php
            else:
                echo "<p>Cliente não encontrado.</p>";
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
