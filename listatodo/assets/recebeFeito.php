<?php
require("../config/config.php");

if (isset($_GET['id']) && isset($_GET['status_tarefa'])) {//aq é onde nos deletamos a tarefa e marcamos co
    $id = $_GET['id'];
    $status_tarefa = $_GET['status_tarefa'];

    // Deletar e mover tarefa
    if ($status_tarefa == 1) {
        $sql = "INSERT INTO tarefas_feitas (id, titulo, corpo, status_tarefa) 
                SELECT id, titulo, corpo, 1 FROM tarefas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $sql = "DELETE FROM tarefas WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: feito.php");
                exit();
            } else {
                echo 'Erro ao deletar a tarefa da tabela original.';
            }
        } else {
            echo 'Erro ao inserir a tarefa na nova tabela.';
        }
    } else {
        $sql = "UPDATE tarefas_feitas SET status_tarefa = :status_tarefa WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':status_tarefa', $status_tarefa, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo 'Tarefa atualizada com sucesso!';
        } else {
            echo 'Erro ao atualizar a tarefa.';
        }
    }
} else {
    echo 'ID ou status_tarefa não fornecido.';
}
