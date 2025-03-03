<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

include_once __DIR__ . '/../config/config.php';


$db = new PDO($dsn, $username, $password, $options);


$messages = getUserMessages($db, $_SESSION['user_id']);
$hasMessages = !empty($messages);


include __DIR__ . '/../views/msg/messagerie.php';