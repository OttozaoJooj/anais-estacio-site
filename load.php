<?php 
    require 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Captura o valor da pesquisa enviado via AJAX
    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

    // Prepara a consulta SQL com o valor da pesquisa
    $sql = $conn->prepare("SELECT * FROM anais WHERE titulo LIKE ? OR autores LIKE ?");
    $sql->execute(["%$pesquisa%", "%$pesquisa%"]); // Executa a consulta com o valor da pesquisa

    // Verifica se há resultados e os exibe
    if($sql->rowCount() > 0) {
        foreach($sql->fetchAll() as $value) {
            echo "<h1>Título: " . htmlspecialchars($value["titulo"]) . "</h1>";
            echo "<p>Autores: " . htmlspecialchars($value["autores"]) . "</p>";
            echo "<p>Ano: " . htmlspecialchars($value["ano"]) . "</p>";
        }
    }
?>
