<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ .'/../models/user.models.php';
class Coach extends User{
    private $tableCoach = 'coach';
    private string $biographie;
    private string $photo;
    private int $annees_experiance;
    private string $certification;

    // getters 
    public function getBoi(){
        return $this->biographie;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getAnnee(){
        return $this->annees_experiance;
    }
    public function getCertif(){
        return $this->certification;
    }

    // setters
    public function setBoi(string $bio){
        $this->biographie=$bio;
    }
    public function setPhoto(string $img){
        $this->photo=$img;
    }
    public function setAnne(int $anne){
        $this->annees_experiance =$anne;
    }
    public function setCertif(string $certi)  {
        $this->certification=$certi;
    }

    public function addCoach(){
        $this->setRole(2);
        $this->signupUser();

        $user_id =$this->conn->lastInsertId();

        $sql = "INSERT INTO {$this->tableCoach}(id_coach,biographie,photo,annees_experiance,certification)
                Values(:id_coach,:biographie,:photo,:annees_experiance,:certification)";
        $res= $this->conn->prepare($sql);
        return $res->execute([
            'id_coach'=>$user_id,
            'biographie'=>$this->biographie,
            'photo'=>$this->photo,
            'annees_experiance'=>$this->annees_experiance,
            'certification'=>$this->certification,
        ]);
    }

    public function getAllCoach(){
        $sql = "SELECT CONCAT(u.nom,' ',u.prenom) as fullname , co.*  FROM user u inner JOIN {$this->tableCoach} co ON u.id = co.id_coach";
        $res = $this->conn->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCoachById($id){
        $sql = "SELECT CONCAT(u.nom,' ',u.prenom) as fullname , co.*  FROM user u inner JOIN {$this->tableCoach} co ON u.id = co.id_coach where u.id = :id";
        $res = $this->conn->prepare($sql);
        $res->execute([
            'id'=>$id
        ]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

}