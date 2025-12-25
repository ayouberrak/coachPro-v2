<?php
require_once __DIR__ . '/../config/config.php';

class Reservation_models
{
    private PDO $conn;
    private string $tableS  ='seances';
    private  $debut;
    private int $duree;
    private int $id_client;
    private int $id_status;
    private int $id_coach;
    private int $id_sport;

    private  $date_seances;

    // Getter & Setter for debut
    public function getDebut()
    {
        return $this->debut;
    }

    public function setDebut($debut)
    {
        $this->debut = $debut;
    }

    // Getter & Setter for duree
    public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree(int $duree)
    {
        $this->duree = $duree;
    }

    // Getter & Setter for id_client
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient(int $id_client)
    {
        $this->id_client = $id_client;
    }

    // Getter & Setter for id_status
    public function getIdStatus()
    {
        return $this->id_status;
    }

    public function setIdStatus(int $id_status)
    {
        $this->id_status = $id_status;
    }

    // Getter & Setter for id_coach
    public function getIdCoach()
    {
        return $this->id_coach;
    }

    public function setIdCoach(int $id_coach)
    {
        $this->id_coach = $id_coach;
    }

    // Getter & Setter for id_sport
    public function getIdSport()
    {
        return $this->id_sport;
    }

    public function setIdSport(int $id_sport)
    {
        $this->id_sport = $id_sport;
    }

    // Getter & Setter for Date Seances

    public function getDateSeances()
    {
        return $this->date_seances;
    }

    public function setDateSeances( $date_seances)
    {
        $this->date_seances = $date_seances;
    }


    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertSeances(){
        $sql = "INSERT INTO {$this->tableS}(debut,duree,id_client,id_coach,id_status,id_sport,date_seances)
                VALUES(:debut,:duree,:id_client,:id_coach,:id_status,:id_sport,:date_seances)";
        $res = $this->conn->prepare($sql);
        return $res->execute([
            'debut'=>$this->debut,
            'duree'=>$this->duree,
            'id_client'=>$this->id_client,
            'id_coach'=>$this->id_coach,
            'id_status'=>$this->id_status,
            'id_sport'=>$this->id_sport,
            'date_seances'=>$this->date_seances
        ]);
    }
    public function getSeancesByClient($id_client){
        $sql = "SELECT CONCAT(u.nom,' ',u.prenom) AS fullname,c.* , s.* , st.type_status, st.style, sp.type FROM seances s 
                INNER JOIN user u ON u.id = s.id_coach 
                INNER JOIN status st ON st.id_status = s.id_status 
                INNER JOIN sport sp ON sp.id_sport = s.id_sport 
                INNER JOIN coach c ON c.id_coach=u.id  WHERE s.id_client=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'=>$id_client
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function anulleSeances($status,$id_secances) {
        $sql = "UPDATE seances SET id_status = :status where id_secances =:id_secances";
        $res = $this->conn ->prepare($sql);
        return $res->execute([
            'status'=>$status,
            'id_secances'=>$id_secances
        ]);
    }

    public function updateSeances($id_seances){
        $sql = "UPDATE {$this->tableS} 
                    SET debut = :debut,
                     duree = :duree,
                     id_sport = :id_sport,
                     date_seances = :date_S
                    where id_secances = :id";
        $res= $this->conn->prepare($sql);
        return $res->execute([
                'debut'=>$this->debut,
                'duree'=>$this->duree,
                'id_sport'=>$this->id_sport,
                'date_S'=>$this->date_seances,
         
                'id'=>$id_seances
            ]);
    }
    public function getSeanceById($id_secances){
        $sql = "SELECT s.* , sp.type , concat(c.nom,c.prenom) as fullname,co.*  FROM seances s 
                INNER JOIN sport sp ON sp.id_sport = s.id_sport  
                INNER JOIN user c ON c.id = s.id_coach
                INNER JOIN coach co ON c.id = co.id_coach
                WHERE id_secances = :id_secances";
        $res = $this->conn->prepare($sql);
        $res->execute([
            'id_secances'=>$id_secances
        ]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public function getTousSeancesPourCoach($id_coach){
        $sql = "SELECT CONCAT(u.nom,' ',u.prenom) as fulnameClient ,
                CONCAT(s.date_seances,' ',s.debut) as dateandtime,s.duree ,
                sp.type , st.type_status , st.style  From user u 
                INNER JOIN seances s ON s.id_client = u.id
                INNER JOIN sport sp ON sp.id_sport = s.id_sport
                INNER JOIN status st ON st.id_status = s.id_status
                WHERE  s.id_coach =:id ";
        $res = $this->conn->prepare($sql);
        $res->execute([
            'id'=>$id_coach,
        ]);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getseancesEnatt($id_coach , $ids){
        $sql = "SELECT CONCAT(u.nom,' ',u.prenom) as fulnameClient ,
                CONCAT(s.date_seances,' ',s.debut) as dateandtime,s.id_secances, 
                sp.type , st.type_status  From user u 
                INNER JOIN seances s ON s.id_client = u.id
                INNER JOIN sport sp ON sp.id_sport = s.id_sport
                INNER JOIN status st ON st.id_status = s.id_status
                WHERE s.id_status = :idS and s.id_coach =:id ";
        $res = $this->conn->prepare($sql);
        $res->execute([
            'id'=>$id_coach,
            'idS'=>$ids
        ]);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateStatusSeances($id_secances,$status){
        $sql = "UPDATE seances SET id_status = :status where id_secances =:id_secances";
        $res =$this->conn->prepare($sql);
        return $res->execute([
            'status'=>$status,
            'id_secances'=>$id_secances
        ]);
    }

    public function updateAllSeancesTerminer(){
        $sql = "
            UPDATE seances 
            SET id_status = 8 
            WHERE date_seances <= NOW()
            AND id_status != 8
        ";

        $rtes= $this->conn->prepare($sql);
        return $rtes->execute();
    }
    public function updateSeancesEnattente($id_secances){
        $sql = "UPDATE seances SET id_status = 9 where id_secances =:id_secances AND id_status = 5";
        $res = $this->conn->prepare($sql);
        return $res->execute([
            'id_secances'=>$id_secances
        ]);
    }



    
}