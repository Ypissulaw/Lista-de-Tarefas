<?php
require("../../config/config.php");

if (isset($_GET['id'])) {//isset: variavel recebeu um valor e não é null? entt true
    $id = $_GET['id']; //id==id que envie 

    // Preparar e executar a query de deleção
    $sql = "DELETE FROM tarefas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); //bP pq ja definimos id e pode mudar

    if ($stmt->execute()) {
        header("Location:  ../../index.php"); //se der td certo, mando de volta para a tela1
    exit();
    } else {
        echo "Erro ao deletar a mensagem.";
    }
} else {
    echo "ID não fornecido.";
}
?>