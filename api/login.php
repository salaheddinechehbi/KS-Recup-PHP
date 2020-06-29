<?php

chdir('..');
include_once 'services/UserService.php';
include_once 'classes/User.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $us = new UserService();
    
    $email = $_POST['emailU']; 
    $pass = $_POST['passU']; 
    $_SESSION['emailU'] = $_POST['emailU'];
    
    
    //header("location:http://localhost/work_ks/pc/admin/index.php");
    
    
    header('Content-type: application/json');

    echo json_encode($us->findUser($email,$pass));

}
