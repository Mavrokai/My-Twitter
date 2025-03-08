<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}


include_once __DIR__ . '../../config/config.php';

function getUserMessages($db, $userId)
{
    $query = "SELECT * FROM messages WHERE receiver_id = :user_id OR sender_id = :user_id ORDER BY created_at DESC";
    
    $stmt = $db->prepare($query);
    $stmt->execute([':user_id' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
