<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Follow.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: ../../views/auth/auth.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $followerId = $_SESSION['user_id'];
    $followingId = $data['user_id'];

    try {
            $result = toggleFollow($pdo, $followerId, $followingId);
            

            $newFollowing = getFollowingCount($pdo, $followerId);
            $newFollowers = getFollowersCount($pdo, $followerId);
        
            echo json_encode([
                'success' => true,
                'status' => $result,
                'following' => $newFollowing,
                'followers' => $newFollowers
            ]);
    } catch (PDOException $e) {

        header('location: ../../views/profile/profil.php');
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}