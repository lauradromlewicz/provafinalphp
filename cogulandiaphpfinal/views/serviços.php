<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cogulandia</title>
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
                <li><a href="../views/auth/login.php" class="btn-login">Entrar</a></li>
                <li><a href="../views/auth/registro.php" class="btn-register">Registrar</a></li>
            </ul> 
        </nav>

        <nav class="custom-nav">
            <ul class="nav-linkss"> 
                <li>
                    <a href="../views/index.php">Home</a>
                </li>
                <li>
                    <a href="../views/serviços.php" >Serviços</a>
                </li>
                <li>
                    <a href="../views/contato.php">Contato</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="features-section">
            <h2>Gerenciador de Loja de Cogumelos</h2>
            <p>Aqui você pode gerenciar seus produtos, pedidos e clientes de maneira eficiente e fácil.</p>

            <br><br><h1>Recursos Principais</h1><br>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-store"></i>
                    <h3>Gestão de Produtos</h3>
                    <p>Adicione, edite e remova produtos facilmente, mantendo seu catálogo sempre atualizado.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-users"></i>
                    <h3>Gestão de Clientes</h3>
                    <p>Gerencie informações de clientes, histórico de compras e preferências para oferecer um serviço personalizado.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Pedidos Simplificados</h3>
                    <p>Receba e gerencie pedidos de forma eficiente, agilizando o processo de compra para seus clientes.</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer-bottom">
            <p>&copy; 2024 Cogulandia. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
