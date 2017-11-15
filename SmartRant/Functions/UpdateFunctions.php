<?php

function UpdateUserImage($user, $db) {
    try {
        $id = $user->getId();
        $imgLink = $user->getImgLink();

        $query = "UPDATE users SET imgLink =:imgLink WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':imgLink', $imgLink);
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function updateUserName($user, $db) {
    try {
        $id = $user->getId();
        $UserName = $user->getUserName();

        $query = "UPDATE users SET userName =:userName WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $UserName);
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function updateUserEmail($user, $db) {
    try {
        $id = $user->getId();
        $userEmail = $user->getEmail();

        $query = "UPDATE users SET email =:userEmail WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $userEmail);
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function updateUserPassword($user, $db) {
    try {
        $id = $user->getId();
        $password = $user->getPassword();

        $query = "UPDATE users SET password =:password WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function confirmPassword($user, $db, $oldPass) {
    try {
        $id = $user->getId();
        $stmt = $db->prepare("SELECT password FROM users WHERE id = :id");
        $stmt->execute(array($id));

        $userPassword = $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    if ($oldPass == $userPassword) {
        return true;
    }
    return false;
}
