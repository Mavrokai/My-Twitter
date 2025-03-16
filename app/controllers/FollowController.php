<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Follow.php';


header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Non authentifié']);
    exit;
}

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data || !isset($data['user_id'])) {
        throw new Exception('Données invalides');
    }

    $followerId = $_SESSION['user_id'];
    $followingId = (int)$data['user_id'];

    $result = toggleFollow($pdo, $followerId, $followingId);
    $newFollowing = getFollowingCount($pdo, $followerId);
    $newFollowers = getFollowersCount($pdo, $followerId);

    echo json_encode([
        'success' => true,
        'status' => $result,
        'following' => $newFollowing,
        'followers' => $newFollowers
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
