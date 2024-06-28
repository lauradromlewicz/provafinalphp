<?php
require_once __DIR__ . '/../config/conexao.php';

class Produto {
    private $id;
    private $nome;
    private $descricao;
    private $preco;

    public function __construct($nome, $descricao, $preco) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public static function criar($nome, $descricao, $preco) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }
    

    public static function listar() {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT * FROM produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($id, $nome, $descricao, $preco) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function deletar($id) {
        $conexao = Conexao::conectar();
        
        try {
            $stmt = $conexao->prepare("DELETE FROM pedidos WHERE produto_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            $stmt = $conexao->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            return true;
        } catch (Exception $e) {
            $conexao->rollBack();
            throw $e;
        }
    }

    public static function produtoExiste($id) {
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare("SELECT COUNT(*) FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
?>
