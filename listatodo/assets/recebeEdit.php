<?php
require("../config/config.php");
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $titulo=$_POST['titulo'];
    $corpo=$_POST['corpo'];

    $sql="UPDATE teste SET titulo=:titulo, corpo=:corpo WHERE id=:id";
    $sql=$pdo->prepare($sql);
    $sql->bindParam(":id",$id);
    $sql->bindParam(":titulo",$titulo);
    $sql->bindParam( ":corpo",$corpo);
    $sql->execute();
    header("Location: feito.php");
    exit();
    
}

?>
