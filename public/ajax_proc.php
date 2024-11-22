<?php 
    require '../conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Captura o valor da pesquisa enviado via AJAX
    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
    
    // Prepara a consulta SQL com o valor da pesquisa
    $sql = $conn->prepare("SELECT * FROM anais
    WHERE tema LIKE ? 
    OR evento LIKE ?
    OR instituicao LIKE ?
    OR isbn LIKE ?");

    // Executa a consulta com o valor da pesquisa
    if($sql->execute(["%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%"])){
        echo "consulta realizada com sucesso"."<br>";
    } else{
        echo "erro";
    }
     

    // Verifica se há resultados e os exibe
    if($sql->rowCount() > 0) {
        $values = $sql->fetchAll();
        foreach($values as $value) {
            echo "<h1>Tema: " . htmlspecialchars($value["tema"]) . "</h1>";
            echo "<p>evento: " . htmlspecialchars($value["evento"]) . "</p>";
            echo "<p>instituição: " . htmlspecialchars($value["instituicao"]) . "</p>";
            echo "<p>isbn: " . htmlspecialchars($value["isbn"]) . "</p>";

        }
    }
    echo "recebendo o ajax";
?>
