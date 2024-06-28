<?php
require_once __DIR__ . '/../config/conexao.php';

class Pedido {
    private $id;
    private $cliente_id;
    private $produto_id;
    private $quantidade;
    private $data_pedido;

    public function __construct($cliente_id, $produto_id, $quantidade) {
        $this->cliente_id = $cliente_id;
        $this->produto_id = $produto_id;
        $this->quantidade = $quantidade;
    }

    public static function criar($cliente_id, $produto_id, $quantidade) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("INSERT INTO pedidos (cliente_id, produto_id, quantidade) VALUES (:cliente_id, :produto_id, :quantidade)");
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        return $stmt->execute();
    }

    public static function listar() {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT * FROM pedidos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($id, $cliente_id, $produto_id, $quantidade) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("UPDATE pedidos SET cliente_id = :cliente_id, produto_id = :produto_id, quantidade = :quantidade WHERE id = :id");
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function deletar($id) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("DELETE FROM pedidos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
