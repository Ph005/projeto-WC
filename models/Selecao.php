<?php
class Selecao {
    private $conn;
    private $table_name = "selecoes";

    public $id;
    public $nome;
    public $grupo;
    public $titulos;
    public $bandeira;

    public function __construct($db) {
        $this->conn = $db;
    }

        public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

        public function readOne() {
        $query = "SELECT id, nome, grupo, titulos, bandeira FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nome = $row['nome'];
            $this->grupo = $row['grupo'];
            $this->titulos = $row['titulos'];
            $this->bandeira = $row['bandeira'];
            return true;
        }
        return false;
    }

        public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, grupo=:grupo, titulos=:titulos, bandeira=:bandeira";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":bandeira", $this->bandeira);
        return $stmt->execute();
    }

        public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome=:nome, grupo=:grupo, titulos=:titulos, bandeira=:bandeira 
                  WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":bandeira", $this->bandeira);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

        public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>