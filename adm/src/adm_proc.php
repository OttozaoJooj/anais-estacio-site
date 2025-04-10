<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_start();
require '../../conexao.php';
require '../../functions.php';
// Configuração do diretório de upload
$diretorioUpload = '../../uploads/';


/*echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($_FILES);
echo "</pre>";
*/

//dd($_FILES);

// Create Anais

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo']) && $_POST['tipo-form'] === 'create') {
    $instituicao = $_POST['instituicao'];
    $evento = $_POST['evento'];
    $tema = $_POST['tema'];
    $descricao = $_POST['descricao'];
    $isbn = $_POST['isbn'];
    $fkIdDocente = $_SESSION['id_docente'];
    $ano = $_POST['ano'];


    $arquivo = $_FILES['arquivo'];
    $nomeArquivo = basename($arquivo['name']);
    $caminhoCompleto = $diretorioUpload . $nomeArquivo;

    // Validações básicas
    if ($arquivo['type'] !== 'application/pdf') {
        die("O arquivo deve ser um PDF.");
    }

    if ($arquivo['size'] > 5 * 1024 * 1024) { // Limite de 5 MB
        die("O arquivo é muito grande.");
    }
    // Move o arquivo para o diretório de uploads
    echo $arquivo["tmp_name"]; 
    echo "<br>";
    echo $caminhoCompleto;
    try{
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
        
        // Inserção no banco de dados
        $stmt = $conn->prepare("INSERT INTO anais (instituicao, evento, tema, descricao, isbn, fk_id_docente, ano, file_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $instituicao);
        $stmt->bindParam(2, $evento);
        $stmt->bindParam(3, $tema);
        $stmt->bindParam(4, $descricao);
        $stmt->bindParam(5, $isbn);
        $stmt->bindParam(6, $fkIdDocente);
        $stmt->bindParam(7, $ano);       
        $stmt->bindParam(8, $caminhoCompleto);

        if ($stmt->execute()) {
            echo "Anais cadastrado com sucesso!";
            header("Location: ../adm.php");
        } else {
            echo "Erro ao salvar no banco de dados.";
        }

    } else {
        echo "Erro ao fazer upload do arquivos.".$arquivo['error'];
    }
} catch (Exception $e) {
    echo "". $e->getMessage();
}
}

// Update Anais
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tipo-form'] === 'update'){
    $instituicao = $_POST['instituicao'];
    $evento = $_POST['evento'];
    $tema = $_POST['tema'];
    $descricao = $_POST['descricao'];
    $isbn = $_POST['isbn'];
    $ano = $_POST['ano'];
    $fkIdDocente = $_SESSION['id_docente'];
    $idAnais = $_POST['id'];

    // Validação de permissão
    $sql = 'SELECT anais.id_anais, anais.fk_id_docente,  anais.tema, anais.isbn FROM anais INNER JOIN docentes ON anais.fk_id_docente = docentes.id_docente WHERE anais.fk_id_docente = ? AND docentes.id_docente = ? AND anais.id_anais = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $fkIdDocente);
    $stmt->bindParam(2, $fkIdDocente);
    $stmt->bindParam(3, $idAnais);

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            echo "É permitido fazer update!";
         
            //print_r($stmt->fetchAll());

            // Update
         
            $sql = 'UPDATE anais SET instituicao = ?, evento = ?, tema = ?, descricao = ?, isbn = ?, ano = ? WHERE id_anais = ?';
            $stmtUpdate = $conn->prepare($sql);
            $stmtUpdate->bindParam(1, $instituicao);
            $stmtUpdate->bindParam(2, $evento);
            $stmtUpdate->bindParam(3, $tema);
            $stmtUpdate->bindParam(4, $descricao);
            $stmtUpdate->bindParam(5, $isbn);
            $stmtUpdate->bindParam(6, $ano);
            $stmtUpdate->bindParam(7, $idAnais);
        
            if($stmtUpdate->execute()){
                header("location: ../adm.php");
            } else{
                die("Erro na consulta: update");
            }


        } else{
            echo '<script> alert("Permissão Negada: Não é possível alterar anais de outro usuário! "); </script>';            
            echo '<script> window.location.href = "../adm.php"</script>';
        };
    }else{
        die("Erro na consulta: validação de permissão");
    }


   
        
}


// Delete Anais
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tipo-form'] === 'delete'){

    $fkIdDocente = $_SESSION['id_docente'];
    $idAnais = $_POST['id'];
    $filePathToDelete = $_POST['file-path'];

    // Validação de permissão
    $sql = 'SELECT anais.id_anais, anais.fk_id_docente,  anais.tema, anais.isbn FROM anais INNER JOIN docentes ON anais.fk_id_docente = docentes.id_docente WHERE anais.fk_id_docente = ? AND docentes.id_docente = ? AND anais.id_anais = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $fkIdDocente);
    $stmt->bindParam(2, $fkIdDocente);
    $stmt->bindParam(3, $idAnais);

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            echo "É permitido fazer Delete!";
            //print_r($stmt->fetchAll());

            // Delete
            $sql = 'DELETE FROM anais WHERE id_anais = ?';
            $stmtDelete = $conn->prepare($sql);
            $stmtDelete->bindParam(1, $idAnais);
            
            if($stmtDelete->execute()){
                echo "Cláusula Delete Executada";
                unlink("uploads/anais/$filePathToDelete");
                header("location: ../adm.php");

            } else{
                echo "Erro na Execução da Cláusula Delete";

            }


        } else{
            echo '<script> alert("Permissão Negada: Não é possível apagar anais de outro usuário! "); </script>';            
            echo '<script> window.location.href = "../adm.php"</script>';
        };
    }else{
        die("Erro na consulta: validação de permissão");
    }

    


}


// Ajax
if($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST["tipo-form"] == 'filter'){
    
    //echo json_encode($_POST);
     
    $typeOfFilter = $_POST['tipo-filter'];
    $idDocente = $_POST['id_docente'];
    
    switch ($typeOfFilter){
        case '1':
            $sql = 'SELECT * FROM anais WHERE fk_id_docente = ?;';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idDocente);

            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
                }
                else{
                    echo json_encode('Nada Retornado');
                }
            } else{
                die("Erro ao Executar o SQL");
            }

            break;

        case '2':
            $sql = 'SELECT * FROM anais;';
            $stmt = $conn->prepare($sql);
                  
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
                }
                else{
                    echo json_encode('Nada Retornado');
                }
            } else{
                die("Erro ao Executar o SQL");
            }

            break;

    } 
    
}

?>
