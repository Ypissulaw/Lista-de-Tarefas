<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/estilo/estilo-notes.css">
    <title>Anotações</title>
</head>
<body>
    <div class="sidebar">
        <ul class="menu">
            <li><a href="../index.php"><img src="../assets/img/login.png" alt="Login"></a></li>
            <li><a href="../crud/add/adicionar.php"><img src="../assets/img/add.png" alt="Adicionar"></a></li>
            <li><a href="../crud/feito/feito.php"><img src="../assets/img/lista.png" alt="Tarefas"></a></li>
            <li><a href="../notes/notes.php"><img src="../assets/img/bloco-de-anotacoes.png" alt="Tarefas"></a></li>
        </ul>
    </div>

    <div class="container">
        <h2>NOTAS</h2>
        <form method="POST" action="recebeNotes.php">
            <input type="text" name="titulo" class="title-field" placeholder="Escreva o título aqui...">
            <textarea name="nota" class="note-field" placeholder="Escreva sua anotação aqui..."></textarea>
            <div class="footer">
                <a href="../index.php" class="btn-back">Voltar</a>
                <div class="actions">
                    <button type="submit" class="btn-save">Salvar</button>
                    <button type="button" onclick="downloadNote()" class="btn-download">Baixar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function downloadNote() {
            const title = document.querySelector('.title-field').value;
            const note = document.querySelector('.note-field').value;
            const content = `Título: ${title}\n\nNota:\n${note}`;
            const blob = new Blob([content], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `${title || 'nota'}.txt`;
            link.click();
        }
    </script>
</body>
</html>
