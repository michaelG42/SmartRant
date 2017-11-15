<?php

class Article {

    private $id, $userName, $title, $category, $body, $comments, $rating, $imgLink, $date, $tags;

    function __construct($id, $userName, $title, $category, $body, $comments, $rating, $imgLink, $tags) {
        $this->id = $id;
        $this->userName = $userName;
        $this->title = $title;
        $this->category = $category;
        $this->body = $body;
        $this->comments = $comments;
        $this->rating = $rating;
        $this->imgLink = $imgLink;
        $this->date = date("Y-m-d h:i:sa");
        $this->tags = $tags;
    }

    function getCategory() {
        return $this->category;
    }

    function getTags() {
        return $this->tags;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setImgLink($imgLink) {
        $this->imgLink = $imgLink;
    }

    function getId() {
        return $this->id;
    }

    function getUserName() {
        return $this->userName;
    }

    function getBody() {
        return $this->body;
    }

    function getTitle() {
        return $this->title;
    }

    function getDate() {
        return $this->date;
    }

    function getImgLink() {
        return $this->imgLink;
    }

    function getComments() {
        return $this->comments;
    }

    function getRating() {
        return $this->rating;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }

}
