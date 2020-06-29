<?php

chdir('..');
include_once 'services/OperationService.php';
include_once 'services/RecuperationService.php';
include_once 'classes/Recuperation.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $rs = new RecuperationService();
    $os = new OperationService();
    
    $operation = $_POST['operRecu'];
    $nbrJours = $_POST['nbrJ'];
    $etat = $_POST['etatRecu'];
    
    if($_POST['btn'] == "Ajouter"){
        $recup = new Recuperation($nbrJours, $operation, $etat);
        $rs->create($recup);
    }else if($_POST['btn'] == "Modifier"){
        $id = $_POST['id'];
        $rs->updateU($id, $nbrJours, $operation, $etat);
    }
    
    header('Content-type: application/json');

    echo json_encode($rs->findAllJ());

}


