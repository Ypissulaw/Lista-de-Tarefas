<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anotações</title>
    <link rel="stylesheet" href="../estilo/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 80px;
            background-color: #1e1e1e;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .menu {
            list-style: none;
            width: 100%;
            padding: 0;
        }

        .menu li {
            margin: 15px 0;
        }

        .menu li a {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu li a img {
            width: 30px;
            height: 30px;
            filter: brightness(0.8);
            transition: filter 0.3s;
        }

        .menu li a img:hover {
            filter: brightness(1);
        }

        .container {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow: auto;
        }

        h2 {
            color: #f39c12;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: left;
        }

        .title-field {
            font-size: 18px;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #1e1e1e;
            color: #fff;
            width: 100%;
        }

        .note-field {
            flex-grow: 1;
            font-size: 16px;
            padding: 19px;
            padding-bottom: 20%;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #1e1e1e;
            color: #fff;
            width: 100%;
            resize: none;
            margin-bottom: 20px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer a,
        .footer button {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .footer .btn-back {
            color: #fff;
            background-color: #1e1e1e;
            border: 1px solid #f39c12;
        }

        .footer .btn-back:hover {
            background-color: #f39c12;
            color: #000;
        }

        .footer .btn-save {
            background-color: transparent;
            color: #f39c12;
            border: 2px solid #f39c12;
            margin-right: 10px;
        }

        .footer .btn-save:hover {
            background-color: #f39c12;
            color: #000;
        }

        .footer .btn-download {
            background-color: #f39c12;
            color: #fff;
            border: none;
        }

        .footer .btn-download:hover {
            background-color: #ffa41b;
        }

        .footer .actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <ul class="menu">
            <li><a href="../assets/user.php"><img src="../img/login.png" alt="Login"></a></li>
            <li><a href="../assets/adicionar.php"><img src="../img/add.png" alt="Adicionar"></a></li>
            <li><a href="../assets/feito.php"><img src="../img/lista.png" alt="Tarefas"></a></li>
            <li><a href=""><img src="../img/bloco-de-anotacoes.png" alt="Tarefas"></a></li>
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
