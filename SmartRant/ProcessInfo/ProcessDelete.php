<?php

session_start();

require_once 'Functions/DeleteFunctions.php';
require_once 'Functions/Requires.php';
$user = $_SESSION['user'];

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'delete':
            confirm();
            break;
        case 'yes':
            delete($db);
            break;
        case 'No':
            noFun();
            break;
    }
}

function noFun() {
    if (isset($_SESSION['confirm'])) {
        unset($_SESSION['confirm']);
    }
}

function confirm() {
    $_SESSION['confirm'] = true;
}

function delete($db) {
    if (isset($_SESSION['confirm'])) {
        $_SESSION["Messege"] = "Your Account has been Deleted";
        $user = $_SESSION['user'];
        unlink($user->getImgLink());
        deleteUser($db, $user);
        
    }
}
