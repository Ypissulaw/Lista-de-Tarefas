<?php
//conectando ao banco de dados.
try{
    $pdo=new PDO("mysql:dbname=listatodo;host=localhost","root","");
}catch(PDOException $erro){
    echo "Problema ao se conectar com o banco :c".$erro->getMessage();
}
?>