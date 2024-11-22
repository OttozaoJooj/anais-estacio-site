<?php
// Caminha pra alterar sem apagar o '/vendor/autoload.php'
require_once '/opt/lampp/htdocs/anais-estacio-site/vendor/autoload.php';


use Dotenv\Dotenv;

// Carrega o .env
// Caminho pra alterar
$dotenv = Dotenv::createImmutable('/opt/lampp/htdocs/anais-estacio-site/');
$dotenv->load();

// Agora você pode acessar as variáveis de ambiente usando $_ENV

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS']; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>