<?php

session_start();
require_once 'Database/database.php';
require_once 'Functions/ArticleFunctions.php';
$a = new ArticleFunctions();
if (isset($_POST['action'])) {
    $id = $_POST['ratingID'];

    switch ($_POST['action']) {
        case '1':
            $a->updateRating($db, $id, "oneStar");
            break;
        case '2':
            $a->updateRating($db, $id, "twoStar");
            break;
        case '3':
            $a->updateRating($db, $id, "threeStar");
            break;
        case '4':
            $a->updateRating($db, $id, "fourStar");
            break;
        case '5':
            $a->updateRating($db, $id, "fiveStar");
            break;
    }

    $rating = $a->getAvgRating($db, $id);
    $a->updateArticleRating($db, $id, $rating);
}

