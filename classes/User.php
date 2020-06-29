<?php


class User {
    
    private $id;
    private $name;
    private $email;
    private $pass;
    
    function __construct($name, $email, $pass) {
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPass() {
        return $this->pass;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }


    
}
