<?php
namespace App\Database\Config;

class Connection {
    private $DBServerName = 'localhost';
    private $DBUserName = 'root';
    private $DBPassword = '';
    private $DBDatabaseName = 'php_ecommerce';
    private $DBPort = 3307;
    private $conn;
    public function __construct() {
        $this->conn = new \mysqli($this->DBServerName,$this->DBUserName,$this->DBPassword,$this->DBDatabaseName,$this->DBPort);
        // if ($this->conn->connect_error) {
        //     die("Connection failed: " . $this->conn->connect_error);
        // }
        // die("connection successfully");
    }
    public function __destruct() {
        $this->conn->close();
    }
}
