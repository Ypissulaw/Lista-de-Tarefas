<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nova Tarefa</title>
    <link rel="stylesheet" href="../../assets/estilo/estilo-nova-tarefa.css">
</head>
<body>
    <!-- Barra Lateral -->
    <div class="sidebar">
        <ul class="menu">
            <li><a href="../../index.php"><img src="../../assets/img/login.png" alt="Login"></a></li>
            <li><a href="../../crud/add/adicionar.php"><img src="../../assets/img/add.png" alt="Adicionar"></a></li>
            <li><a href="../../crud/feito/feito.php"><img src="../../assets/img/lista.png" alt="Tarefas"></a></li>
            <li><a href="../../notes/notes.php"><img src="../../assets/img/bloco-de-anotacoes.png" alt="Tarefas"></a></li>
        </ul>
    </div>
    
    <!-- Conteúdo Principal -->
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
