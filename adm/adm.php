<?php
require_once '../conexao.php';

session_start();

if (!isset($_SESSION['id_docente'])) {
    header("Location: login.php");
    exit();
}




function setIDDocenteInSessionStorage(){
    /*Session Storage dura até a aba fechar*/
    /*Local Storage dura para sempre*/
    $docenteID = $_SESSION["id_docente"];

    echo "<script>
        sessionStorage.setItem('id_docente', $docenteID);
    </script>";
}

function getAnaisInfo($connection){
    $sql = "SELECT * FROM anais;";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() <= 0){
        die("Nada Retornado!");
    } else{
        return $stmt->fetchAll();
    }

}

function getUserNameLogged($connection){
    $docenteID = $_SESSION["id_docente"];

    $stmt = $connection->prepare("SELECT nome FROM docentes WHERE id_docente = ?;");
    $stmt->bindParam(1, $docenteID);

    if(!$stmt->execute()){
        die("Erro na execução da Query!");
    }

    if($stmt->rowCount() > 0){
        return $stmt->fetchAll();
    }else{
        die("nome de usuário inexistente!");
    }
}

setIDDocenteInSessionStorage();

$rows = getAnaisInfo($conn);
$userNameLogged = getUserNameLogged($conn)[0][0];

    


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
    <title>Painel | Anais Estácio</title>

    <link rel="stylesheet" href="../assets/styles/panel.css">
    <link rel="stylesheet" href="../assets/styles/templates_css/reset.css">

    <!--Google Fonts API -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,400;0,700;0,900;1,500&display=swap" rel="stylesheet">
    
</head>
<body>
    <header class="header">
        <h1>Painel</h1>
        <h2>Usuário: <?= ucwords($userNameLogged);?></h2>
        
    </header>
    <div class="container">
        <div class="filter-upload">
            <select name="filter" class="filter">
                <option value="2">Todos os Anais</option>
                <option value="1">Meus Anais</option>
                
            </select>
            <button class="btn-upload btn">Enviar Anais</button>
        </div>               
        <div class="content">
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
                <!-- GET das informações dos anais -->
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
                        <td class="acoes"><button class="btn-update btn">Atualizar</button> <button class="btn-delete btn">Excluir</button> <a class="btn-viewer btn" href="<?= "../uploads/".basename($row["file_path"])?>" target="_blank">Ver</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>

            </table>   

        </div>
    </div>
    

    

   
    <!-- Create Anais-->
    <dialog class="dialog-upload-anais">
        <div class="dialog-upload-anais-content">
            <div class="close-upload">
                <img src="../assets/icons/close-modal-icon.png">
            </div>

            <form action="src/adm_proc.php" method="POST" enctype="multipart/form-data">
                <h3>ENVIAR ANAIS</h3>
                <label for="instituicao">Instituição:</label>
                <input type="text" name="instituicao" required>
            
                <label for="evento">Evento:</label>
                <input type="text" name="evento" required>

                <label for="tema">Tema:</label>
                <input type="text" name="tema" required>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" maxlength="500" required></textarea>
                

                <div class="isbn-ano-group">
                    
                    <div class="isbn-group">    
                        <label for="isbn">ISBN: </label>
                        <input type="text" name="isbn" required>
                    </div>

                    <div class="ano-group">
                        <label for="ano">Ano:</label>
                        <input type="number" name="ano" required>
                    </div>
            
                    
                </div>
                
            
            
                <label for="arquivo">Arquivo (PDF):</label>
                <input type="file" name="arquivo" accept="application/pdf" required>


                <input type="hidden" name="tipo-form" value="create">
            
                <input type="submit" value="ENVIAR">
            </form>
        </div>
    </dialog>

    <!-- Update Anais-->
    
    <dialog class="update-anais">
        <div class="update-anais-content">
            <div class="close-update">
                <img src="../assets/icons/close-modal-icon.png">
            </div>
        
            <form action="src/adm_proc.php" method="post" class="form-update">
                <h3>ATUALIZAR</h3>
                <label for="instituicao">Instituição:</label>
                <input type="text" name="instituicao" class="ipt-instituicao" required>
            
                <label for="evento">Evento:</label>
                <input type="text" name="evento" class="ipt-evento" required>

                <label for="tema">Tema:</label>
                <input type="text" name="tema" class="ipt-tema" required>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="ipt-descricao" maxlength="500" required></textarea>

                <div class="isbn-ano-group">
                    <div class="isbn-group">
                        <label for="isbn">ISBN: </label>
                        <input type="text" name="isbn" class="ipt-isbn" required>
                    </div>

                    <div class="ano-group">
                        <label for="ano">Ano:</label>
                        <input type="number" name="ano" class="ipt-ano" required>
                    </div>
                </div>

                <input type="hidden" name="tipo-form" value="update">
                <input type="hidden" name="id" value="" class="ipt-id-update">
                
        
                <input type="submit" value="ENVIAR"></input>
            </form>
            

        </div>
    </dialog>

    <!-- Delete Anais-->

    <dialog class="dialog-delete-anais">
        <form action="src/adm_proc.php" method="post">
            <h2>Tem certeza que deseja excluir o anais?</h2>

            <input type="hidden" name="tipo-form" value="delete">    
            <input type="hidden" name="id" value="" class="ipt-id-delete">
            <input type="hidden" name="file-path" value="" class="ipt-file-path">

            <div class="btn-delete-close">
                <input type="submit" class="btn-delete-anais" value="EXCLUIR"></input>
                <a class="btn-delete-anais-close btn">FECHAR</a>
            </div>
            

        </form>    
    </dialog>
    <!--<script src="js/modalFunctios.js"></script>
    <script src="js/anaisData.js"></script>
    <script src="js/updateDataAnais.js"></script>
    <script src="js/deleteDataAnais.js"></script>
    <script src="js/filter.js"></script>-->
    <script src="../assets/js/adm.js"></script>
</body>
</html>