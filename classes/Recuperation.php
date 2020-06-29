<?php


class Recuperation{
    
    
    private $id;
    private $nbrJours;
    private $operation;
    private $etat;
    
    function __construct($nbrJours, $operation, $etat) {
        $this->nbrJours = $nbrJours;
        $this->operation = $operation;
        $this->etat = $etat;
    }
    
    function getId() {
        return $this->id;
    }

    function getNbrJours() {
        return $this->nbrJours;
    }

    function getOperation() {
        return $this->operation;
    }

    function getEtat() {
        return $this->etat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNbrJours($nbrJours) {
        $this->nbrJours = $nbrJours;
    }

    function setOperation($operation) {
        $this->operation = $operation;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }



}

