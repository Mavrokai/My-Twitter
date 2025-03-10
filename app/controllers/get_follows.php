<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../models/Follow.php';
require_once __DIR__ . '/../config/config.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['type']) || !isset($_GET['user_id'])) {
    die(json_encode(['error' => 'Requête invalide']));
}

$type = $_GET['type'];
$userId = $_GET['user_id'];

try {
    if ($type === 'followers') {
        $users = getFollowersList($pdo, $userId);
    } elseif ($type === 'following') {
        $users = getFollowingList($pdo, $userId);
    } else {
        throw new Exception('Type invalide');
    }

    header('Content-Type: application/json');
    echo json_encode($users);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
