<?php
require_once __DIR__ . '/../config/conexao.php';

class Usuario {
    public static function autenticar($email, $senha) {
        $conn = Conexao::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public static function getUserById($id) {
        $conn = Conexao::conectar();
        $stmt = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function criar($username, $email, $senha) {
        $conn = Conexao::conectar();
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('INSERT INTO usuarios (username, email, senha) VALUES (:username, :email, :senha)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);
        $stmt->execute();
        return $conn->lastInsertId();
    }

    public static function updateUser($id, $username, $email, $senha) {
        $conn = Conexao::conectar();
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE usuarios SET username = :username, email = :email, senha = :senha WHERE id = :id');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashedPassword);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function deleteUser($id) {
        $conn = Conexao::conectar();
        $stmt = $conn->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
