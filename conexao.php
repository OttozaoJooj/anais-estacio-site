<?php
$host = 'localhost';
$dbname = 'sistema_login';
$user = 'root'; // Altere se necessário
$pass = ''; // Coloque sua senha aqui

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>