<?php 
    require '../conexao.php';

    
    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : die("Falha no Envio do Ajax");
    

    
    $sql = "SELECT id_anais, instituicao, evento, tema, descricao, isbn, ano, create_at, file_path 
    FROM anais
    WHERE tema LIKE ? 
    OR evento LIKE ?
    OR instituicao LIKE ?
    OR isbn LIKE ? ;";

    $stmt = $conn->prepare($sql);
    /*
    $stmt->bindParam(':tema', $pesquisa);
    $stmt->bindParam(':evento', $pesquisa);
    $stmt->bindParam(':instituicao', $pesquisa);
    $stmt->bindParam(':isbn', $pesquisa);
    */
    
    if(!$stmt->execute(["%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%"])){
        die("Erro na pesquisa do ajax!");
    }
     
    if($stmt->rowCount() > 0) {
        $values = $stmt->fetchAll();
        echo json_encode($values);
    }

?>
