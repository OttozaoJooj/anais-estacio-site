<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../static/styles/login.css">
</head>
<body>
    
    <form action="login_proc.php" method="POST">
        <div class="card">
            <div class="container">
                <h2 style="text-align: center;">Login</h2>
            </div>
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Senha:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Entrar">
        </div>
    </form>
</body>
</html>
