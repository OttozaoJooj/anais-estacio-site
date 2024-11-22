<?php
require '../../conexao.php';
// Configuração do diretório de upload
$diretorioUpload = __DIR__."/uploads/anais/";
// Verifica se o arquivo foi enviado
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $instituicao = $_POST['instituicao'];
    $evento = $_POST['evento'];
    $tema = $_POST['tema'];
    $descricao = $_POST['descricao'];
    $isbn = $_POST['isbn'];
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
        $stmt = $conn->prepare("INSERT INTO anais (instituicao, evento, tema, descricao, isbn, ano, file_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $instituicao);
        $stmt->bindParam(2, $evento);
        $stmt->bindParam(3, $tema);
        $stmt->bindParam(4, $descricao);
        $stmt->bindParam(5, $isbn);
        $stmt->bindParam(6, $ano);       
        $stmt->bindParam(7, $caminhoCompleto);

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
} else {
    echo "Nenhum arquivo foi enviado.";
}
?>
