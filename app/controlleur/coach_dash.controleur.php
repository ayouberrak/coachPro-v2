<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/reservation.models.php';



class Coach_dash_controleur{
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getSeacnces($id_coach){
        $get =new Reservation_models($this->conn);
        return $get->getTousSeancesPourCoach($id_coach);
    }
    public function getseancesEnatt($id_coach){
        $get =new Reservation_models($this->conn);
        return $get->getseancesEnatt($id_coach , 1);
    }
    public function getseancesConfirmer($id_coach ){
        $get =new Reservation_models($this->conn);
        return $get->getseancesEnatt($id_coach , 2);
    }

}

$db = new Connect();
$dbb = $db->dbconnect();

$coachDash = new Coach_dash_controleur($dbb);
$allSeances = $coachDash->getSeacnces($_SESSION['user_id']);
$seancesEnatt = $coachDash->getseancesEnatt($_SESSION['user_id']);
$seancesConfirmer = $coachDash->getseancesConfirmer($_SESSION['user_id']);

require_once __DIR__ . '/../views/coach_dash.view.php';
