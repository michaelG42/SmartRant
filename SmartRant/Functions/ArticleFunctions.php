<?php

require_once 'Classes/Article.php';

class ArticleFunctions {

function createArticle($db, $article) {
    try {
        $sql = "INSERT INTO articles(id, username, title, category, body, date, comments, rating, imgLink, tags)"
                . "VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);

        $array = array(NULL,
            $article->getUserName(),
            $article->getTitle(),
            $article->getCategory(),
            $article->getBody(),
            $article->getDate(),
            $article->getComments(),
            $article->getRating(),
            $article->getImgLink(),
            $article->getTags());

        $stmt->execute($array);
        $last_id = $db->lastInsertId();

        $this->createRating($db, $last_id);
        unset($db);
    } catch (PDOException $e) {
        echo "Add Article: " . $e->getMessage();
    }
}

function createRating($db, $id) {
    try {
        $sql = "INSERT INTO rating(articleId, oneStar, twoStar, threeStar, fourStar, fiveStar)"
                . "VALUES(?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);

        $array = array($id, 0, 0, 0, 0, 0);
        $stmt->execute($array);

        unset($db);
        echo "Rating added successfully!<br>";
    } catch (PDOException $e) {
        echo "Add Rating: " . $e->getMessage();
    }
}

function updateRating($db, $id, $star) {
    try {
        $query = "UPDATE rating SET  $star  =  $star +1 WHERE articleId = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function getAvgRating($db, $id) {

    try {
        $query = "SELECT * FROM rating WHERE articleId = $id";

        $results = $db->query($query);
        $row = $results->fetch();

        $oneStar = $row['oneStar'];
        $twoStar = $row['twoStar'];
        $threeStar = $row['threeStar'];
        $fourStar = $row['fourStar'];
        $fiveStar = $row['fiveStar'];

        $totalVotes = $fiveStar + $fourStar + $threeStar + $twoStar + $oneStar;

        $rating = 5 * $fiveStar +
                4 * $fourStar +
                3 * $threeStar +
                2 * $twoStar +
                1 * $oneStar;

        $avgRating = $rating / $totalVotes;
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $avgRating;
}

function updateArticleRating($db, $id, $rating) {
    try {
        $query = "UPDATE articles SET rating = :rating WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':rating', $rating);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function getArticleObjs($results) {
    $articleArray = array();
    foreach ($results as $article) {
        $id = $article["id"];
        $userName = $article["username"];
        $title = $article["title"];
        $category = $article["category"];
        $body = $article["body"];
        $date = $article["date"];
        $comments = $article["comments"];
        $rating = $article["rating"];
        $imgLink = $article["imgLink"];
        $tags = $article["tags"];
        $a = new Article($id, $userName, $title, $category, $body, $comments, $rating, $imgLink, $tags);
        $a->setDate($date);

        $a->setBody($this->findLink($body));
        $articleArray[] = $a;
    }

    return $articleArray;
}

function filterArticle(&$body) {
    foreach ($FILTERED_WORDS as $words) {
        $regEx = '/^$words$i/';
        if (preg_match($regEx, $body)) {
            return preg_replace($regEx, '****', $body);
        } else {
            return $body;
        }
    }
    return $body;
}

function findLink($body) {

    $regEx = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

    if (preg_match($regEx, $body, $match)) {
        return preg_replace($regEx, '<a href="' . $match[0] . '">' . $match[0] . '</a>', $body);
    } else {
        return $body;
    }
}

function getArticlebyId($id) {
    try {

        include('Database/database.php');

        $sql = "SELECT * FROM articles WHERE id = '$id'";
        $results = $db->query($sql);
        $article = $results->fetch();

        $userName = $article["username"];
        $title = $article["title"];
        $category = $article["category"];
        $body = $article["body"];
        $date = $article["date"];
        $comments = $article["comments"];
        $rating = $article["rating"];
        $imgLink = $article["imgLink"];
        $tags = $article["tags"];

        $a = new Article($id, $userName, $title, $category, $body, $comments, $rating, $imgLink, $tags);
        $a->setDate($date);
        $a->setId($id);
        $a->setBody($this->findLink($body));
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $a;
}

function getTopArticles() {
    try {
        include('Database/database.php');
        $sql = "SELECT * FROM articles ORDER BY rating DESC LIMIT 10";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getArticlesByCategory($category) {
    try {
        include('Database/database.php');
        $sql = "SELECT * FROM articles WHERE category = '$category' ORDER BY rating DESC";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getArticlesByUserName($userName) {
    try {
        include('Database/database.php');
        $sql = "SELECT * FROM articles WHERE username = '$userName' ORDER BY rating DESC";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getNewestArticles() {
    try {
        include('Database/database.php');

        $sql = "SELECT * FROM articles ORDER BY date DESC LIMIT 5";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getArticlesBetweenDate($dateLo, $dateHi) {
    try {
        include('Database/database.php');
        $sql = "SELECT * FROM articles WHERE date >= '$dateLo' AND date <= '$dateHi'";
        $results = $db->query($sql)->fetchAll();
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
    return $results;
}

function getArticlesByKeyWord($keyWord) {

    include('Database/database.php');
    try {
        $sql = "SELECT * FROM articles WHERE body LIKE '%$keyWord%' ORDER BY rating DESC";
        $results = $db->query($sql)->fetchAll();
        return $results;
    } catch (PDOException $e) {
        echo "Exception : " . $e->getMessage();
    }
}

function getAllArticlesAdvanceSearch($dateLo, $dateHi, $categorys, $userName, $keyWords, $tags) {

    $articles = $this->getArticlesBetweenDate($dateLo, $dateHi);
    foreach ($categorys as $category) {
        if ($category != NUll) {
            $articles += $this->getArticlesByCategory($category);
        }
    }
    if ($userName != NULL) {
        $articles += $this->getArticlesByUserName($userName);
    }
    if ($keyWords != NULL) {

        foreach ($keyWords as $keyWord) {

            $articles += $this->getArticlesByKeyWord($keyWord);
        }
    }

    $articleObjs = $this->getArticleObjs($articles);
    return $this->removeDuplicates($articleObjs);
}

function removeDuplicates($articles) {
    $noDups = array();

    foreach ($articles as $article) {
        if (!in_array($article, $noDups)) {
            $noDups[] = $article;
        }
    }
    return $noDups;
}

function checkCategory($category, $article) {

    if (($article->getCategory() == $category)) {
        return true;
    } else {
        return false;
    }
}

function checkWord($word, $article) {
    if (stripos($article->getBody(), $word) !== false) {
        return true;
    } else {
        return false;
    }
}

function containsKeyWords($keyWords, $article) {
    
    foreach ($keyWords as $word) {
        if ($word != "") {
            if ($this->checkWord($word, $article)) {
                return true;
            }
        }
    }
    return false;
}

function checkCategorys($categorys, $article) {
    foreach ($categorys as $category) {

        if ($this->checkCategory($category, $article)) {
            return true;
        }
    }
    return false;
}

function checkTag($searchTag, $article) {
    $tagArray = $this->getTagsArray($article);

    foreach ($tagArray as $tag) {
        if ($searchTag == $tag) {
            return true;
        }
    }
    return false;
}

function checkTags($tags, $article) {
    $tagArray = array_filter(explode(' ', str_replace(',', ' ', $tags)));
    foreach ($tagArray as $tag) {
        if ($this->checkTag($tag, $article)) {
            return true;
        }
    }
    return false;
}

function getArticlesAdvanceSearch($dateLo, $dateHi, $categorys, $userName, $keyWords, $tags) {
    $articles = $this->getArticleObjs($this->getArticlesBetweenDate($dateLo, $dateHi));
    foreach ($articles as $i => $article) {

        if (!$this->checkCategorys($categorys, $article)) {
            unset($articles[$i]);
        }
        if ($userName != Null) {
            if ($article->getUserName() != $userName) {
                unset($articles[$i]);
            }
        }
        if ($keyWords != Null) {
            if (!$this->containsKeyWords($keyWords, $article)) {
                unset($articles[$i]);
            }
        }
        if ($tags != NULL) {
            if (!$this->checkTags($tags, $article)) {
                unset($articles[$i]);
            }
        }
    }
    return $articles;
}

function getTagsArray($article) {
    $tags = $article->getTags();
    $tagArray = array_filter(explode(' ', str_replace(',', ' ', $tags)));

    return $tagArray;
}
}