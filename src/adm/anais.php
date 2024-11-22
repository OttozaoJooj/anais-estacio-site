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
            <label for="instituicao">Instituição:</label><br>
            <input type="text" name="instituicao" required><br><br>
        
            <label for="evento">Evento:</label><br>
            <input type="text" name="evento" required><br><br>

            <label for="tema">Tema:</label><br>
            <input type="text" name="tema" required><br><br>

            <label for="descricao">Descrição:</label><br>
            <textarea name="descricao" id="descricao" maxlength="500"></textarea><br><br>

            <label for="isbn">ISBN: </label><br>
            <input type="text" name="isbn" required><br><br>

        
            <label for="ano">Ano:</label><br>
            <input type="number" name="ano" required><br><br>
        

        
            <label for="arquivo">Arquivo (PDF):</label><br>
            <input type="file" name="arquivo" accept="application/pdf" required><br><br>
        
            <input type="submit" value="enviar  ">
        </form>
    </div>
</body>
</html>