<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Seleção</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { padding: 8px; width: 300px; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Adicionar Nova Seleção</h1>
    <form action="index.php?acao=salvar" method="POST">
        <div class="form-group">
            <label for="nome">Nome da Seleção:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div class="form-group">
            <label for="grupo">Grupo (A-L):</label>
            <input type="text" name="grupo" id="grupo" maxlength="1" required>
        </div>
        <div class="form-group">
            <label for="titulos">Quantidade de Títulos:</label>
            <input type="number" name="titulos" id="titulos" min="0" value="0">
        </div>
        <button type="submit">Salvar Seleção</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>