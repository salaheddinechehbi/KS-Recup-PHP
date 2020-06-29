<?php 

/**
 *
 * @author Salah Eddine Chehbi
 */
interface ICrud {
    //put your code here
    
    public function create($obj);
    public function update($obj);
    public function delete($obj);
    public function findById($id);
    public function findAll();
}
