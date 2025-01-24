<?php
require("../config/config.php");
session_start();
if(!empty($_GET['lang'])){//lang passada pela URL
    $_SESSION['lang']=$_GET['lang'];//true: linguagem da sessao = lingua escolhida pelo user
}
require('../pastaLang/language.class.php');//puxo o arquivo da linaguagem
$lang=new Language();//crio ele

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nota'])) {
        $nota = $_POST['nota'];
        $titulo = $_POST['titulo'];
        $sql = "INSERT INTO notas SET titulo=:titulo, nota=:nota";
        $sql = $pdo->prepare($sql);
        $sql->bindParam('titulo', $titulo);
        $sql->bindParam('nota', $nota);
        $sql->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/estilo/estilo-notes.css">
    <title><?php echo $lang->get('NOTES'); ?></title>
</head>
<body>
    <div class="sidebar">
        <ul class="menu">
            <li><a href="../index.php"><img src="../assets/img/login.png" alt="Login"></a></li>
            <li><a href="../crud/add/adicionar.php"><img src="../assets/img/add.png" alt="Adicionar"></a></li>
            <li><a href="../crud/feito/feito.php"><img src="../assets/img/lista.png" alt="Tarefas"></a></li>
            <li><a href="../notes/notes.php"><img src="../assets/img/bloco-de-anotacoes.png" alt="Notas"></a></li>
        </ul>
    </div>

    <div class="container">
        <h2><?php echo $lang->get('NOTES'); ?></h2>
        <form method="POST">
            <input t    ype="text" name="titulo" class="title-field" placeholder="<?php echo $lang->get('WRITE_YOUR_TITLE').'...'; ?>">
            <textarea name="nota" class="note-field" placeholder="<?php echo $lang->get('WRITE_YOUR_NOTE').'...'; ?>"></textarea>
            <div class="footer">
                <a href="../index.php" class="btn-back"><?php echo $lang->get('BACK'); ?></a>
                <div class="actions">
                    <a href="recebeNotes.php" class="btn-back"><?php echo $lang->get('NOTES');?></a>
                    <button type="submit" class="btn-save"><?php echo $lang->get('SAVE'); ?></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
