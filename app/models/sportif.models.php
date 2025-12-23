<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ .'/../models/user.models.php';

class Sportif extends User{
    private string $tableClient ='client';
    private int $id_client;
    private int $telephone;

    // getters
    public function getIdClient(){
        return $this->id_client;
    }
    public function getTele(){
        return $this->telephone;
    }

    // setters
    public function setIdClient(int $id_client){
        $this->id_client = $id_client;
    }
    public function setTele(int $tele){
        $this->telephone = $tele;
    }



    public function addClient(){ 
        $this->setRole(1);
        $this->signupUser();

        $userId = $this->conn->lastInsertId(); 


        $sql= "INSERT INTO {$this->tableClient}(id_client,telephone)
                VALUES(:id,:tele)";
        $res = $this->conn->prepare($sql);
        return $res->execute([
            'id'=>$userId,
            'tele'=>$this->telephone
        ]);
    }

}