<?php

chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $os = new OperationService();
    
    $id = $_POST['id'];
    $os->delete($id);    
    
    header('Content-type: application/json');

    echo json_encode($os->findAll());

}

