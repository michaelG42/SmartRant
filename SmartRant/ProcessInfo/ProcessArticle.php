<?php

require_once 'Classes/Article.php';
require_once 'Functions/ArticleFunctions.php';
require_once 'Database/database.php';

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$category = $_POST['category'];
$body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING);

if (isset($_POST['comments'])) {
    $comments = true;
} else {
    $comments = false;
}

if (isset($_POST['tags'])) {
    $tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
} else {
    $tags = NULL;
}

$rating = 0;

//    if ($_FILES['userImg']['name'] != "") {
//
//        $image = $_FILES['userImg']['tmp_name'];
//    } else {
//        $image = $user->getImgLink();
//    }

$image = $_POST['image'];

$userName = $_POST['userName'];

$article = new Article(null, $userName, $title, $category, $body, $comments, $rating, $image, $tags);
$a = new ArticleFunctions();
$a->createArticle($db, $article);
