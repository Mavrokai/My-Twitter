<?php
include_once __DIR__ . '../../models/MessagerieModel.php';

class MessagerieController
{
    public function index()
    {
        // Vérification de session
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        // Initialisation modèle
        require_once __DIR__ . '/../models/MessageModel.php';
        $db = new PDO($host, $username, $pswd);
        $messageModel = new MessageModel($db);

        // Récupération données
        $messages = $messageModel->getUserMessages($_SESSION['user_id']);
        $hasMessages = !empty($messages);

        // Chargement vue
        require __DIR__ . '/../views/msg/messagerie.php';
    }
}
