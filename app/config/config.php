<?php

class Connect {
    private $host;
    private $dbname;
    private $user;
    private $pass; 
    private $conn;

    public function __construct() {
        $env = parse_ini_file(__DIR__ . '/../../.env');

        $this->host = $env['DB_HOST'];
        $this->dbname = $env['DB_NAME'];
        $this->user = $env['DB_USER'];
        $this->pass = $env['DB_PASS'];
    }

    public function dbconnect(){
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
                    $this->user,
                    $this->pass
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                error_log("Database error: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}
