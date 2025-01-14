<?php
require("./config/config.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $status=$_GET['status_tarefa'];

    $sql="UPDATE status_tarefa SET status_tarefa=:status_tarefa WHERE id_tarefa=id_tarefa";



    if($status>0){
    echo "Tarefa feita";
    }else{
    echo "Tarefa não completa";
    }

}


?>