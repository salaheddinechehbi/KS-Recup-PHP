<?php
set_time_limit(0);

class Connection {

    private $conn;
    
    private $connextion;
    
    public function __construct() {
        
        
	$conf= array
        (
          'host'     => 'localhost', 
          'database' => 'ks_recup',
          'login'    => 'root',
          'password' => ''
        );
        try {
            $this->conn=new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password']);
	    $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          
            $this->conn->query("SET NAMES UTF8");
          
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } 
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    function getConn() {
        return $this->conn;
    }

}


