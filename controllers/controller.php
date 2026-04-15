<?php
require_once 'config/database.php';
require_once 'models/Selecao.php';

class SelecaoController {
    public function listar() {
        $database = new Database();
        $db = $database->getConnection();
        $selecao = new Selecao($db);

        $stmt = $selecao->read();
        
        // O index.php agora está na raiz, então o caminho para a view é direto [cite: 88]
        include 'views/lista.php'; 
    }

    public function salvar() {
        $database = new Database();
        $db = $database->getConnection();
        $selecao = new Selecao($db);

        // Pega os dados que o usuário digitou no formulário
        $selecao->nome = $_POST['nome'];
        $selecao->grupo = $_POST['grupo'];
        $selecao->titulos = $_POST['titulos'];

        // Chama o "create" que acabamos de colocar no Model
        if($selecao->create()) {
            header("Location: index.php"); // Se salvou, volta pra lista
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    public function editar($id) {
        $database = new Database();
        $db = $database->getConnection();
        $selecao = new Selecao($db);

        $selecao->id = $id;
        
        // Se o Model achar a seleção no banco...
        if($selecao->readOne()) {
            // ...ele abre a página de editar (que vamos criar)
            include 'views/edit.php';   
        }
    }

    public function atualizar() {
        $database = new Database();
        $db = $database->getConnection();
        $selecao = new Selecao($db);

        $selecao->id = $_POST['id'];
        $selecao->nome = $_POST['nome'];
        $selecao->grupo = $_POST['grupo'];
        $selecao->titulos = $_POST['titulos'];

        if($selecao->update()) {
            header("Location: index.php");
        }
    }  
   public function excluir($id) {
        // ESTA LINHA É SÓ PARA TESTE:
        // die("O controlador recebeu a ordem de excluir o ID: " . $id);

        $database = new Database();
        $db = $database->getConnection();
        $selecao = new Selecao($db);

        if ($selecao->delete($id)) {
        header("Location: index.php");
        exit(); // Adicione o exit() após o header
        }
    }  
}

