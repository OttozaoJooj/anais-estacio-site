<?php
/*session_start();
if (!isset($_SESSION['cod_docente'])) {
    header("Location: ../login/login.php");
    exit();
}
    */

    require_once '../../conexao.php';
    $sql = "SELECT * FROM anais;";
    $stmt = $conn->prepare($sql);
    
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
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla architecto excepturi ab natus amet facere delectus unde, iure maiores quis fuga ducimus rem! Accusantium, eaque. Quaerat sint cumque velit eum!</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><button class="btn-update btn btn-primary">Atualizar</button> <button class="btn-delete btn btn-danger">Excluir</button></td>
                    </tr>
                    
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
            <form action="#" method="post">
                <h3>atualizar</h3>
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
    <script>
        let btnDialogUpload = document.querySelector(".btn-upload");
        let dialogUpload = document.querySelector(".dialog-upload-anais");
        let closeDialogUpload = document.querySelector(".close-upload");

        let btnDialogDelete = document.querySelectorAll(".btn-delete");
        let dialogDelete = document.querySelector(".dialog-delete-anais");
        let btnDeleteAnais = document.querySelector(".btn-delete-anais");
        let closeDialogDelete = document.querySelector(".btn-delete-anais-close");



        let btnDialogUpdate = document.querySelectorAll(".btn-update");
        let dialogUpdate = document.querySelector(".update-anais");
        let closeDialogUpdate = document.querySelector(".close-update");

        

        btnDialogUpload.addEventListener("click", function(){
            dialogUpload.showModal();
        })
        closeDialogUpload.addEventListener("click", function(e){
            e.preventDefault();

            dialogUpload.close();
        })

        btnDialogUpdate.forEach(btn => {
            btn.addEventListener("click", function(){
                dialogUpdate.showModal();
            })
        })

        closeDialogUpdate.addEventListener("click", function(){
                dialogUpdate.close();
        })
        
        btnDialogDelete.forEach(btn =>{
            btn.addEventListener("click", function(){
                dialogDelete.showModal();
            })
        })

        btnDeleteAnais.addEventListener("click", function(){
            alert("Anais Apagado!");
            dialogDelete.close()
        })

        closeDialogDelete.addEventListener("click", function(){
            dialogDelete.close();
        })




    </script>
</body>
</html>