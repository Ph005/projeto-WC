<?php

require_once 'config/database.php';
require_once 'controllers/controller.php';
require_once 'models/Selecao.php';

$controller = new SelecaoController();

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

switch ($acao) {
    case 'listar':
        $controller->listar();
        break;

    case 'criar':
        include 'views/create.php'; 
        break;

    case 'editar':
        $controller->editar($_GET['id']);
        break;  

    case 'excluir':
        if(isset($_GET['id'])) {
            $controller->excluir($_GET['id']);
        }
    break;

    case 'salvar':
        $controller->salvar();
        break;
        
    case 'atualizar':
        $controller->atualizar();
        break;    
    default:
        $controller->listar();
        break;
}