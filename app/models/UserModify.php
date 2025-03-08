<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

include_once __DIR__ . '/../config/config.php';

function getUserById($pdo, $user_id)
{
    $query = "SELECT * FROM Users WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':user_id' => $user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function checkOtherUserExists($pdo, $username, $email, $exclude_id)
{
    $query = "SELECT * FROM Users 
              WHERE (username = :username OR email = :email) 
              AND user_id != :exclude_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':exclude_id' => $exclude_id
    ]);
    return $stmt->rowCount() > 0;
}

function updateUser($pdo, $userData)
{


    $query = "UPDATE Users SET 
                username = :username, 
                display_name = :display_name, 
                email = :email, 
                bio = :bio";




    if (isset($userData['password'])) {
        $query .= ", password_hash = :password_hash";
        $hashedPassword = hash('ripemd160', $userData['password'] . 'vive le projet tweet_academy');
    }

    $query .= " WHERE user_id = :user_id";

    $stmt = $pdo->prepare($query);


    $params = [
        ':username' => $userData['username'],
        ':display_name' => $userData['display_name'],
        ':email' => $userData['email'],
        ':bio' => $userData['bio'],
        ':user_id' => $userData['user_id']
    ];



    if (isset($hashedPassword)) {
        $params[':password_hash'] = $hashedPassword;
    }

    return $stmt->execute($params);
}




function getUserByUsername($pdo, $username)
{
    $query = "SELECT * FROM Users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}





function checkUserExists($username)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM Users WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetchColumn() > 0;
}






function processContent($content)
{
    return preg_replace_callback(
        '/@(\w+)/',
        function ($matches) {
            $username = $matches[1];
            if (checkUserExists($username)) {
                return '<a href="../profile/profil.php?username=' . urlencode($username) . '" class="text-[#59713E] hover:underline">@' . htmlspecialchars($username) . '</a>';
            } else {
                return '@' . htmlspecialchars($username);
            }
        },
        preg_replace_callback(
            '/#(\w+)/',
            function ($matches) {
                $tag = $matches[1];
                return '<a href="../tag/tag.php?tag=' . urlencode($tag) . '" class="text-[#59713E] hover:underline">#' . htmlspecialchars($tag) . '</a>';
            },
            $content
        )
    );
}
