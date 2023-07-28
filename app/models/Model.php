<?php
namespace models;
use mysqli;

class Model {

    protected $conn;

    protected $table = null;
    protected $fields = [];
    

    public function __construct() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamercat";

        global $conn;
        $conn = new mysqli($server, $username, $password, $dbname);
        $this->conn = $conn;

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }      
    }
    

}