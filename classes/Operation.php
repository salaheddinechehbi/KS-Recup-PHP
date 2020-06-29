<?php


class Operation{
    
    private $id;
    private $libelle;
    private $adresse;
    private $ville;
    private $dateDebut;
    private $dateFin;
    private $nbrJours;
    
    function __construct($libelle, $adresse, $ville, $dateDebut, $dateFin, $nbrJours) {
        $this->libelle = $libelle;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->nbrJours = $nbrJours;
    }
    
    function getId() {
        return $this->id;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getVille() {
        return $this->ville;
    }

    function getDateDebut() {
        return $this->dateDebut;
    }

    function getDateFin() {
        return $this->dateFin;
    }

    function getNbrJours() {
        return $this->nbrJours;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    function setNbrJours($nbrJours) {
        $this->nbrJours = $nbrJours;
    }


    
}

