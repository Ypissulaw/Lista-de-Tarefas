<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontuação</title>
</head>
<body>
    <p>Aperte aqui para mudar o ponto</p>
    <?php
    require('config.php');

    $sql = 'SELECT * FROM pontuacao';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $pontos = $stmt->fetchAll();

    foreach ($pontos as $p) {
        echo "<a href='recebeTela1.php?id=" . htmlspecialchars($p['id']) . "&ponto=1'>Mudar ponto " . htmlspecialchars($p['id']) . "</a><br>";
    }
    ?>
</body>
</html>
