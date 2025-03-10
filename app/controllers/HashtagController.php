<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Follow.php';
require_once __DIR__ . '/../models/UserModify.php';
require_once __DIR__ . '/../models/Tweet.php';



if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/auth.php');
    exit;
}


$hashtag = isset($_GET['tag']) ? trim($_GET['tag']) : '';

// hashtag.php
if (!empty($hashtag)) {
    // Nettoie le hashtag en retirant le '#' et convertit en minuscules
    $hashtag_clean = strtolower(ltrim($hashtag, '#'));
    
    // Cherche les posts avec le hashtag nettoyé
    $posts = get_posts_by_hashtag($hashtag_clean);
    
    // Pour l'affichage, ajoute le '#' devant
    $hashtag = '#' . $hashtag_clean;
}


$user_id = $_SESSION['user_id'];
$randomUsers = getRandomUsers($pdo, (int)$user_id, 7);
$is_owner = true;


$page_title = "Hashtag $hashtag";
$profile_username = $_SESSION['username'] ?? '';
$profile_display_name = $_SESSION['display_name'] ?? '';