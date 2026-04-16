<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Editar Seleção</title>
</head>
<body>
    <div class="navbar"><h1>FIFA WORLD CUP 2026 🏆</h1></div>
    <div class="container">
        <h2>Editar Seleção: <?php echo $selecao->nome; ?></h2>
        
        <form action="index.php?acao=atualizar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $selecao->id; ?>">
            <input type="hidden" name="bandeira_atual" value="<?php echo $selecao->bandeira; ?>">

            <p>Nome: <br> <input type="text" name="nome" value="<?php echo $selecao->nome; ?>" required></p>
            <p>Grupo: <br> <input type="text" name="grupo" value="<?php echo $selecao->grupo; ?>" maxlength="1" required></p>
            <p>Títulos: <br> <input type="number" name="titulos" value="<?php echo $selecao->titulos; ?>"></p>
            
            <p>Bandeira Atual: <br>
                <?php if($selecao->bandeira): ?>
                    <img src="uploads/<?php echo $selecao->bandeira; ?>" width="100"><br>
                <?php endif; ?>
                Nova Bandeira (deixe vazio para manter a atual): <br>
                <input type="file" name="bandeira" accept="image/*">
            </p>

            <button type="submit" class="btn-novo">SALVAR ALTERAÇÕES</button>
            <a href="index.php" style="margin-left:20px; color:#666;">Voltar</a>
        </form>
    </div>
</body>
</html>