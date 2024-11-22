<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../static/styles/login.css">
</head>
<body>
    
    <form action="login_proc.php" method="GET">
        <div class="card">
            <div class="container">
                <h2 style="text-align: center;">Login</h2>
            </div>
            <label for="cod_docente">Código Docente:</label>
            <input type="text" id="cod_docente" name="cod_docente" required><br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha"><br><br>
            <input type="submit" value="Entrar">
        </div>
    </form>
</body>
</html>
