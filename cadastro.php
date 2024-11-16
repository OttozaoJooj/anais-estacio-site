<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estácio Anais</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="card">
        <form action="conexao.php" method="post">
            <label for="name">Insira nome do Docente</label><br>
            <input type="text" name="nome" id=""><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email"><br><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha" id=""><br><br>
            <label for="Cod">Código do docente</label>
            <input type="text" name="cod_docente" id=""><br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>

    
   
</body>
</html>