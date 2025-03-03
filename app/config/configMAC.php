<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();


$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$pswd = $_ENV['DB_PASS'];
$port = $_ENV['PORT'];

$socket = "/Applications/MAMP/tmp/mysql/mysql.sock";

try {
    // Initialisation correcte de $pdo
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;port=$port;unix_socket=$socket;charset=utf8",
        $username,
        $pswd
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}
