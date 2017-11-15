<?php
require_once '../Database/database.php';
        echo "<br>********* Add Rating *********<br>";
         
        
        try
        {           
            $sql = "INSERT INTO rating(articleId, oneStar, twoStar, threeStar, fourStar, fiveStar)"
                    . "VALUES(?,?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            
            $array = array(4, 0, 0, 0, 0, 0);
            $stmt->execute($array);

            unset($db);
            echo "Rating added successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Add Users: " . $e->getMessage();
        }