<?php

include_once 'connection/Connection.php';
include_once 'dao/ICrud.php';

class RecuperationService implements ICrud {
    
    private $conn;
    
    function __construct() {
        $this->conn = new Connection();
    }

    public function create($obj) {
        $query = "INSERT INTO recuperation VALUES(NULL,?,?,?)";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$obj->getNbrJours(),$obj->getOperation(),$obj->getEtat()]) or die('inser error');
    }

    public function delete($id) {
        $query = "DELETE FROM recuperation WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
    }

    
    public function findAll() {
        $query = 'SELECT * FROM recuperation ORDER BY id DESC';
        $req = $this->conn->getConn()->query($query);
        $recuperations = $req->fetchAll();
        return $recuperations;
    }
    
    public function findAllJ() {
        $query = 'SELECT r.id,r.etat,r.nbrJours,o.libelle as "oper" FROM recuperation r,operation o where r.operation = o.id ORDER BY id DESC';
        $req = $this->conn->getConn()->query($query);
        $recuperations = $req->fetchAll();
        return $recuperations;
    }

    public function findById($id) {
        $query = "SELECT * FROM recuperation WHERE id = ?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
        return $req->fetch();
    }
    
    public function findByVEtat() {
        $query = "SELECT * FROM recuperation WHERE etat =?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([1]);
        return $req->fetchAll();
    }
    
    public function findByNvEtat() {
        $query = "SELECT * FROM recuperation WHERE etat =?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([0]);
        return $req->fetchAll();
    }

    public function update($obj) {
        
    }
    
    public function updateU($id,$nbrJours,$operation,$etat) {
        $query = "UPDATE recuperation SET nbrJours=?,operation=?,etat=? WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$nbrJours,$operation,$etat,$id]);
    }

}
