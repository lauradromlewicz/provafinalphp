<?php
require_once __DIR__ . '/../config/conexao.php';

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public static function criar($nome, $email, $senha) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("INSERT INTO clientes (nome, email, senha) VALUES (:nome, :email, :senha)");

        $senhaCripta = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaCripta);
        return $stmt->execute();
    }
    
    public static function listar() {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT * FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($id, $nome, $email, $senha) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("UPDATE clientes SET nome = :nome, email = :email, senha = :senha WHERE id = :id");

        $senhaCripta = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaCripta);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function deletar($id) {
        $conexao = Conexao::conectar();

        try {
            $stmt = $conexao->prepare("DELETE FROM pedidos WHERE cliente_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            $stmt = $conexao->prepare("DELETE FROM clientes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
    
        } catch (Exception $e) {
            $conexao->rollBack();
            throw $e;
        }
    }

    public static function autenticar($email, $senha) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT * FROM clientes WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($cliente && password_verify($senha, $cliente['senha'])) {
            return $cliente;
        }
        return false;
    }
    public static function clienteExiste($id) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT COUNT(*) FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
