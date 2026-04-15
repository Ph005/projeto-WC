<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Seleção</title>
</head>
<body>
    <h1>Editar Seleção</h1>
    <form action="index.php?acao=atualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $selecao->id; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $selecao->nome; ?>" required><br><br>

        <label>Grupo:</label><br>
        <input type="text" name="grupo" value="<?php echo $selecao->grupo; ?>" maxlength="1" required><br><br>

        <label>Títulos:</label><br>
        <input type="number" name="titulos" value="<?php echo $selecao->titulos; ?>"><br><br>

        <button type="submit">Salvar Alterações</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>