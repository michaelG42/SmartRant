<?php
require_once 'Functions/ArticleFunctions.php';
$a = new ArticleFunctions();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'Functions/Requires.php';

session_start();
if (isset($_POST['userLogin'])) { //check if user is logged in   
    require_once 'ProcessInfo/processLogin.php';
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_POST['register'])) { //check if user has registered  
    require_once 'ProcessInfo/processRegister.php';
}

if (isset($_SESSION["Messege"])) {
    echo $_SESSION["Messege"];
}
if (isset($_POST['uploadImage'])) {
    require_once 'ProcessInfo/processImage.php';
}

if (isset($_POST['updateInfo'])) {

    require_once 'ProcessInfo/processUpdate.php';
}

if (isset($_POST['submitArticle'])) {
    require_once 'ProcessInfo/ProcessArticle.php';
}

if (isset($_GET['articleId'])) {
    
    $viewOne = true;
    $id = $_GET['articleId'];
    $article = $a->getArticleById($id);
    
    $_SESSION['pageTitle'] =  "";
    $comments = getCommentsObjs(getCommentsForArticle($id));
} else {

    if (isset($_GET['articleCategory'])) {
        $category = $_GET['articleCategory'];
        $_SESSION['pageTitle'] =  $category;
        $articlesByCategory = $a->getArticlesByCategory($category);
        $articles = $a->getArticleObjs($articlesByCategory);
    } else if (isset($_GET['articleUserName'])) {
        $userName = $_GET['articleUserName'];
        $_SESSION['pageTitle'] =  $userName . "'s articles";
        $articlesByUser = $a->getArticlesByUserName($userName);
        $articles = $a->getArticleObjs($articlesByUser);
    } else if (isset($_GET['Search'])) {
        require_once 'ProcessInfo/ProcessSearch.php';
         $_SESSION['pageTitle'] = "Search Results";
        $articles = $a->getArticlesAdvanceSearch($dateLo, $dateHi, $categorys, $userName, $keyWords, $tags);
        if ($articles == NULL) {
             $_SESSION['pageTitle'] = 'NO Results Found';
        }
    } else {
         $_SESSION['pageTitle'] = "Popular articles";
        $topTen = $a->getTopArticles();
        $articles = $a->getArticleObjs($topTen);
    }
}
if (isset($_GET['SubmitComment'])) {
    require_once 'ProcessInfo/ProcessComment.php';
}

$newestArticles = $a->getArticleObjs($a->getNewestArticles());