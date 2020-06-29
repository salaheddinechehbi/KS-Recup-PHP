<?php

include_once 'connection/Connection.php';
include_once 'dao/ICrud.php';

class OperationService implements ICrud {
    
    private $conn;
    
    function __construct() {
        $this->conn = new Connection();
    }

    public function create($obj) {
        $query = "INSERT INTO operation VALUES(NULL,?,?,?,?,?,?)";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$obj->getLibelle(),$obj->getAdresse(),$obj->getVille(),$obj->getDateDebut(),$obj->getDateFin(),$obj->getNbrJours()]) or die('inser error');
    }

    public function delete($id) {
        $query = "DELETE FROM operation WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
    }

    
    public function findAll() {
        $query = 'SELECT * FROM operation ORDER BY id DESC';
        $req = $this->conn->getConn()->query($query);
        $operations = $req->fetchAll();
        return $operations;
    }
    
    public function findAll10() {
        $query = 'SELECT * FROM operation ORDER BY id DESC LIMIT 10';
        $req = $this->conn->getConn()->query($query);
        $operations = $req->fetchAll();
        return $operations;
    }

    public function findById($id) {
        $query = "SELECT * FROM operation WHERE id = ?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$id]);
        return $req->fetch();
    }
    
    public function findAllD() {
        $query = 'SELECT COUNT(*) as "oper",monthname(dateDebut) as "mois", year(dateDebut) as "year" FROM operation GROUP by month(dateDebut)';
        $req = $this->conn->getConn()->query($query);
        $operations = $req->fetchAll();
        return $operations;
    }
    
    public function findAllY($year) {
        $query = 'SELECT COUNT(*) as "oper",monthname(dateDebut) as "mois" FROM operation WHERE year(dateDebut) =' .$year . ' GROUP by month(dateDebut)';
        $req = $this->conn->getConn()->query($query);
        $req->execute();
        $operations = $req->fetchAll();
        return $operations;
    }
    
    public function findAllV() {
        $query = 'SELECT COUNT(*) as "oper", ville FROM operation GROUP by ville';
        $req = $this->conn->getConn()->query($query);
        $operations = $req->fetchAll();
        return $operations;
    }

    public function update($obj) {
        
    }
    
    public function updateO($id,$libelle,$adresse,$ville,$dateDebut,$dateFin,$nbrJours) {
        $query = "UPDATE operation SET libelle=?,adresse=?,ville=?,dateDebut=?,dateFin=?,nbrJours=? WHERE id=?";
        $req = $this->conn->getConn()->prepare($query);
        $req->execute([$libelle,$adresse,$ville,$dateDebut,$dateFin,$nbrJours,$id]);
    }
    
    public function findAllE($year) {
        $query = 'SELECT SUM(nbrJours) as "sumNbrJours", monthname(dateDebut) as "mois" FROM operation WHERE year(dateDebut) = ' .$year . ' GROUP by month(dateDebut)';
        $req = $this->conn->getConn()->query($query);
        $operations = $req->fetchAll();
        return $operations;
    }

}
  