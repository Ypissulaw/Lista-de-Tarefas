<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="./assets/estilo/style.css">
</head>
<body>
    <div class="sidebar">
        <ul class="menu">
            <li><a href=""><img src="./img/login.png" alt="Login"></a></li>
            <li><a href="./crud/add/adicionar.php"><img src="img/add.png" alt="Adicionar"></a></li>
            <li><a href="./crud/feito/feito.php"><img src="img/lista.png" alt="Tarefas"></a></li>
            <li><a href="./notes/notes.php"><img src="img/bloco-de-anotacoes.png" alt="Tarefas"></a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Minhas Tarefas do Dia</h1>
        
        <?php
        require("./config/config.php");

        class Tarefa {
            public $pdo;

            public function __construct($pdo) {
                $this->pdo = $pdo;
            }

            //para mostrar o que temos no banco
            public function getTarefas() {
                $sql = "SELECT * FROM tarefas";
                $sql = $this->pdo->prepare($sql);
                $sql->execute();
                return $sql->fetchAll();
            }
        }

        // Pegando tarefas do banco
        $task = new Tarefa($pdo);
        $tarefas = $task->getTarefas(); //variavel é = a tds as informações que a função pega

        foreach ($tarefas as $tarefa) { //São varias informações, logo vira um array
            echo "<div class='task'>";
            echo "<h3>" . htmlspecialchars($tarefa["titulo"]) . "</h3>";//retorne os titulos
            echo "<p>" . htmlspecialchars($tarefa["corpo"]) . "</p>";//retorne o corpo
            echo "<div class='task-controls'>";
            echo "<a href='./crud/feito/recebeFeito.php?id=" . htmlspecialchars($tarefa["id"]) . "&status_tarefa=1'><img src='img/aceitar.png' alt='Feito' title='Marcar como feito'></a>";
            echo "<a href='./crud/edit/editar.php?id=" . htmlspecialchars($tarefa["id"]) . "'><img src='img/editar.png' alt='Editar' title='Editar tarefa'></a>";
            echo "<a href='./crud/deletar/delete.php?id=" . htmlspecialchars($tarefa["id"]) . "'><img src='img/del.png' alt='Deletar' title='Deletar tarefa'></a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        <a href="./crud/add/adicionar.php" class="add-task-btn">Nova Tarefa</a>
    </div>
</body>
</html> 