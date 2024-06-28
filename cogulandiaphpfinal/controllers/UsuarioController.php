<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/conexao.php';

class UsuarioController {
    public function autenticar($email, $senha) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $senha = htmlspecialchars($senha);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../views/auth/login.php?erro=1');
            exit();
        }

        $usuario = Usuario::autenticar($email, $senha);
        if ($usuario) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user'] = $usuario;

            if (isset($_POST['lembrar'])) {
                setcookie('email', $email, time() + (6400 * 10), "/");
                setcookie('senha', $senha, time() + (6400 * 10), "/");
            } else {
                setcookie('email', '', time() -3600, "/");
                setcookie('senha', '', time() -3600, "/");
            }

            header('Location: ../views/dashboard.php');
            exit();
        } else {
            header('Location: ../views/auth/login.php?erro=1');
            exit();
        }
    }

    public function registrar($username, $email, $senha) {
        $errors = [];

        if (empty($username)) {
            $errors[] = "O usuário é obrigatório.";
        }
        if (empty($email)) {
            $errors[] = "O email é obrigatório.";
        }
        if (empty($senha)) {
            $errors[] = "O senha é obrigatória.";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['post_data'] = $_POST;
            header('Location: ../views/auth/registro.php');
            exit();
        }

        $username = htmlspecialchars($username);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $senha = htmlspecialchars($senha);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../views/auth/registro.php?erro=1');
            exit();
        }

        $usuario_id = Usuario::criar($username, $email, $senha);

        $usuario = Usuario::getUserById($usuario_id);
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user'] = $usuario;

        header('Location: ../views/dashboard.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuarioController();
    $acao = $_POST['acao'];
    
    if ($acao == 'autenticar') {
        $controller->autenticar($_POST['email'], $_POST['senha']);
    } else if ($acao == 'criar') {
        $controller->registrar($_POST['username'], $_POST['email'], $_POST['senha']);
    }
}
?>
