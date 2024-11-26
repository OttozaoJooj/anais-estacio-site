<?php
session_start();
require '../../conexao.php';
// Configuração do diretório de upload
$diretorioUpload = __DIR__."/uploads/anais/";
// Verifica se o arquivo foi enviado
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($_FILES);
echo "</pre>";

// Create Anais

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo']) && $_POST['tipo_form'] === 'create') {
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
            header("Location: painel.php");
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


        } else{
            echo '<script> alert("Permissão Negada: Não é possível alterar anais de outro usuário! "); </script>';            
            echo '<script> window.location.href = "painel.php"</script>';
        };
    }else{
        die("Erro na consulta: validação de permissão");
    }

    // Update
    $sql = 'UPDATE anais SET instituicao = ?, evento = ?, tema = ?, descricao = ?, isbn = ?, ano = ? WHERE id_anais = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $instituicao);
    $stmt->bindParam(2, $evento);
    $stmt->bindParam(3, $tema);
    $stmt->bindParam(4, $descricao);
    $stmt->bindParam(5, $isbn);
    $stmt->bindParam(6, $ano);
    $stmt->bindParam(7, $idAnais);

    if($stmt->execute()){
        header("location: painel.php");
    } else{
        die("Erro na consulta: update");
    }
}


// Delete Anais
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tipo-form'] === 'delete'){

    $fkIdDocente = $_SESSION['id_docente'];
    $idAnais = $_POST['id'];


    $sql = 'SELECT anais.id_anais, anais.fk_id_docente,  anais.tema, anais.isbn FROM anais INNER JOIN docentes ON anais.fk_id_docente = docentes.id_docente WHERE anais.fk_id_docente = ? AND docentes.id_docente = ? AND anais.id_anais = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $fkIdDocente);
    $stmt->bindParam(2, $fkIdDocente);
    $stmt->bindParam(3, $idAnais);

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            echo "É permitido fazer Delete!";
            //print_r($stmt->fetchAll());


        } else{
            echo '<script> alert("Permissão Negada: Não é possível alterar anais de outro usuário! "); </script>';            
            echo '<script> window.location.href = "painel.php"</script>';
        };
    }else{
        die("Erro na consulta: validação de permissão");
    }

    // Delete
    $sql = 'DELETE FROM anais WHERE id_anais = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $idAnais);
    
    if($stmt->execute()){
        echo "Cláusula Delete Executada";
        header("location: painel.php");

    } else{
        echo "Erro na Execução da Cláusula Delete";

    }


}

?>
