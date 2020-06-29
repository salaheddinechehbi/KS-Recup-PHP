<?php

chdir('..');
include_once 'services/OperationService.php';
include_once 'classes/Operation.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){
   
    $os = new OperationService();
    $year = $_GET['year'];
    
    header('Content-type: application/json');

    echo json_encode($os->findAllE($year));

}
