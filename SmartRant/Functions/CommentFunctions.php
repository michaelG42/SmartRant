<?php

require_once 'Classes/Comment.php';

function createComment($db, $comment) {
    try {
        $sql = "INSERT INTO comments(id, username, body, date, articleId)"
                . "VALUES(?,?,?,?,?)";
        $stmt = $db->prepare($sql);

        $array = array(NULL,
            $comment->getUserName(),
            $comment->getBody(),
            $comment->getDate(),
            $comment->getArticleId()
        );

        $stmt->execute($array);
        echo "Comment added";
        unset($db);
    } catch (PDOException $e) {
        echo "Add Comment: " . $e->getMessage();
    }
}

function getCommentsForArticle($articleID) {
    try {
        include('Database/database.php');
        $sql = "SELECT * FROM comments WHERE articleId = $articleID ORDER BY date DESC";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getCommentsObjs($results) {
    $commentArray = array();
    foreach ($results as $comment) {
        $id = $comment["id"];
        $userName = $comment["username"];
        $body = $comment["body"];
        $date = $comment["date"];
        $articleID = $comment["articleId"];

        $c = new Comment($id, $userName, $body, $articleID);
        $c->setDate($date);

        $commentArray[] = $c;
    }

    return $commentArray;
}
