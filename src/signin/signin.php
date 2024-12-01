<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="../../static/styles/signin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-img">
            <img src="../../assets/img/logoEstacio.png">
        </div>
        <div class="btn-sobre">
            <button>Sobre</button>
        </div>
    </header>

    <div class="container">
        <div class="content">
            <div class="title">
                <h1>CADASTRE-SE</h1>
            </div>
            <form class="form" action="signin_proc.php" method="GET">
                <div class="form-content">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                    <label for="text">Código Docente:</label>
                    <input type="text" name="cod_docente" required>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                    <label for="curso">Curso:</label>
                    <select name="curso" id="curso" required>
                        <option value="1" selected>Análise e Desenvolvimento de Sistemas</option>
                    </select>
                    <input type="submit" value="Cadastrar">
                </div>
                <div class="link-login">
                    <a href="../login/login.php">Entrar</a>
                </div>
                <div class="logo-estacio">
                    <img src="../../assets/img/logoEstacio2.png" width="96px" height="27px">
                </div>
            </form>
        </div>
    </div>
    <!--
    <footer>
        <p>Desenvolvido pelos Alunos do Curso de <strong>Analise e Desenvolvimento de Sistemas</strong>  da Estácio Castanhal.</p>
        <p class="links">
            <a href="https://www.linkedin.com/in/samuel-nicolas-974806252/">Samuel Nicolas</a>
            <a href="https://www.linkedin.com/in/leonardo-santos-1172ba2a9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Leonardo Maciel</a>
            <a href="#">Otto Mozale</a>
        </p>
        
    </footer>
-->
</body>
</html>

