<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

include_once __DIR__ . '/../config/config.php';

// Inscription pas touche
function checkUserExists($pdo, $username, $email)
{
    $query = "SELECT * FROM Users WHERE username = :username OR email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':username' => $username, ':email' => $email]);
    return $stmt->rowCount() > 0;
}

function createUser($pdo, $userData)
{

    
    $hashedPassword = hash('ripemd160', $userData['password'] . 'vive le projet tweet_academy');

    $query = "INSERT INTO Users 
        (username, display_name, password_hash, email, date_of_birth) 
        VALUES (:username, :display_name, :password, :email, :date_of_birth)";

    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        ':username' => $userData['username'],
        ':display_name' => $userData['display_name'],
        ':password' => $hashedPassword,
        ':email' => $userData['email'],
        ':date_of_birth' => $userData['date_of_birth']
    ]);
}



//login pas touche non plus 

function getUserByEmail($pdo, $email)
{
    $query = "SELECT * FROM Users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
