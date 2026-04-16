<?php
class SelecaoController {

    private function getModel() {
        $database = new Database();
        $db = $database->getConnection();
        return new Selecao($db);
    }

    public function listar() {
        $selecao = $this->getModel();
        $stmt = $selecao->read();
        include 'views/lista.php';
    }

    public function criar() {
        include 'views/create.php';
    }

    public function salvar() {
        $nomeArquivo = null;

                if (isset($_FILES['bandeira']) && $_FILES['bandeira']['error'] === 0) {
            $extensao = pathinfo($_FILES['bandeira']['name'], PATHINFO_EXTENSION);
            $nomeArquivo = md5(uniqid()) . "." . $extensao;
            
            if (!is_dir('uploads')) { mkdir('uploads', 0777, true); }
            move_uploaded_file($_FILES['bandeira']['tmp_name'], "uploads/" . $nomeArquivo);
        }

        $selecao = $this->getModel();
        $selecao->nome = $_POST['nome'];
        $selecao->grupo = $_POST['grupo'];
        $selecao->titulos = $_POST['titulos'];
        $selecao->bandeira = $nomeArquivo;

        if($selecao->create()) {
            header("Location: index.php");
        }
    }

    public function excluir() {
        $id = $_GET['id'];
        $selecao = $this->getModel();
        if($selecao->delete($id)) {
            header("Location: index.php");
        }
    }

            public function editar() {
        $id = $_GET['id'];
        $selecao = $this->getModel();
        $selecao->id = $id;
        
        if($selecao->readOne()) {
            include 'views/edit.php';
        } else {
            header("Location: index.php");
        }
    }

    public function atualizar() {
        $selecao = $this->getModel();
        $selecao->id = $_POST['id'];
        $selecao->nome = $_POST['nome'];
        $selecao->grupo = $_POST['grupo'];
        $selecao->titulos = $_POST['titulos'];
        
        if (isset($_FILES['bandeira']) && $_FILES['bandeira']['error'] === 0) {
            $extensao = pathinfo($_FILES['bandeira']['name'], PATHINFO_EXTENSION);
            $nomeArquivo = md5(uniqid()) . "." . $extensao;
            move_uploaded_file($_FILES['bandeira']['tmp_name'], "uploads/" . $nomeArquivo);
            $selecao->bandeira = $nomeArquivo;
        } else {
            $selecao->bandeira = $_POST['bandeira_atual'];
        }

        if($selecao->update()) {
            header("Location: index.php");
        }
    }
}