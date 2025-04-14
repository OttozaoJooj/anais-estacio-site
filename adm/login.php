<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | Anais Estácio</title>

    <link rel="stylesheet" href="../assets/styles/templates_css/header.css">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link rel="stylesheet" href="../assets/styles/templates_css/reset.css">

    <!--Google Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    
    <header>
        <div class="header-img">
            <img src="../assets/img/logoEstacio.png">
        </div>
        <div class="btn-sobre">
            <a href="../about.php">Sobre</a>
        </div>
    </header>


    <div class="container">
        <div class="content">
            <div class="title">
                <h1>ENTRAR</h1>
            </div>
            <form class="form" action="src/login_proc.php" method="GET">
                <div class="form-content">
                    <label for="cod_docente">Código Docente:</label>
                    <input type="text" id="cod_docente" name="cod_docente" required>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                    <input type="submit" value="Entrar">
                </div>
                <div class="link-signin">
                    <a href="signin.php">Cadastre-se</a>
                </div>
                <div class="logo-estacio">
                    <img src="../assets/img/logoEstacio2.png" width="96px" height="27px">
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

