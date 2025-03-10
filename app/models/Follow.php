<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}

include_once __DIR__ . '/../config/config.php';


function getFollowingCount($pdo, $user_id)
{
    $sql = "SELECT COUNT(*) FROM Follows WHERE follower_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}




function getFollowersCount($pdo, $user_id)
{
    $sql = "SELECT COUNT(*) FROM Follows WHERE following_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchColumn();
}






function getRandomUsers($pdo, $currentUserId, $limit = 7)
{
    $query = "SELECT u.user_id, u.username, u.display_name, 
              (EXISTS(SELECT 1 FROM Follows WHERE follower_id = ? AND following_id = u.user_id)) AS is_following
              FROM Users u
              WHERE u.user_id != ?
              ORDER BY RAND()
              LIMIT ?";

    $stmt = $pdo->prepare($query);


    // 1. L'ID de l'utilisateur actuel pour vérifier les suivis
    $stmt->bindParam(1, $currentUserId, PDO::PARAM_INT);

    // 2. L'ID de l'utilisateur actuel pour exclure les résultats
    $stmt->bindParam(2, $currentUserId, PDO::PARAM_INT);

    // 3. La limite de résultats à afficher
    $stmt->bindParam(3, $limit, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





function toggleFollow($pdo, $followerId, $followingId)
{


    // Vérifie si le follow existe déjà
    $checkQuery = "SELECT * FROM Follows WHERE follower_id = ? AND following_id = ?";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->execute([$followerId, $followingId]);




    if ($checkStmt->rowCount() > 0) {
        // Supprime le follow
        $deleteQuery = "DELETE FROM Follows WHERE follower_id = ? AND following_id = ?";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->execute([$followerId, $followingId]);
        return 'unfollowed';
    } else {



        // Ajoute le follow
        $insertQuery = "INSERT INTO Follows (follower_id, following_id) VALUES (?, ?)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->execute([$followerId, $followingId]);
        return 'followed';
    }
}


function getFollowersList($pdo, $userId) {
    $sql = "SELECT u.user_id, u.username, u.display_name, u.avatar_url as avatar,
            EXISTS(SELECT 1 FROM Follows WHERE follower_id = ? AND following_id = u.user_id) as is_following
            FROM Follows 
            JOIN Users u ON follower_id = u.user_id 
            WHERE following_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id'], $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFollowingList($pdo, $userId) {
    $sql = "SELECT u.user_id, u.username, u.display_name, u.avatar_url as avatar,
            EXISTS(SELECT 1 FROM Follows WHERE follower_id = ? AND following_id = u.user_id) as is_following
            FROM Follows 
            JOIN Users u ON following_id = u.user_id 
            WHERE follower_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id'], $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}