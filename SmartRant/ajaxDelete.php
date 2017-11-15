<?php

require_once 'Functions/DeleteFunctions.php';
require_once 'Functions/Requires.php';
session_start();
$user = $_SESSION['user'];

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Yes':
            delete($db);
            break;
    }
}

function delete($db) {

    $user = $_SESSION['user'];
    deleteUser($db, $user);

    $userImage = "UserImages/" . $user->getUserName() . ".png";
    unlink($userImage);
}
