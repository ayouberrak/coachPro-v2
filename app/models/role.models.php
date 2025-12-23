<?php

require_once __DIR__ . '/../config/config.php';

class Roles{
    private PDO $conn;
    private string $tableRole = 'role';


    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getAllRoles(){
        $sql = "SELECT * FROM {$this->tableRole}";
        $res = $this->conn->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}