<?php

require_once 'Functions/ImageFunctions.php';
require_once 'Functions/Requires.php';
$user = $_SESSION['user'];
if ($_FILES['userImg']['name'] != "") {

    $image = $_FILES['userImg']['tmp_name'];

    if (checkImageValid($image)) {
        uploadImage($image, $user);
        assignUserImage($user, $db);
        $_SESSION["Messege"] = "Your Avatar has been Changed";
    }
}
?>