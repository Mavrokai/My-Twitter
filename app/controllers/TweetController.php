<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Tweet.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = trim($_POST['content'] ?? '');
    $reply_to = $_POST['reply_to'] ?? null;
    $error = null;


    if (empty($content)) {
        $error = "Le contenu ne peut pas être vide";
    }


    $media_path = null;
    if (empty($error) && !empty($_FILES['image']['name'])) {
        $upload_dir = __DIR__ . '/../../public/uploads/';
        $file_name = uniqid() . '_' . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $file_name)) {
            $media_path = $file_name;
        } else {
            $error = "Erreur lors de l'upload du fichier";
        }
    }

    if (empty($error)) {
        $user_id = $_SESSION['user_id'];
        $success = create_post($user_id, $content, $media_path, $reply_to);

        if ($success) {
            $_SESSION['success'] = $reply_to ? 
                "Réponse publiée avec succès" : 
                "Tweet publié avec succès";
            

                $redirect = $reply_to ? 


                // Reste sur la même page pour les réponses
                $_SERVER['HTTP_REFERER'] :
                '../views/profile/profil.php';
            
            header("Location: $redirect");
            exit;
        }
        $error = "Erreur lors de la publication";
    }

    $_SESSION['error'] = $error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


if (isset($_SESSION['user_id'])) {
    $posts = get_user_posts($_SESSION['user_id']) ?? [];
}