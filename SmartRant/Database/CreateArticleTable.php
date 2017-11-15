<?php

require_once '../Database/database.php';
    try
    {
        $sql = 'CREATE TABLE articles(
                id int unsigned not null auto_increment,
                username VARCHAR(48) not null,
                title VARCHAR(48) not null,
                category VARCHAR(24) not null,
                body VARCHAR(2400) not null,
                date VARCHAR(48) not null,
                comments bit not null,
                rating FLOAT(1)not null,
                imgLink VARCHAR(48) not null,
                tags VARCHAR(48),
                primary key(id)
                 )';

        $db->exec($sql);
        unset($db);
        echo "articles table created successfully!<br>";
    }
    catch(PDOException $e)
    {
        echo "Create Table: " . $e->getMessage();
    }