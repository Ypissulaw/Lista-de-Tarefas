<?php
session_start();
if(!empty($_GET['lang'])){//existe? entao a 
    $_SESSION['lang']=$_GET['lang'];//true: linguagem da sessao = lingua escolhida pelo user
}
require('../../pastaLang/language.class.php');//puxo o arquivo da linaguagem
$lang=new Language();//crio ele
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang->get('TASKS_COMPLETED'); ?></title>
    <link rel="stylesheet" href="../../assets/estilo/estilo-feito.css">
</head>
<body>
    <!-- Barra lateral -->
    <div class="sidebar">
        <ul class="menu">
            <li><a href="../../index.php"><img src="../../assets/img/login.png" alt="Login"></a></li>
            <li><a href="../../crud/add/adicionar.php"><img src="../../assets/img/add.png" alt="Adicionar"></a></li>
            <li><a href="../../crud/feito/feito.php"><img src="../../assets/img/lista.png" alt="Tarefas"></a></li>
            <li><a href="../../notes/notes.php"><img src="../../assets/img/bloco-de-anotacoes.png" alt="Notas"></a></li>
        </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="container">
        <h1><?php echo $lang->get('DONE'); ?></h1>

        <?php
        require("../../config/config.php");

        $sql = "SELECT * FROM tarefas_feitas";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $informacoes = $sql->fetchAll(); // Defini a variável pois vou usar foreach

        foreach ($informacoes as $informacao) {
            echo "<div class='task'>";
            echo "<h3><strike>" . htmlspecialchars($informacao['titulo']) . "</strike></h3>";
            echo "<p><strike>" . htmlspecialchars($informacao['corpo']) . "</strike></p>";
            echo "</div>";
        }
        ?>
        <a href="../../index.php" class="back-link"><?php echo $lang->get('BACK_TO_LIST'); ?></a>
    </div>
</body>
</html>
