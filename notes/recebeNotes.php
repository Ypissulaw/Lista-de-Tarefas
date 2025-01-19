<?php
require("../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nota'])) {
        $nota = $_POST['nota'];
        $titulo = $_POST['titulo'];

        $sql = "UPDATE notas SET titulo=:titulo, nota=:nota ";
        $sql = $pdo->prepare($sql);
        $sql->bindParam('titulo', $titulo);
        $sql->bindParam('nota', $nota);
        $sql->execute();

        // Após a alteração, mostre:
        $sql = "SELECT * FROM notas ";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $notas = $sql->fetchAll();
        foreach ($notas as $n) {
            echo "<div class='note-container'>";
            echo "<h2 class='note-title'>Nota salva:</h2>";
            echo "<div class='note'>";
            echo "<h3 class='note-heading'>" . htmlspecialchars($n['titulo']) . "</h3>";
            echo "<p class='note-body'>" . nl2br(htmlspecialchars($n['nota'])) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Salvas</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }

        .note-container {
            background-color: #1e1e1e;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .note-title {
            font-size: 24px;
            color: #ffa41b;
            margin-bottom: 15px;
        }

        .note {
            padding: 15px;
            background-color: #2c2c2c;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .note-heading {
            font-size: 18px;
            color: #f39c12;
            margin-bottom: 10px;
        }

        .note-body {
            font-size: 16px;
            line-height: 1.5;
        }

        .back-button {
            text-decoration: none;
            color: #f39c12;
            border: 2px solid #f39c12;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-button:hover {
            background-color: #f39c12;
            color: #000;
        }
    </style>
</head>
<body>
    <a href="../index.php" class="back-button">Voltar</a>
</body>
</html>
