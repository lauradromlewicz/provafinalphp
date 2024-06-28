<?php
class Conexao {
    public static function conectar() {
        $host = 'localhost';
        $db = 'cogulandia';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
            exit;
        }
    }
}
?>
