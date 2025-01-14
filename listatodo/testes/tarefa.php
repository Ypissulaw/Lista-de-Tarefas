<?php
require("./config/config.php");

class Tarefa {
    public $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTarefas() {
        $sql = "SELECT * FROM tarefas";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        foreach ($sql->fetchAll() as $tarefa) {
            echo "Titulo: " . $tarefa["titulo"] . " - " . $tarefa["corpo"] . ".<br>";
        }
    }
}
//pegando tarefas la do banco
$task=new Tarefa($pdo);
$mostrar=$task->getTarefas();
echo $mostrar;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="adicionar.php" >Adicionar tarefa+</a>
</body>
</html>
