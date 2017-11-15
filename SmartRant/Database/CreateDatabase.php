<?php

        echo "<br>********* Create USER*********<br>";

        $rootUser = "root";
        $rootPass = "";
        $userName = "michael";
        $userPass = "1234"; //SHA1()
        $host = "localhost";

        try
        {
            $pdo = new PDO("mysql:host=$host",$rootUser, $rootPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE USER '$userName'@'$host' "
                    . "IDENTIFIED BY '$userPass';"
                    . "GRANT SELECT, INSERT, UPDATE, DELETE, CREATE ON *.* TO '$userName'@'$host';"
                    . "FLUSH PRIVILEGES;";
            $pdo->exec($sql);
            unset($pdo);
            echo "User created successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "User Create: " . $e->getMessage();
        }
        
                echo "<br>********* Create Database *********<br>";
        
        $rootUser = "root";
        $rootPass = "";
        $host = "localhost";  
        $dbname = "smartrant";
        
        try
        {
            $pdo = new PDO("mysql:host=$host", $rootUser, $rootPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE `$dbname`;"
               . "GRANT CREATE ON `$dbname`.* "
                    . "TO '$userName'@'$host';";

            $pdo->exec($sql);
            unset($pdo);
            echo "Database created successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Create Database: " . $e->getMessage();
        }