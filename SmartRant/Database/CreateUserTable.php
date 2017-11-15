<?php

        $host = "localhost";
        $userName = "michael";
        $userPass = "1234"; //SHA1()
        $dbname = "smartrant";
        
        try
        {
            $pdo = new PDO("mysql:dbname=$dbname;host=$host",
                    $userName, $userPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE users(
                    id int unsigned not null auto_increment,
                    userName VARCHAR(24) not null,
                    password VARCHAR(24) not null,
                    email VARCHAR(24) not null,
                    imgLink VARCHAR(24) not null,
                    primary key(id)
                     )";

            $pdo->exec($sql);
            unset($pdo);
            echo "Table created successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Create Table: " . $e->getMessage();
        }