<?php

class User {

    private $id, $userName, $password, $email, $imgLink;

    function __construct($id = Null, $userName = "", $password = "", $email = "", $imgLink = "") 
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->imgLink = $imgLink;
    }

    function getId() {
        return $this->id;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getImgLink() {
        return $this->imgLink;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setImgLink($imgLink) {
        $this->imgLink = $imgLink;
    }

    public function __toString() {
        return "$this->id, $this->userName, $this->email";
    }

}
