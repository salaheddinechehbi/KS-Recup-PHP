<?php

include_once 'connection/Connection.php';
include_once 'dao/ICrud.php';

class UserService implements ICrud {
    
    private $conn;
    
    function __construct() {
        $this->conn = new Connection();
    }

    public function create($obj) {
        $query = "INSERT INTO user VALUES(NULL,?,?,?)";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$obj->getName(),$obj->getEmail(),$obj->getPass()]) or die('inser error');
    }

    public function delete($id) {
        $query = "DELETE FROM user WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
    }

    
    public function findAll() {
        $query = 'SELECT * FROM user ORDER BY id DESC';
        $req = $this->conn->getConn()->query($query);
        $users = $req->fetchAll();
        return $users;
    }

    public function findById($id) {
        $query = "SELECT * FROM user WHERE id = ?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
        return $req->fetch();
    } 
    
    public function findUser($email,$pass) {
        $query = "SELECT * FROM user WHERE email = ? AND pass = ?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$email,$pass]);
        return $req->fetch();
    } 

    public function update($obj) {
        
    }
    
    public function updateU($id,$name,$email,$pass) {
        $query = "UPDATE user SET name=?,email=?,pass=? WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$name,$email,$pass,$id]);
    }

}
