<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Tarefa</title>
    <link rel="stylesheet" href="../../assets/estilo/style3.css">
</head>
<body>
    <div class="form-container">
        <h2>Adicionar Nova Tarefa</h2>
        <form action="recebeAdd.php" method="post">
            <input type="text" name="titulo" placeholder="Escreva seu título...">
            <input type="text" name="corpo" placeholder="Escreva sua tarefa...">
            <input type="submit" value="Adicionar">
        </form>
        <a href="../../index.php" class="back-link">Voltar para a Lista</a>
    </div>
</body>
</html>
