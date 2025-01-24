
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
    <title><?php echo $lang->get('ADD_NEW_TASK'); ?></title>
    <link rel="stylesheet" href="../../assets/estilo/estilo-nova-tarefa.css">
</head>
<body>
    <!-- Barra Lateral -->
    <div class="sidebar">
        <ul class="menu">
            <li><a href="../../index.php"><img src="../../assets/img/login.png" alt="Login"></a></li>
            <li><a href="../../crud/add/adicionar.php"><img src="../../assets/img/add.png" alt="Adicionar"></a></li>
            <li><a href="../../crud/feito/feito.php"><img src="../../assets/img/lista.png" alt="Tarefas"></a></li>
            <li><a href="../../notes/notes.php"><img src="../../assets/img/bloco-de-anotacoes.png" alt="Tarefas"></a></li>
        </ul>
    </div>
    
    <!-- Conteúdo Principal -->
    <div class="form-container">
        <h2><?php echo $lang->get('ADD_NEW_TASK'); ?></h2>
        <form action="recebeAdd.php" method="post">
            <input type="text" name="titulo" placeholder="<?php echo $lang->get('WRITE_YOUR_TITLE').'...'; ?>">
            <input type="text" name="corpo" placeholder="<?php echo $lang->get('WRITE_YOUR_TASK').'...'; ?>">
            <input type="submit" value="<?php echo $lang->get('ADD'); ?>">
        </form>
        <a href="../../index.php" class="back-link"><?php echo $lang->get('BACK_TO_LIST'); ?></a>
    </div>
</body>
</html>
