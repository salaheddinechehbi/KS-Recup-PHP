<?php

chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $os = new OperationService();
    
    $libelle = $_POST['libelle'];
    $nbrJours = $_POST['nbrJ'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    
    if($_POST['btn'] == "Ajouter"){
        $operation = new Operation($libelle, $adresse, $ville, $dateDebut, $dateFin, $nbrJours);
        $os->create($operation);
    }else if($_POST['btn'] == "Modifier"){
        $id = $_POST['id'];
        $os->updateO($id, $libelle, $adresse, $ville, $dateDebut, $dateFin, $nbrJours);
    }
    
    header('Content-type: application/json');

    echo json_encode($os->findAll());

}


