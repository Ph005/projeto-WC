<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Painel Copa 2026</title>
</head>
<body>

<div class="navbar">
    <h1 style="margin:0; letter-spacing: -1px;">FIFA WORLD CUP 2026 🏆</h1>
    <p style="margin:5px 0 0; font-family: sans-serif; opacity: 0.8;">Painel Oficial de Gerenciamento</p>
</div>

<div class="container">
    
    <div class="filtro-search">
        <span>BUSCAR GRUPO:</span>
        <form action="index.php" method="GET" style="margin:0; display:flex; gap:10px;">
            <input type="hidden" name="acao" value="listar">
            <input type="text" name="filtro_grupo" placeholder="Ex: A, B, C...">
            <button type="submit" style="background:var(--copa-amarelo); border:none; padding:8px 15px; border-radius:20px; cursor:pointer; font-weight:bold;">BUSCAR</button>
            <a href="index.php" style="color:white; text-decoration:none; font-size:12px; align-self:center;">LIMPAR</a>
        </form>
    </div>

    <?php
    $grupos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $grupos[$row['grupo']][] = $row;
    }
    ksort($grupos);

    if (empty($grupos)) {
        echo "<p style='text-align:center; padding:50px;'>Nenhuma seleção encontrada.</p>";
    }

    foreach ($grupos as $nomeGrupo => $selecoes): 
    ?>
        <h3 style="background: var(--copa-azul); color: white; padding: 12px; border-radius: 5px; margin-top: 40px; border-left: 10px solid var(--copa-amarelo); font-family: 'Arial Black', sans-serif;">
            GRUPO <?php echo strtoupper($nomeGrupo); ?>
        </h3>
        
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #f8f9fa;">
                    <th style="width: 10%; padding: 15px; border-bottom: 2px solid #dee2e6;">Bandeira</th>
                    <th style="width: 45%; padding: 15px; border-bottom: 2px solid #dee2e6; text-align: left;">Seleção</th>
                    <th style="width: 25%; padding: 15px; border-bottom: 2px solid #dee2e6; text-align: center;">Títulos</th>
                    <th style="width: 20%; padding: 15px; border-bottom: 2px solid #dee2e6; text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selecoes as $s): ?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="text-align: center; padding: 10px;">
                        <?php if (!empty($s['bandeira'])): ?>
                            <img src="uploads/<?php echo $s['bandeira']; ?>" alt="Bandeira" style="width: 40px; height: 26px; object-fit: cover; border-radius: 3px; border: 1px solid #ddd;">
                        <?php else: ?>
                            <span style="font-size: 20px;">🏳️</span>
                        <?php endif; ?>
                    </td>
                    
                    <td style="padding: 10px; font-size: 16px;">
                        <strong style="color: var(--copa-azul);"><?php echo strtoupper($s['nome']); ?></strong>
                    </td>
                    
                    <td style="padding: 10px; text-align: center; font-family: sans-serif;">
                        <span style="display: inline-block; width: 60px; text-align: left;">
                            🏆 <?php echo $s['titulos']; ?>
                        </span>
                    </td>
                    
                    <td style="padding: 10px; text-align: right;">
                        <a href="index.php?acao=editar&id=<?php echo $s['id']; ?>" title="Editar" style="text-decoration:none; font-size: 18px; margin-right: 15px;">⚙️</a>
                        <a href="index.php?acao=excluir&id=<?php echo $s['id']; ?>" title="Excluir" style="text-decoration:none; font-size: 18px;" onclick="return confirm('Deseja realmente excluir a seleção de <?php echo $s['nome']; ?>?')">🗑️</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 50px;">
        <a href="index.php?acao=criar" class="btn-novo" style="box-shadow: 0 4px 15px rgba(0,100,55,0.3);">➕ CADASTRAR NOVA SELEÇÃO</a>
    </div>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; 2026 - FIFA World Cup Management System</p>
        <p style="opacity: 0.7; font-size: 12px;">Organização por Grupos Ativada | Rumo ao Hexa 🇧🇷</p>
    </div>
</footer>

</body>
</html>