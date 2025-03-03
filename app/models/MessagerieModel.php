<?php

include_once __DIR__ . '../../config/config.php';

class MessageModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserMessages($userId) {
        $query = "SELECT * FROM messages 
                 WHERE receiver_id = :user_id 
                 OR sender_id = :user_id 
                 ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}