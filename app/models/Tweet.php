<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
    session_start();
}


function get_timeline_posts($current_user_id)
{
    global $pdo;

    $query = "
        (SELECT 
            p.post_id,
            p.content,
            p.created_at,
            u.user_id AS original_user_id,
            u.username AS original_username,
            u.display_name AS original_display_name,
            NULL AS retweeter_id,
            NULL AS retweeter_username,
            NULL AS retweeter_display_name,
            p.created_at AS display_date,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data,
            0 AS is_retweet,
            COALESCE(
                (SELECT JSON_ARRAYAGG(
                    JSON_OBJECT(
                        'post_id', r.post_id,
                        'content', r.content,
                        'created_at', r.created_at,
                        'username', ru.username,
                        'display_name', ru.display_name
                    )
                )
                FROM Posts r
                JOIN Users ru ON r.user_id = ru.user_id
                WHERE r.reply_to = p.post_id),
                JSON_ARRAY()
            ) AS replies
        FROM Posts p
        JOIN Users u ON p.user_id = u.user_id
        LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
        LEFT JOIN Media m ON pm.media_id = m.media_id
        WHERE p.user_id IN (SELECT following_id FROM Follows WHERE follower_id = :current_user_id)
            OR p.user_id = :current_user_id
        GROUP BY p.post_id)
        
        UNION ALL
        
        (SELECT 
            p.post_id,
            p.content,
            rp.created_at,
            u.user_id AS original_user_id,
            u.username AS original_username,
            u.display_name AS original_display_name,
            rp.user_id AS retweeter_id,
            retweeter.username AS retweeter_username,
            retweeter.display_name AS retweeter_display_name,
            rp.created_at AS display_date,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data,
            1 AS is_retweet,
            COALESCE(
                (SELECT JSON_ARRAYAGG(
                    JSON_OBJECT(
                        'post_id', r.post_id,
                        'content', r.content,
                        'created_at', r.created_at,
                        'username', ru.username,
                        'display_name', ru.display_name
                    )
                )
                FROM Posts r
                JOIN Users ru ON r.user_id = ru.user_id
                WHERE r.reply_to = p.post_id),
                JSON_ARRAY()
            ) AS replies
        FROM Reposts rp
        JOIN Posts p ON rp.post_id = p.post_id
        JOIN Users u ON p.user_id = u.user_id
        JOIN Users retweeter ON rp.user_id = retweeter.user_id
        LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
        LEFT JOIN Media m ON pm.media_id = m.media_id
        WHERE rp.user_id IN (SELECT following_id FROM Follows WHERE follower_id = :current_user_id)
            OR rp.user_id = :current_user_id
        GROUP BY rp.post_id, rp.user_id)
        
        ORDER BY display_date DESC
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute([':current_user_id' => $current_user_id]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as &$post) {
        $post['replies'] = json_decode($post['replies'] ?? '[]', true);
    }

    return $posts;
}

function get_user_posts($user_id, $current_user_id = null)
{
    global $pdo;

    $query = "SELECT 
            p.post_id,
            p.content,
            p.created_at,
            u.username,
            u.display_name,
            COALESCE(MAX(rp.created_at), p.created_at) AS display_date,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data,
            MAX(CASE WHEN rp.user_id = :user_id THEN 1 ELSE 0 END) AS is_retweet,
            GROUP_CONCAT(DISTINCT rp.user_id) AS retweeters,
            MAX(EXISTS(SELECT 1 FROM Reposts WHERE post_id = p.post_id AND user_id = :current_user)) AS is_retweeted,
            COALESCE(
                (SELECT JSON_ARRAYAGG(
                    JSON_OBJECT(
                        'post_id', r.post_id,
                        'content', r.content,
                        'created_at', r.created_at,
                        'username', ru.username,
                        'display_name', ru.display_name
                    )
                )
                FROM Posts r
                JOIN Users ru ON r.user_id = ru.user_id
                WHERE r.reply_to = p.post_id),
                JSON_ARRAY()
            ) AS replies
          FROM Posts p
          JOIN Users u ON p.user_id = u.user_id
          LEFT JOIN Reposts rp ON p.post_id = rp.post_id
          LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
          LEFT JOIN Media m ON pm.media_id = m.media_id
          WHERE p.user_id = :user_id OR rp.user_id = :user_id
          GROUP BY p.post_id, p.content, p.created_at, u.user_id
          ORDER BY display_date DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':user_id' => $user_id,
        ':current_user' => $current_user_id
    ]);

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // decode la rep json
    foreach ($posts as &$post) {
        $post['replies'] = json_decode($post['replies'] ?? '[]', true);
    }

    return $posts;
}




function create_post($user_id, $content, $media_path = null, $reply_to = null)
{
    global $pdo;

    try {
        $pdo->beginTransaction();


        $stmt = $pdo->prepare("INSERT INTO Posts (user_id, content, reply_to) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, trim($content), $reply_to]);
        $post_id = $pdo->lastInsertId();


        preg_match_all('/#(\w+)/', $content, $matches);
        $hashtags = array_unique($matches[1]);

        foreach ($hashtags as $tag) {
            $tag = strtolower($tag);
            $stmt = $pdo->prepare("SELECT hashtag_id FROM Hashtags WHERE tag = ?");
            $stmt->execute([$tag]);
            $hashtag_id = $stmt->fetchColumn();

            if (!$hashtag_id) {
                $stmt = $pdo->prepare("INSERT INTO Hashtags (tag) VALUES (?)");
                $stmt->execute([$tag]);
                $hashtag_id = $pdo->lastInsertId();
            }

            $stmt = $pdo->prepare("INSERT INTO PostHashtag (post_id, hashtag_id) VALUES (?, ?)");
            $stmt->execute([$post_id, $hashtag_id]);
        }



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

    $query = "
        (SELECT 
            p.post_id,
            p.content,
            p.created_at,
            u.user_id AS original_user_id,
            u.username AS original_username,
            u.display_name AS original_display_name,
            NULL AS retweeter_id,
            NULL AS retweeter_username,
            NULL AS retweeter_display_name,
            p.created_at AS display_date,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data,
            0 AS is_retweet
        FROM Posts p
        JOIN Users u ON p.user_id = u.user_id
        LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
        LEFT JOIN Media m ON pm.media_id = m.media_id
        JOIN PostHashtag ph ON p.post_id = ph.post_id 
        JOIN Hashtags h ON ph.hashtag_id = h.hashtag_id
        WHERE h.tag = :hashtag
        GROUP BY p.post_id)
        
        UNION ALL
        
        (SELECT 
            p.post_id,
            p.content,
            rp.created_at,
            u.user_id AS original_user_id,
            u.username AS original_username,
            u.display_name AS original_display_name,
            rp.user_id AS retweeter_id,
            retweeter.username AS retweeter_username,
            retweeter.display_name AS retweeter_display_name,
            rp.created_at AS display_date,
            GROUP_CONCAT(DISTINCT CONCAT(m.file_name, '|SHORT|', m.short_url) SEPARATOR '||') AS media_data,
            1 AS is_retweet
        FROM Reposts rp
        JOIN Posts p ON rp.post_id = p.post_id
        JOIN Users u ON p.user_id = u.user_id
        JOIN Users retweeter ON rp.user_id = retweeter.user_id
        LEFT JOIN PostMedia pm ON p.post_id = pm.post_id
        LEFT JOIN Media m ON pm.media_id = m.media_id
        JOIN PostHashtag ph ON p.post_id = ph.post_id 
        JOIN Hashtags h ON ph.hashtag_id = h.hashtag_id
        WHERE h.tag = :hashtag
        GROUP BY rp.post_id, rp.user_id)
        
        ORDER BY display_date DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute([':hashtag' => $hashtag]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function is_retweeted_by_user($post_id, $user_id)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM Reposts 
                          WHERE post_id = ? AND user_id = ?");
    $stmt->execute([$post_id, $user_id]);
    return (bool)$stmt->fetchColumn();
}



function retweet_post($user_id, $post_id)
{
    global $pdo;
    try {
        $pdo->beginTransaction();
        // Verif si déjà retweeté
        $stmt = $pdo->prepare("SELECT 1 FROM Reposts WHERE post_id = ? AND user_id = ?");
        $stmt->execute([$post_id, $user_id]);
        if ($stmt->fetch()) {
            return ['success' => false, 'error' => 'Déjà retweeté'];
        }


        // Insère le retweet
        $stmt = $pdo->prepare("INSERT INTO Reposts (post_id, user_id) VALUES (?, ?)");
        $stmt->execute([$post_id, $user_id]);
        $pdo->commit();
        return ['success' => true];
    } catch (PDOException $e) {
        $pdo->rollBack();
        error_log("Retweet error: " . $e->getMessage());
        return ['success' => false, 'error' => $e->getMessage()];
    }
}
