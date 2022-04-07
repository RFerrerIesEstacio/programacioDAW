<?php 

class DbModel{
    
    protected Database $db;

    function __construct(){
        $this->db = new Database();
    }
    
    function connectToDb(){
        return $this->db->connect();
    }    
    
}