<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/User.php';

session_start();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'register':
            // Validation des champs bref en gros si tout est rempli
            $requiredFields = ['username', 'display_name', 'email', 'password', 'confirm_password', 'date_of_birth'];
            $missingFields = [];
            
            foreach ($requiredFields as $field) {
                if (empty($_POST[$field])) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                header("Location: /views/auth/register.php?error=Champs manquants : " . implode(', ', $missingFields));
                exit();
            }

            if ($_POST['password'] !== $_POST['confirm_password']) {
                header("Location: /views/auth/register.php?error=Les mots de passe ne correspondent pas");
                exit();
            }

            // Vérification existence utilisateur et email dans la BDD
            $username = $_POST['username'];
            $email = $_POST['email'];
            
            if (checkUserExists($pdo, $username, $email)) {
                header("Location: /views/auth/register.php?error=Nom d'utilisateur ou email déjà utilisé");
                exit();
            }

            // Création du compte dans la bdd
            $userData = [
                'username' => $username,
                'display_name' => $_POST['display_name'],
                'email' => $email,
                'password' => $_POST['password'],
                'date_of_birth' => $_POST['date_of_birth']
            ];

            if (createUser($pdo, $userData)) {
                header("Location: ../views/auth/auth.php");
            } else {
                header("Location: /views/auth/register.php?error=Erreur serveur");
            }
            break;

            case 'login':
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    header("Location: /views/auth/auth.php?error=Email ou mot de passe manquant");
                    exit();
                }
    
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $user = getUserByEmail($pdo, $email);
    
                if (!$user) {
                    header("Location: /views/auth/auth.php?error=Identifiants incorrects");
                    exit();
                }
    
                $hashedPassword = hash('ripemd160', $password . 'vive le projet tweet_academy');
    
                if ($hashedPassword === $user['password_hash']) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['bio'] = $user['bio'];
                    $_SESSION['display_name'] = $user['display_name'];
                    $_SESSION['email'] = $user['email'];


                    header("Location: ../views/profile/profil.php");
                    exit();
                } else {
                    header("Location: /views/auth/auth.php?error=Mot de passe incorrect");
                    exit();
                }
                break;
    }
}
?>