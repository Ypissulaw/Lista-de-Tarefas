<?php
session_start();
if(!empty($_GET['lang'])){//lang passada pela URL
    $_SESSION['lang']=$_GET['lang'];//true: linguagem da sessao = lingua escolhida pelo user
}
require('../pastaLang/language.class.php');//puxo o arquivo da linaguagem
$lang=new Language();//crio ele

require("../config/config.php");
$sql = "SELECT * FROM notas ";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $notas = $sql->fetchAll();
        echo "<h2 class='note-title'>".$lang->get('NOTES')."</h2>";
        foreach ($notas as $n) {
            echo "<div class='note-container'>";
            echo "<h3 class='note-heading'>" . htmlspecialchars($n['titulo']) . "</h3>";
            echo "<p class='note-body'>" . nl2br(htmlspecialchars($n['nota'])) . "</p>";
            echo "</div>";
            echo "</div>";
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang->get('NOTES');?></title>
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
    <a href="notes.php" class="back-button"><?php echo $lang->get('BACK');?></a>
</body>
</html>
