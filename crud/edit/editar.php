<?php
require("../../config/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica se foi enviado
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $corpo = $_POST['corpo'];

        $sql = "UPDATE tarefas SET titulo=:titulo, corpo=:corpo WHERE id=:id";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(":id", $id);
        $sql->bindParam(":titulo", $titulo);
        $sql->bindParam(":corpo", $corpo);
        $sql->execute();
        header("Location:  ../../index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            color: #f39c12;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container input[type="text"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container input[type="text"] {
            background-color: #333;
            color: #ffffff;
        }

        .form-container input[type="text"]::placeholder {
            color: #aaa;
        }

        .form-container input[type="text"]:focus {
            outline: none;
            background-color: #444;
        }

        .form-container input[type="submit"] {
            background-color: #f39c12;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #ffa41b;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #f39c12;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #ffa41b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Tarefa</h2>
        <form method="post">
            <input type="text" name="titulo" placeholder="Novo título">
            <input type="text" name="corpo" placeholder="Novo corpo">
            <input type="submit" value="Salvar Alterações">
        </form>
        <a href="../../index.php" class="back-link">Voltar para a Lista</a>
    </div>
</body>
</html>
