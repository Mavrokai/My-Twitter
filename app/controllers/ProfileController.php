<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Follow.php';
require_once __DIR__ . '/../models/UserModify.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/auth/auth.php');
    exit;
}

$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {


    $username = trim($_POST['username']);
    $display_name = trim($_POST['display_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $bio = trim($_POST['bio']);


    if (empty($username) || empty($email) || empty($display_name)) {
        $_SESSION['error'] = "Les champs obligatoires doivent être remplis";
        header('Location: ../views/profile/profil.php');
        exit;
    }



    $existingUser = checkOtherUserExists($pdo, $username, $email, $user_id);
    if ($existingUser) {
        $_SESSION['error'] = "Le nom d'utilisateur ou l'email est déjà utilisé";
        header('Location: ../views/profile/profil.php');
        exit;
    }


    $userData = [
        'user_id' => $user_id,
        'username' => $username,
        'display_name' => $display_name,
        'email' => $email,
        'bio' => $bio
    ];


    if (!empty($password)) {
        $userData['password'] = $password;
    }




    if (updateUser($pdo, $userData)) {

        $_SESSION['username'] = $username;
        $_SESSION['display_name'] = $display_name;
        $_SESSION['email'] = $email;
        $_SESSION['bio'] = $bio;
        
        $_SESSION['success'] = "Profil mis à jour avec succès";
    } else {
        $_SESSION['error'] = "Erreur lors de la mise à jour du profil";
    }
    
    header('Location: ../views/profile/profil.php');
    exit;
}


$randomUsers = getRandomUsers($pdo, (int)$user_id, 7);
$following_count = getFollowingCount($pdo, $user_id);
$followers_count = getFollowersCount($pdo, $user_id);