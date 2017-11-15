<?php

function checkEmailExists($db, $userEmail) {
    try {
        $stmt = $db->prepare("SELECT 1 FROM users WHERE email=?");
        $stmt->execute(array($userEmail));

        $emailExists = $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $emailExists;
}

function checkUserExists($db, $userName) {
    try {
        $stmt = $db->prepare("SELECT 1 FROM users WHERE userName=?");
        $stmt->execute(array($userName));
        $userNameExists = $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $userNameExists;
}

function validateUser($db, $userName, $userEmail) {
    try {
        global $emailExists;
        $emailExists = checkEmailExists($db, $userEmail);
        $validUser = false;

        global $userNameExists;
        $userNameExists = checkUserExists($db, $userName);

        if (!$userNameExists && !$emailExists) {
            $validUser = true;
        }
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $validUser;
}

function createUser($db, $userName, $userPass, $userEmail) {
    try {
        $sql = "INSERT INTO users(id, userName, password, email, imgLink)"
                . "VALUES(?,?,?,?,?)";

        $stmt = $db->prepare($sql);

        $pArray = array(NULL, $userName, $userPass, $userEmail, "UserImages/Default.png");
        $stmt->execute($pArray);
        $_SESSION["Messege"] = "User created successfully!<br>You can now log in";
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function checkWhyUserInvalid($validEmail, $userNameExists, $emailExists) {

    if (!$validEmail) {
        $_SESSION["Messege"] = '<br>The email you entered is invalid<br>';
    }
    if (isset($userNameExists) && $userNameExists) {
        $_SESSION["Messege"] = '<br>The user name you entered already exists<br>';
    }
    if (isset($emailExists) && $emailExists) {
        $_SESSION["Messege"] = 'The email you entered is already in use<br>';
    }
    if (isset($userNameExists) && $userNameExists && isset($emailExists) && $emailExists) {
        $_SESSION["Messege"] = 'The email and username you entered are already in use<br>';
    }
}
