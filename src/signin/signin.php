<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estácio Anais</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="card">
        <form action="signin_proc.php" method="post">
            <label for="name">Nome:</label><br>
            <input type="text" name="nome" id=""><br><br>
            <label for="text">Código Docente:</label><br>
            <input type="cod_docente" name="cod_docente"><br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id=""><br><br>
            <label for="curso">Curso:</label><br><br>
            <select name="curso" id="curso">
                <option value="1" selected>Análise e Desenvolvimento de Sistemas</option>
            </select><br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>

    
   
</body>
</html>