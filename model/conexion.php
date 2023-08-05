<?php

class Conexion {
    protected $conexion;
    protected $dbname =  "to-do-list";
    private $host = "localhost";
    private $username = "root";
    private $password = "";

    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(PDOException $e){
            echo "Error conexion" . $e;
        }
    }
}
