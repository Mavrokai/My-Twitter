<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';

$search = isset($_GET['q']) ? $_GET['q'] . '%' : '';

$stmt = $pdo->prepare("
    SELECT 
        h.tag,
        COUNT(ph.post_id) AS usage_count,
        MAX(p.created_at) AS dernier_usage
    FROM Hashtags h
    LEFT JOIN PostHashtag ph USING(hashtag_id)
    LEFT JOIN Posts p USING(post_id)
    WHERE h.tag LIKE CONCAT(:search, '%')
    GROUP BY h.hashtag_id
    ORDER BY usage_count DESC, dernier_usage DESC
    LIMIT 7
");

$stmt->execute([':search' => $search]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
