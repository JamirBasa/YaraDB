<?php
class Connection{

    private $hostName = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "dentalfinder";

    protected $conn;

    function connect(){
        if($this->conn === null){
                $this->conn = new PDO("mysql:host=$this->hostName; dbname=$this->dbName", $this->dbUser, $this->dbPassword);
        }

        return $this->conn;
    }
}
?>