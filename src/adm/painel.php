<?php
require_once '../../conexao.php';
session_start();
if (!isset($_SESSION['id_docente'])) {
    header("Location: ../login/login.php");
    exit();
}
    

    
    $sql = "SELECT * FROM anais;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() <= 0){
        die("Nada Retornado!");
    } else{
        $rows = $stmt->fetchAll();
    }
/*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid p-4">
        <div class="header d-flex flex-row justify-content-between mb-5">
            <h1 class="fw-bold">Painel</h1>
            <div class="content">
                <button class="btn-upload btn btn-success">Upload Anais</button>
            </div>    
        </div>

        <div class="hero">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Instituição</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Nome do Arquivo</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody class="anais-container">
                    <?php foreach($rows as $row):?>
                    <tr class="anais">
                        <th scope="row" class="id"><?= $row["id_anais"]?></th>
                        <td class="instituicao"><?= $row["instituicao"]?></td>
                        <td class="evento"><?= $row["evento"]?></td>
                        <td class="tema"><?= $row["tema"]?></td>
                        <td class="descricao"><?= $row["descricao"]?></td>
                        <td class="isbn"><?= $row["isbn"]?></td>
                        <td class="ano"><?= $row["ano"]?></td>
                        <td class="nome-arquivo"><?= basename($row["file_path"])?></td>
                        <td class="acoes"><button class="btn-update btn btn-primary">Atualizar</button> <button class="btn-delete btn btn-danger">Excluir</button> <a class="btn-viewer btn btn-info" href="<?= "uploads/anais/".basename($row["file_path"])?>" target="_blank">Ver</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>

            </table>   

        </div>

    </div>

   

    <dialog class="dialog-upload-anais">
    <div class="card">
        <form action="upload_anais.php" method="POST" enctype="multipart/form-data">
            <h3>criar</h3>
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
        
            <input type="submit" value="enviar">
            <button class="close-upload">Fechar</button>
        </form>
    </div>
    </dialog>

    <dialog class="update-anais">
        <div class="update-anais-content">
            <form action="#" method="post" class="form-update">
                <h3>atualizar</h3>
                <label for="instituicao">Instituição:</label><br>
                <input type="text" name="instituicao" class="ipt-instituicao" required><br><br>
            
                <label for="evento">Evento:</label><br>
                <input type="text" name="evento" class="ipt-evento" required><br><br>

                <label for="tema">Tema:</label><br>
                <input type="text" name="tema" class="ipt-tema" required><br><br>

                <label for="descricao">Descrição:</label><br>
                <textarea name="descricao" class="ipt-descricao" maxlength="500"></textarea><br><br>

                <label for="isbn">ISBN: </label><br>
                <input type="text" name="isbn" class="ipt-isbn" required><br><br>

            
                <label for="ano">Ano:</label><br>
                <input type="number" name="ano" class="ipt-ano" required><br><br>
        
                <input type="submit" class="btn btn-success" value="enviar"></input>
                <button class="close-update btn btn-danger">Fechar</button>
            </form>
        </div>
    </dialog>

    <dialog class="dialog-delete-anais">
        <h2>Tem certeza que deseja excluir esse anais?</h2>
        <button class="btn-delete-anais btn btn-danger">Excluir</button>
        <button class="btn-delete-anais-close btn btn-success">Fechar</button>
    </dialog>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/modalFunctios.js"></script>
    <script src="js/anaisData.js"></script>
    <script src="js/updateDataAnais.js"></script>
</body>
</html>