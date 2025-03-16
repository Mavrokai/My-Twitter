<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');

try {

    
    if (session_status() === PHP_SESSION_NONE) session_start();
    
    require_once __DIR__ . '/../config/config.php';
    require_once __DIR__ . '/../models/Tweet.php';

    if (!isset($_SESSION['user_id'])) {
        throw new Exception('Connectez-vous pour retweeter', 401);
    }

    $input = file_get_contents('php://input');
    if (empty($input)) {
        throw new Exception('Requête invalide', 400);
    }

    $data = json_decode($input, true);
    
    if (!isset($data['post_id'])) {
        throw new Exception('Post ID manquant', 400);
    }

    

    $result = retweet_post($_SESSION['user_id'], (int)$data['post_id']);
    echo json_encode($result);

} catch (Exception $e) {


    http_response_code($e->getCode() ?: 500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'code' => $e->getCode()
    ]);
}