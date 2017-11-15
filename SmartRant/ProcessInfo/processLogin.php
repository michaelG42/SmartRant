<?php

$userName = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$userPass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

try {


    $sql = "SELECT * FROM users WHERE userName = '$userName' and password = '$userPass'";

    $results = $db->query($sql);

    $row = $results->fetch();

    if ($row['userName'] == $userName && $row['password'] == $userPass) {
        $_SESSION['user'] = new User($row['id'], $userName, $userPass, $row['email'], $row['imgLink']);
        $_SESSION["Messege"] = "Login succsessfull, Welcome " . $userName;
        $_SESSION['LoggedIn'] = true;
    } else {
        $_SESSION["loginMessege"] = "Login Unsuccsessfull";
        $_SESSION['userLoggedIn'] = false;
    }

    unset($db);
} catch (PDOException $e) {
    echo "Login: " . $e->getMessage();
}