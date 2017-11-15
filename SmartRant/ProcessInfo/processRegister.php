<?php

$validEmail = false;
$validUser = false;

$emailExists = false;
$userNameExists = false;

if (isset($_POST['email'])) {
    if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) {
        $userEmail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $validEmail = true;
    }
}

$userName = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$userPass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);



try {

    if ($validEmail) {
        $validUser = validateUser($db, $userName, $userEmail);
    }
    if ($validUser) {
        createUser($db, $userName, $userPass, $userEmail);
    } else {
        checkWhyUserInvalid($validEmail, $userNameExists, $emailExists);
    }

    unset($db);
} catch (PDOException $e) {
    echo "Login: " . $e->getMessage();
}