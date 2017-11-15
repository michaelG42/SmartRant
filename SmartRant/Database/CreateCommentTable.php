<?php

require_once '../Database/database.php';
        try
        {
            $sql = 'CREATE TABLE comments(
                    id int unsigned not null auto_increment,
                    username VARCHAR(48) not null,
                    body VARCHAR(2400) not null,
                    date VARCHAR(48) not null,
                    articleId int not null,
                    primary key(id)
                     )';

            $db->exec($sql);
            unset($db);
            echo "acomments table created successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Create Table: " . $e->getMessage();
        }