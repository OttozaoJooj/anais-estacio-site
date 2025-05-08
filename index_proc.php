<?php 
    require 'conexao.php';


    
    if(!isset($_GET['pesquisa']) || !isset($_GET['searchFilterCurso'])){
        echo json_encode(['erro' => 'Erro no recebimento do ajax']);
        die();
    }

    $pesquisa = $_GET['pesquisa'];
    $searchFilterCurso = $_GET['searchFilterCurso'];

    if($searchFilterCurso == 0){
        $sql = "SELECT id_anais, instituicao, evento, tema, descricao, isbn, ano, create_at, file_path
        FROM anais
        WHERE tema LIKE ? 
        OR evento LIKE ?
        OR instituicao LIKE ?
        OR isbn LIKE ? 
        OR ano LIKE ? ; ";

        $stmt = $conn->prepare($sql);
    
        if(!$stmt->execute(["%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%"])){
            die("Erro na pesquisa do ajax!");
        }

    } else{

        $sql = "SELECT id_anais, instituicao, evento, tema, descricao, isbn, ano, create_at, file_path
        FROM anais
        WHERE (tema LIKE ? 
        OR evento LIKE ?
        OR instituicao LIKE ?
        OR isbn LIKE ? 
        OR ano LIKE ? )
        AND fk_id_curso = ? ;";

        $stmt = $conn->prepare($sql);
        
        if(!$stmt->execute(["%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%", "%$pesquisa%", $searchFilterCurso])){
            die("Erro na pesquisa do ajax!");
        }

        //echo json_encode(['test' => 'saas']);

    }
       

     
    if($stmt->rowCount() > 0) {
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($values);
    } else{
        echo json_encode(["noresult" => ""]);
    }  

?>
