<?php

        
include("config.php");
/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$codDocente = $_POST["cod_docente"];

$stmt = $con->prepare("INSERT INTO docentes(nome, email, senha, cod_docente) VALUES (?,?,?,?);");
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $senha);
$stmt->bindParam(4, $codDocente);
$stmt->execute();


echo "Salada";

?>