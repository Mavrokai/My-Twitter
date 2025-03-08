<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}


function get_user_posts($user_id)
{
    global $pdo;

    $query = "SELECT 
            p.post_id,
            p.content,
            p.created_at,
            u.username,
            u.display_name,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data
          FROM Posts p
          JOIN Users u ON p.user_id = u.user_id
          LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
          LEFT JOIN Media m ON pm.media_id = m.media_id
          WHERE p.user_id = ?
          GROUP BY p.post_id";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ? $result : [];
}




function create_post($user_id, $content, $media_path = null)
{
    global $pdo;

    try {
        $pdo->beginTransaction();

        // Créer le post avec le contenu original
        $stmt = $pdo->prepare("INSERT INTO Posts (user_id, content) VALUES (?, ?)");
        $stmt->execute([$user_id, trim($content)]);
        $post_id = $pdo->lastInsertId();

        // Gestion des hashtags
        preg_match_all('/#(\w+)/', $content, $matches);
        $hashtags = array_unique($matches[1]); // Éviter les doublons

        foreach ($hashtags as $tag) {
            // Normalisation en minuscules pour éviter les doublons
            $tag = strtolower($tag);

            // Vérifier si le hashtag existe
            $stmt = $pdo->prepare("SELECT hashtag_id FROM Hashtags WHERE tag = ?");
            $stmt->execute([$tag]);
            $hashtag_id = $stmt->fetchColumn();

            // Créer le hashtag s'il n'existe pas
            if (!$hashtag_id) {
                $stmt = $pdo->prepare("INSERT INTO Hashtags (tag) VALUES (?)");
                $stmt->execute([$tag]);
                $hashtag_id = $pdo->lastInsertId();
            }

            // Lier le hashtag au post
            $stmt = $pdo->prepare("INSERT INTO PostHashtag (post_id, hashtag_id) VALUES (?, ?)");
            $stmt->execute([$post_id, $hashtag_id]);
        }

        // Gestion du média
        if ($media_path) {
            $short_url = substr(md5(uniqid()), 0, 8);

            $stmt = $pdo->prepare("INSERT INTO Media (file_name, short_url) VALUES (?, ?)");
            $stmt->execute([$media_path, $short_url]);

            $media_id = $pdo->lastInsertId();
            $stmt = $pdo->prepare("INSERT INTO PostMedia (post_id, media_id) VALUES (?, ?)");
            $stmt->execute([$post_id, $media_id]);
        }

        $pdo->commit();
        return true;
    } catch (Exception $e) {
        $pdo->rollBack();
        error_log("Erreur création post : " . $e->getMessage());
        return false;
    }
}




function get_posts_by_hashtag($hashtag)
{
    global $pdo;

    $query = "SELECT 
                p.post_id,
                p.content,
                p.created_at,
                u.username,
                u.display_name,
                GROUP_CONCAT(DISTINCT h.tag SEPARATOR ' ') AS hashtags,
                GROUP_CONCAT(DISTINCT m.file_name SEPARATOR '||') AS media_files
              FROM Posts p
              JOIN Users u ON p.user_id = u.user_id
              JOIN PostHashtag ph ON p.post_id = ph.post_id
              JOIN Hashtags h ON ph.hashtag_id = h.hashtag_id
              LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
              LEFT JOIN Media m ON pm.media_id = m.media_id
              WHERE h.tag = ?
              GROUP BY p.post_id
              ORDER BY p.created_at DESC";



    $stmt = $pdo->prepare($query);
    $stmt->execute([$hashtag]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
