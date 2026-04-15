<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Copa do Mundo - Seleções</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-add { display: inline-block; padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h1>🏆 Seleções da Copa do Mundo</h1>
    
    <a href="index.php?acao=novo" class="btn-add">+ Adicionar Nova Seleção</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Títulos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // O Controller disponibilizou a variável $stmt
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['grupo']; ?></td>
                    <td><?php echo $row['titulos']; ?></td>
                    <td>
                        <a href="index.php?acao=editar&id=<?php echo $row['id']; ?>">Editar</a> | 
                        <a href="index.php?acao=excluir&id=<?php echo $row['id']; ?>" onclick="return confirm('Certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>