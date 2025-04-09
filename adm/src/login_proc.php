<?php
session_start();
require '../../conexao.php';



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cod_docente = $_GET['cod_docente'];
    $senha = $_GET['senha']; // Use password_hash em uma aplicação real

    $stmt = $conn->prepare("SELECT * FROM docentes WHERE cod_docente = ? AND senha = ?");
    $stmt->bindParam(1, $cod_docente);
    $stmt->bindParam(2, $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['id_docente'] = $stmt->fetchAll()[0]["id_docente"];
        header("Location: ../adm.php");
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>