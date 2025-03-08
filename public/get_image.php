<?php
require_once __DIR__.'/../app/config/config.php';

if (isset($_GET['short_url'])) {
    $short_url = $_GET['short_url'];
    
    $stmt = $pdo->prepare("SELECT file_name FROM Media WHERE short_url = ?");
    $stmt->execute([$short_url]);
    $file_name = $stmt->fetchColumn();

    if ($file_name && file_exists(__DIR__.'/uploads/'.$file_name)) {
        $mime_type = mime_content_type(__DIR__.'/uploads/'.$file_name);
        header("Content-Type: $mime_type");
        readfile(__DIR__.'/uploads/'.$file_name);
        exit;
    }
}