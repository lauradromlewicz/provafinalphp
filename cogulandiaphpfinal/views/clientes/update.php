<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Cliente</title>
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
            <h1>Atualizar Cliente</h1>
            <?php
            include_once __DIR__ . '/../../controllers/ClienteController.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                echo "ID Capturado: " . $_GET['id']; // Mensagem de depuração
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

                    <form action="<?php echo '../../controllers/ClienteController.php'; ?>" method="POST">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $cliente['email']; ?>">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha">
                        <input type="submit" value="Atualizar">
                    </form>
            <?php
                else: echo "<p>Cliente não encontrado.</p>";
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
