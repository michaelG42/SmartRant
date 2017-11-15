<?php

require_once 'Classes/Comment.php';
require_once 'Functions/CommentFunctions.php';
require_once 'Database/database.php';
// $id, $userName, $body, $date, $articleId;
$username = filter_input(INPUT_GET, 'userName', FILTER_SANITIZE_STRING);
$articleID = filter_input(INPUT_GET, 'articleId', FILTER_SANITIZE_STRING);
$body = filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_STRING);

$comment = new Comment(NULL, $username, $body, $articleID);

createComment($db, $comment);