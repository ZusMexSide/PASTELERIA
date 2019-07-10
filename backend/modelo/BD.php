<?php

class BD {

    private $servername = "localhost";
    private $username = "root";
    private $password = "2511";
    private $database = "pasteleria";
    protected $conn;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}
