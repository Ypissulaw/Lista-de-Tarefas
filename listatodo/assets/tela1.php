<?php
require("../config/config.php");


$sql="SELECT * FROM teste";
$sql=$pdo->prepare($sql);
$sql->execute();

$info=$sql->fetchAll();

foreach($info as $i){
    echo "<br>Titulo: ".$i['titulo'];
    echo "<br>Corpo: ".$i['corpo'];
}
?>
<br>
<a href="recebeTela1.php">Editar</a>

<?php
if(!empty($_POST['titulo'])){
    $titulo=$_POST['titulo'];
    $corpo=$_POST['corpo'];
    $sql="UPDATE teste SET titulo=:titulo, corpo=:corpo";
    $sql=$pdo->prepare($sql);
    $sql->bindParam(":titulo",$titulo);
    $sql->bindParam( ":corpo",$corpo);
    $sql->execute();

    $infoEdit=$sql->fetchAll();

    foreach($infoEdit as $e){
    echo "<br>Titulo: ".$e['titulo'];
    echo "<br>Corpo: ".$e['corpo'];
    }


}


?>