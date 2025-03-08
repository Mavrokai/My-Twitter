<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';


$searchTerm = '%' . $_GET['q'] . '%';

$query = "
        SELECT 
            u.user_id,
            u.username,
            u.display_name,
            COUNT(p.post_id) AS post_count
        FROM Users u
        LEFT JOIN Posts p ON u.user_id = p.user_id
        WHERE u.username LIKE :search 
            OR u.display_name LIKE :search
        GROUP BY u.user_id
        ORDER BY post_count DESC
        LIMIT 7
    ";

$stmt = $pdo->prepare($query);
$stmt->execute([':search' => $searchTerm]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
