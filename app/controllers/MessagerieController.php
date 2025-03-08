<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

include_once __DIR__ . '/../config/config.php';


$db = new PDO($dsn, $username, $password, $options);


$messages = getUserMessages($db, $_SESSION['user_id']);
$hasMessages = !empty($messages);


include __DIR__ . '/../views/msg/messagerie.php';
