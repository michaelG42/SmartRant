<?php

require_once '../Database/database.php';
        echo "<br>********* Add Article *********<br>";
         $rand = rand(0, 5);
         $categorys = array("Science", "Health", "Technology", "Engineering");
         $titles = array("How to survive College", "Put down That axe", "Walking is bad for you souls", "Chuck Norris Can delete the reciclying bin", "Im running out of titles");
         $names = array("mike", "ryan", "steph", "Nial", "Jesus", "Santa");
         
         $body = "Is a world population of 6 billion too many? Compare that with animals."
                 . " There are more than a million animal species. There are 6,000 species of reptiles,"
                 . " 73,000 kinds of spiders, and 3,000 types of lice. For each person there is about 200 million insects."
                 . " The 4,600 kinds of mammals represent a mere 0,3% of animals and the 9000 kinds of birds only 0,7%. The most numerous bird "
                 . "specie is the red-billed quelea of southern Africa. There are an estimated 100 trillion of them.";
        try
        {         

                        
            $sql = "INSERT INTO articles(id, username, title, category, body, date, comments, rating, imgLink )"
                    . "VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            
            $array = array(NULL, $names[array_rand($names)], $titles[array_rand($titles)], $categorys[array_rand($categorys)] , $body, "29/04/2017", 1, $rand, "ArticleImages/Default.png");
            $stmt->execute($array);

            unset($db);
            echo "Article added successfully!<br>";
        }
        catch(PDOException $e)
        {
            echo "Add Article: " . $e->getMessage();
        }