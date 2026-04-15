<?php

class Database {
    private $host = "localhost";
    private $db_name = "copa_mundo";
    private $username = "root";
    private $password = "alunolab";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Criando a conexão com PDO [cite: 52, 72]
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->conn->exec("set names utf8");
            
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>