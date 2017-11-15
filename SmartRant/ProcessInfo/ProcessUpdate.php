<?php

require_once 'Functions/RegisterFunctions.php';
require_once 'Functions/UpdateFunctions.php';
require_once 'Functions/Requires.php';
$user = $_SESSION['user'];

if (isset($_POST['userName'])) {
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);


    if (!(checkUserExists($db, $userName))) {
        $user->setUserName($userName);
        updateUserName($user, $db);
        $_SESSION["Messege"] = "Your Username has been updated to " . $userName;
    } else {
        $_SESSION["Messege"] = "Sorry That username is already in use";
    }
}

if (isset($_POST['userEmail'])) {
    $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_VALIDATE_EMAIL);

    if (!(checkEmailExists($db, $userEmail))) {
        $user->setEmail($userEmail);
        updateUserEmail($user, $db);
        $_SESSION["Messege"] = "Your email has been updated to " . $userEmail;
    } else {
        $_SESSION["Messege"] = "Sorry That email is already in use";
    }
}

if (isset($_POST['NewPass']) && isset($_POST['OldPass'])) {
    $oldPass = filter_input(INPUT_POST, 'OldPass', FILTER_SANITIZE_STRING);
    $newPass = filter_input(INPUT_POST, 'NewPass', FILTER_SANITIZE_STRING);

    if (confirmPassword($user, $db, $oldPass)) {
        $user->setPassword($newPass);
        updateUserPassword($user, $db);
        $_SESSION["Messege"] = "Password Succsessfully updated";
    } else {
        $_SESSION["Messege"] = "Your old password did not match";
    }
}
?>




