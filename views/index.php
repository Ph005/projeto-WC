<?php
require_once 'controllers/controller.php';

$controller = new SelecaoController();

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'listar';

switch($acao) {
    case 'listar':
        $controller->listar();
        break;
    case 'novo':
        include 'views/create.php';
        break;
    default:
        $controller->listar();
        break;
}