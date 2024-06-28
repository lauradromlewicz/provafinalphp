<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cogulandia</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index.php"><img src="../Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
        </nav>
    </header><br><br>
    <div class="login-wrapper">
        <div class="login">
            <h1>Login</h1>
            <form action="../../controllers/UsuarioController.php" method="POST">
                <input type="hidden" name="acao" value="autenticar">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($_COOKIE['email'] ?? '', ENT_QUOTES); ?>">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" value="<?php echo htmlspecialchars($_COOKIE['senha'] ?? '', ENT_QUOTES); ?>">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" placeholder="(XX) XXXXX-XXXX" value="<?php echo htmlspecialchars($_POST['telefone'] ?? '', ENT_QUOTES); ?>">
                <label>
                    <input type="checkbox" name="lembrar" <?php if(isset($_COOKIE['email'])) echo 'checked';  ?>>Lembrar senha
                </label>
                <input type="submit" value="Entrar">
            </form>
            <?php
            if (isset($_GET['erro']) && $_GET['erro'] == 1) {
                echo '<p>Usuário ou senha incorretos.</p>';
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $telefone = $_POST['telefone'];
                $telefone = preg_replace('/[^0-9]/', '', $telefone); // Remove caracteres não numéricos

                if (strlen($telefone) == 11) {
                    $telefone_formatado = sprintf('(%s) %s-%s',
                        substr($telefone, 0, 2),
                        substr($telefone, 2, 5),
                        substr($telefone, 7)
                    );
                    echo '<p>Telefone formatado: ' . htmlspecialchars($telefone_formatado, ENT_QUOTES) . '</p>';
                } else {
                    echo '<p>Telefone inválido. Use o formato (XX) XXXXX-XXXX.</p>';
                }
            }
            ?>
            <p><a href="registro.php">Não tem uma conta? Cadastre-se</a></p>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
