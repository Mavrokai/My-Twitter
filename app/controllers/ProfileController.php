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

$user_id = $_SESSION['user_id'];


if (isset($_GET['username'])) {
    $username = trim($_GET['username']);
    $userProfile = getUserByUsername($pdo, $username);
    if (!$userProfile) {
        $_SESSION['error'] = "Utilisateur non trouvé";
        header('Location: /profil.php?username=' . urlencode($username));
        exit;
    }
    $target_user_id = $userProfile['user_id'];
} else {
    $target_user_id = $_SESSION['user_id'];
    $userProfile = getUserById($pdo, $target_user_id);
}


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


$randomUsers = getRandomUsers($pdo, (int)$_SESSION['user_id'], 7);
$following_count = getFollowingCount($pdo, $target_user_id);
$followers_count = getFollowersCount($pdo, $target_user_id);
$user_posts = get_user_posts($target_user_id);




// Stockage des infos du profil dans des variables pour la vue très important
$profile_username = $userProfile['username'];
$profile_display_name = $userProfile['display_name'];
$profile_bio = $userProfile['bio'];
$is_owner = ($target_user_id == $_SESSION['user_id']);
