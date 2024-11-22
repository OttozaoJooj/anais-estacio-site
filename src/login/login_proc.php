<?php
session_start();
require '../../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use password_hash em uma aplicação real

    $stmt = $conn->prepare("SELECT * FROM docentes WHERE nome = :username AND senha = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['nome'] = $username;
        header("Location: ../adm/painel.php");
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>