<?php

require_once '../Database/database.php';
        try
        {

            $sql = 'CREATE TABLE rating(
                    articleId int unsigned not null,
                    oneStar int unsigned not null,
                    twoStar int unsigned not null,
                    threeStar int unsigned not null,
                    fourStar int unsigned not null,
                    fiveStar int unsigned not null,
                    primary key(articleId)
                     )';

            $db->exec($sql);
            unset($db);
            echo "Rating table created successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Create Table: " . $e->getMessage();
        }