<?php

require_once 'Functions/Requires.php';

function deleteUser($db,$user)
{
    
        $id = $user->getId();
           
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();


}
function deleteUserImage($user)
{
    $imgScr = "UserImages/" . $user->getUserName() . ".png";
    unlink($imgScr);
}

