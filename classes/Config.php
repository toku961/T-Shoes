<?php

class Config{
    //set hte properties for the connection details
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "portfolio";

    protected $conn;

    //create a constructor to automatically connct to the database
    public function __construct()
    {
        $conn = new mysqli($this->servername,$this->username,$this->password,$this->database);

        if($conn->connect_error)
        {
            die("Connect Error: " .$conn->connect_error);
        }

        //set the connection as aglobal variable
        $this->conn = $conn;
    }
}
