<?php
session_start();
include_once __DIR__ . '/../models/pedido.php';
include_once __DIR__ . '/../models/cliente.php';
include_once __DIR__ . '/../models/produto.php';
require_once __DIR__ . '/../config/conexao.php';

class PedidoController {


    private function mensagemIdNulos($message, $redirecionaUrl) {
        $_SESSION['errors'] = [$message];
        header('Location: ' . $redirecionaUrl);
        exit();
    }

    public function criar($cliente_id, $produto_id, $quantidade) {
        $errors = [];

        if (empty($cliente_id)) {
            $errors[] = "O cliente ID é obrigatório.";
        }
        if (empty($produto_id)) {
            $errors[] = "O produto ID é obrigatório.";
        }
        if (empty($quantidade)) {
            $errors[] = "A quantidade é obrigatória.";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['post_data'] = $_POST;
            header('Location: ../views/pedidos/create.php');
            exit();
        }

        $clienteExiste = Cliente::clienteExiste($cliente_id);
        $produtoExiste = Produto::produtoExiste($produto_id);

        if ($clienteExiste && $produtoExiste) {
            Pedido::criar($cliente_id, $produto_id, $quantidade);
            header('Location: ../views/pedidos/read.php');
        } else {
            $message = !$clienteExiste && !$produtoExiste ? 
                "O produto e o cliente com os IDs especificados não existem." : 
                (!$clienteExiste ? "O cliente com o ID especificado não existe." : "O produto com o ID especificado não existe.");
            $this->mensagemIdNulos($message, '../views/pedidos/create.php');
        }
    }

    public function listar() {
        return Pedido::listar();
    }

    public function atualizar($id, $cliente_id, $produto_id, $quantidade) {
        
        $errors = [];

        if (empty($cliente_id)) {
            $errors[] = "O cliente ID é obrigatório.";
        }
        if (empty($produto_id)) {
            $errors[] = "O produto ID é obrigatório.";
        }
        if (empty($quantidade)) {
            $errors[] = "A quantidade é obrigatória.";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['post_data'] = $_POST;
            header('Location: ../views/pedidos/create.php');
            exit();
        }
        
        $clienteExiste = Cliente::clienteExiste($cliente_id);
        $produtoExiste = Produto::produtoExiste($produto_id);

        if ($clienteExiste && $produtoExiste) {
            Pedido::atualizar($id, $cliente_id, $produto_id, $quantidade);
            header('Location: ../views/pedidos/read.php');
        } else {
            $message = !$clienteExiste && !$produtoExiste ? 
                "O produto e o cliente com os IDs especificados não existem." : 
                (!$clienteExiste ? "O cliente com o ID especificado não existe." : "O produto com o ID especificado não existe.");
            $this->mensagemIdNulos($message, '../views/pedidos/read.php');
        }
    }

    public function deletar($id) {
        Pedido::deletar($id);
        header('Location: ../views/pedidos/read.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new PedidoController();
    $acao = $_POST['acao'];
    
    switch ($acao) {
        case 'criar':
            if (isset($_POST['cliente_id'], $_POST['produto_id'], $_POST['quantidade'])) {
                $controller->criar($_POST['cliente_id'], $_POST['produto_id'], $_POST['quantidade']);
            } else {
                $_SESSION['errors'] = ["Todos os campos são obrigatórios."];
                header('Location: ../views/pedidos/create.php');
                exit();
            }
            break;
        case 'atualizar':
            $controller->atualizar($_POST['id'], $_POST['cliente_id'], $_POST['produto_id'], $_POST['quantidade']);
            break;
        case 'deletar':
            $controller->deletar($_POST['id']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['acao'])) {
    $controller = new PedidoController();
    $acao = $_GET['acao'];
    
    switch ($acao) {
        case 'deletar':
            $controller->deletar($_GET['id']);
            break;
    }
}
?>
