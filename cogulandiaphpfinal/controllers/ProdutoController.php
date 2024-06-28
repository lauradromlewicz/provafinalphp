<?php

session_start();
include_once __DIR__ . '/../models/produto.php';
require_once __DIR__ . '/../config/conexao.php';

class ProdutoController {
    public function criar($nome, $descricao, $preco) {
        $errors = [];

        if (empty($nome)) {
            $errors[] = "O nome é obrigatório.";
        }
        if (empty($descricao)) {
            $errors[] = "A descrição é obrigatória.";
        }
        if (empty($preco)) {
            $errors[] = "O preço é obrigatório.";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['post_data'] = $_POST;
            header('Location: ../views/produtos/create.php');
            exit();
        }

        Produto::criar($nome, $descricao, $preco);
        header('Location: ../views/produtos/read.php');
    }

    public function listar() {
        return Produto::listar();
    }

    public function atualizar($id, $nome, $descricao, $preco) {

        Produto::atualizar($id, $nome, $descricao, $preco);
        header('Location: ../views/produtos/read.php');
    }

    public function deletar($id) {
        Produto::deletar($id);
        header('Location: ../views/produtos/read.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new ProdutoController();
    $acao = $_POST['acao'];
    
    switch ($acao) {
        case 'criar':
            $controller->criar($_POST['nome'], $_POST['descricao'], $_POST['preco']);
            break;
        case 'atualizar':
            $controller->atualizar($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['preco']);
            break;
        case 'deletar':
            $controller->deletar($_POST['id']);
            break;
    }
}
?>
