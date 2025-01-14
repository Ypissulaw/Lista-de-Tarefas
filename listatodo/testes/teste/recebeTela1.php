<?php
require('config.php');
if(isset($_GET['id'])){
   $id=$_GET['id']; //salva id
   $ponto=$_GET['ponto']; //salva ponto

   //verificar para deletar:
    if($ponto==1){
        /**
         * Primeiro insere o que tiver em pontuação dentro da pontos feitos
         * Se conseguir. Deleta da tabela primeira 
         */
        $sql="INSERT INTO pontuacao_feita (id,ponto_movido) SELECT id, ponto FROM pontuacao WHERE id=:id";
        $sql=$pdo->prepare($sql);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);

        if($sql->execute()){
            $sql="DELETE FROM pontuacao WHERE id=:id";
            $sql=$pdo->prepare($sql);
            $sql->bindParam(':id', $id, PDO::PARAM_INT);

            if($sql->execute()){
                echo 'ok. Movido e deletado';
            }else{
                echo 'nem nem';
            }

        }else{
            echo 'ponto Não foi deletado.';
        }
            

    }else{
        echo "ponto não é 1";
        $sql="UPDATE pontuacao SET ponto=:ponto WHERE id=:id"; //mude para 1 quando apertar no link o id que passei
        $sql=$pdo->prepare($sql);
        $sql->bindParam(':ponto', $ponto, PDO::PARAM_INT);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);

            if($sql->execute()){
            echo 'Ok...'; //alterado :D
            }else{
            echo 'Ainda não funfando... :C';
            }   
    }
}else{
    echo "Nada feito... Nem entrou no primeiro IF";
}



?>