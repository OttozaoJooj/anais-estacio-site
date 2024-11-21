<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anais</title>
    <style>
        .result{
            align-items: center;
            padding: 5%;
        }
    </style>
</head>
<body>
    <p>Busca</p>
    <button class="btn">Load</button>
    <form id="formAnais" enctype="multipart/form-data">
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisa" class="search">
    </form>
    <div class="result"></div>

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="master.js"></script>
</body>
</html>