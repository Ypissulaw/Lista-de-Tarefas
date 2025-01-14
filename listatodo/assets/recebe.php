<?php
require("../config/config.php");
if(!empty($_POST['titulo'])){
    $titulo=$_POST['titulo'];
    $corpo=$_POST['corpo'];
}

$sql = "INSERT INTO tarefas (titulo,corpo) VALUES (:titulo,:corpo)";
$sql = $pdo->prepare($sql);
$sql->bindParam(":titulo",$titulo);
$sql->bindParam(":corpo",$corpo);
$sql->execute();

header("Location: ../teste.php");
exit();


?>