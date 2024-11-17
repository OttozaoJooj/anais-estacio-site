<?php
require 'conexao.php';
// Configuração do diretório de upload
$diretorioUpload = __DIR__."/uploads/anais/";
// Verifica se o arquivo foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $ano = $_POST['ano'];
    $evento = $_POST['evento'];

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
    try{
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
        // Conexão com o banco de dados
        $conn = new mysqli("$host", "$user", "$pass", "$dbname");

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Inserção no banco de dados
        $stmt = $conn->prepare("INSERT INTO anais (titulo, autores, ano, evento, caminho_arquivo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $titulo, $autores, $ano, $evento, $caminhoCompleto);

        if ($stmt->execute()) {
            echo "Anais cadastrados com sucesso!";
            header("Location: painel.php");
        } else {
            echo "Erro ao salvar no banco de dados.";
        }

        $stmt->close();
        $conn->close();
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
