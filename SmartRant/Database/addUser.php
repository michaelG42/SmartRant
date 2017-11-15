<?php

        echo "<br>********* Add Users *********<br>";
         
        $host = "localhost";
        $userName = "michael";
        $userPass = "1234"; //SHA1()
        $dbname = "smartrant";
        
        try
        {
            $pdo = new PDO("mysql:dbname=$dbname;host=$host",
                    $userName, $userPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = "INSERT INTO users(id, userName, password, email, imgLink)"
                    . "VALUES(?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            
            $pArray = array(NULL, "Michael", "Password", "Michael@gmail.com", "ImageUrlHere");
            $stmt->execute($pArray);
            
            $pArray = array(NULL, "Ryan", "Password", "Ryan@gmail.com", "ImageUrlHere");
            $stmt->execute($pArray);

            unset($pdo);
            echo "Users added successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Add Users: " . $e->getMessage();
        }