<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anais</title>
    
</head>
<body>
    <div class="card">
        <form action="upload_anais.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" required><br><br>
        
            <label for="autores">Autores:</label><br>
            <input type="text" name="autores" required><br><br>
        
            <label for="ano">Ano:</label><br>
            <input type="number" name="ano" required><br><br>
        
            <label for="evento">Evento:</label><br>
            <input type="text" name="evento" required><br><br>
        
            <label for="arquivo">Arquivo (PDF):</label><br>
            <input type="file" name="arquivo" accept="application/pdf" required><br><br>
        
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>