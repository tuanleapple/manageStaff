<?php

class DB{

    public $con;
    protected $servername = "127.0.0.1";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "angle_devilstore";

    function __construct(){
       
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->exec('set names utf8');
    
    }

}

?>