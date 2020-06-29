<?php

chdir('..');
include_once 'services/RecuperationService.php';
include_once 'classes/Recuperation.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $rs = new RecuperationService();
    
    $id = $_POST['id'];
    $rs->delete($id);    
    
    header('Content-type: application/json');

    echo json_encode($rs->findAllJ());

}

