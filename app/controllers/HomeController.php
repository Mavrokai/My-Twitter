<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Tweet.php';
require_once __DIR__ . '/../models/Follow.php';
require_once __DIR__ . '/../models/UserModify.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/auth.php');
    exit;
}

$current_user_id = $_SESSION['user_id'];

// Récupérer les posts de la timeline
$user_posts = get_timeline_posts($current_user_id);

// Récupérer les utilisateurs aléatoires
$randomUsers = getRandomUsers($pdo, $current_user_id, 7);

// Récupérer les compteurs de followers/following
$following_count = getFollowingCount($pdo, $current_user_id);
$followers_count = getFollowersCount($pdo, $current_user_id);
$followers_list = getFollowersList($pdo, $current_user_id);
$following_list = getFollowingList($pdo, $current_user_id);

// Variables pour la vue
$is_owner = true;
