<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Feitas</title>
    <link rel="stylesheet" href="../../assets/estilo/style3.css">
</head>
<body>
    <h1>🫡 Tarefas Completas</h1>
    <?php
    require("../../config/config.php");

    $sql = "SELECT * FROM tarefas_feitas";
    $sql = $pdo->prepare($sql);
    $sql->execute();

    $informacoes = $sql->fetchAll();//defini a variavel pois vou usar foreach


    foreach ($informacoes as $informacao) {
        echo "<div class='task'>";
        echo "<h3><strike>" . htmlspecialchars($informacao['titulo']) . "</strike></h3>";
        echo "<p><strike>" . htmlspecialchars($informacao['corpo']) . "</strike></p>";
        echo "</div>";
    }
    ?>
    <a href="../../index.php" class="back-link">Voltar para a Lista</a>
</body>
</html>

