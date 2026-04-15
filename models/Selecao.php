<?php
class Selecao {
    private $conn;
    private $table_name = "selecoes";

    public $id;
    public $nome;
    public $grupo;
    public $titulos;
    public $criado_em;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT id, nome, grupo, titulos FROM " . $this->table_name . " ORDER BY nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // --- ADICIONE ESTA FUNÇÃO AQUI ABAIXO ---
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nome, grupo, titulos) VALUES (:nome, :grupo, :titulos)";
        
        $stmt = $this->conn->prepare($query);

        // Limpeza de dados (segurança)
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->grupo = htmlspecialchars(strip_tags($this->grupo));
        $this->titulos = htmlspecialchars(strip_tags($this->titulos));

        // Vincula os valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readOne() {
        // Busca apenas uma linha pelo ID
        $query = "SELECT id, nome, grupo, titulos FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        // Liga o ID que vamos passar
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se achou, preenche os atributos do objeto
        if($row) {
            $this->nome = $row['nome'];
            $this->grupo = $row['grupo'];
            $this->titulos = $row['titulos'];
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                SET nome = :nome, grupo = :grupo, titulos = :titulos 
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);

        // Vincula os novos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }   
        return false;
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}