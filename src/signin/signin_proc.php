<?php
require '../../conexao.php';

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $cod_docente = $_POST["cod_docente"];
    $senha = $_POST["senha"];
    $curso = $_POST["curso"];

    $stmt = $conn->prepare('INSERT INTO docentes(nome, cod_docente, senha, fk_id_curso) VALUES (?,?,?,?)');
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cod_docente);
    $stmt->bindParam(3, $senha);
    $stmt->bindParam(4, $curso);

    if($stmt->execute()){
        
        header("location: ../login/login.php");

    } else{
        echo "falha no cadastro";
    }


    
}


?>