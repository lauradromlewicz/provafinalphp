<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cogulandia</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../views/index.php"><img src="../views/Imgs/cogulogos.jpg" alt="Minha Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="conta/account.php" class="btn-login">Minha Conta</a></li>
                <li><a href="auth/logout.php" class="btn-login">Sair</a></li>
            </ul>
        </nav>
    </header>

<script>
function logClick() {
    console.log("Logout button clicked");
}
</script>

    <div class="dashboard-wrapper">
        <div class="dashboard">
            <h1>Dashboard</h1>
            <div class="crud-section">
                <h2>Clientes</h2>
                <ul>
                    <li><a href="../views/clientes/create.php" class="btn">Criar Cliente</a></li>
                    <li><a href="../views/clientes/read.php" class="btn">Listar Clientes</a></li>
                </ul>
            </div>
            <div class="crud-section">
                <h2>Produtos</h2>
                <ul>
                    <li><a href="../views/produtos/create.php" class="btn">Criar Produto</a></li>
                    <li><a href="../views/produtos/read.php" class="btn">Listar Produtos</a></li>
                </ul>
            </div>
            <div class="crud-section">
                <h2>Pedidos</h2>
                <ul>
                    <li><a href="../views/pedidos/create.php" class="btn">Criar Pedido</a></li>
                    <li><a href="../views/pedidos/read.php" class="btn">Listar Pedidos</a></li>
                </ul>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>