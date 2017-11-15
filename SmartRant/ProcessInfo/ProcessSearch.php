<?php

require_once 'Functions/ArticleFunctions.php';
require_once 'Database/database.php';

if (!empty($_GET['dateLo'])) {
    $dateLo = $_GET['dateLo'];
} else {
    $dateLo = '2000-01-01';
}
if (!empty($_GET['dateHi'])) {
    $dateHi = $_GET['dateHi'];
} else {
    $dateHi = '2100-01-01';
}

$science = NULL;
$health = NULL;
$engineering = NULL;
$technology = NULL;

if (isset($_GET['Science'])) {
    $science = 'Science';
}
if (isset($_GET['Health'])) {
    $health = 'Health';
}
if (isset($_GET['Engineering'])) {
    $engineering = 'Engineering';
}
if (isset($_GET['Technology'])) {
    $technology = 'Technology';
}

if (isset($_GET['userName'])) {
    $userName = $_GET['userName'];
} else {
    $userName = NULL;
}
if (!empty($_GET['keyWords'])) {

    $keyWords = preg_split('/[\ \n\,]+/', $_GET['keyWords']);
} else {
    $keyWords = NULL;
}
if (!empty($_GET['tags'])) {
    $tags = $_GET['tags'];
} else {
    $tags = NULL;
}

$categorys = array(
    $science,
    $health,
    $engineering,
    $technology,);

