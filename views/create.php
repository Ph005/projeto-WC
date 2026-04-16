<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Novo Cadastro - Copa 2026</title>
</head>
<body>
    <div class="navbar"><h1>FIFA WORLD CUP 2026 🏆</h1></div>
    <div class="container">
        <h2>Cadastrar Seleção</h2>
        <form action="index.php?acao=salvar" method="POST" enctype="multipart/form-data">
            <p>Nome da Seleção: <br> <input type="text" name="nome" required></p>
            <p>Grupo: <br> <input type="text" name="grupo" maxlength="1" required></p>
            <p>Títulos: <br> <input type="number" name="titulos" value="0"></p>
            <p>Bandeira Oficial: <br> <input type="file" name="bandeira" accept="image/*"></p>
            
            <button type="submit" class="btn-novo">CADASTRAR SELEÇÃO</button>
            <a href="index.php" style="margin-left:20px; color:#666;">Cancelar</a>
        </form>
    </div>
</body>
</html>