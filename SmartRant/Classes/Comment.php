<?php

class Comment {

    private $id, $userName, $body, $date, $articleId;

    function __construct($id, $userName, $body, $articleId) {
        $this->id = $id;
        $this->userName = $userName;
        $this->body = $body;
        $this->date = $this->date = date("Y-m-d h:i:sa");
        $this->articleId = $articleId;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setbody($body) {
        $this->body = $body;
    }

    function setDate($date)
    {
         $this->date = $date;
    }
    function setArticleId($articleId) {
        $this->articleId = $articleId;
    }

        function getId() {
        return $this->id;
    }

    function getUserName() {
        return $this->userName;
    }

    function getbody() {
        return $this->body;
    }

    function getDate() {
        return $this->date;
    }

    function getArticleId() {
        return $this->articleId;
    }



}
