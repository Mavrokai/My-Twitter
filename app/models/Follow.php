<?php
include_once __DIR__ . '../../config/config.php';


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




function getRandomUsers($pdo, $currentUserId, $limit = 7) {
    $query = "SELECT u.user_id, u.username, u.display_name, 
              (EXISTS(SELECT 1 FROM Follows WHERE follower_id = ? AND following_id = u.user_id)) AS is_following
              FROM Users u
              WHERE u.user_id != ?
              ORDER BY RAND()
              LIMIT ?";
    
    $stmt = $pdo->prepare($query);
    

    // On bind explicitement les paramètres avec leurs types
    $stmt->bindParam(1, $currentUserId, PDO::PARAM_INT);
    $stmt->bindParam(2, $currentUserId, PDO::PARAM_INT);
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
