<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/coach.models.php';
require_once __DIR__ . '/../models/reservation.models.php';

class Reservation_controleur{
    private PDO $conn ;
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getcoach($method){
        $id = $method['id'];
        $coach = new Coach($this->conn);
        return $coach->getAllCoachById($id);
    }
    public function checkRole(int $role){
   
        if (empty($_SESSION['user_id']) || empty($_SESSION['user_role']) || $_SESSION['user_role'] !== $role) {
            header('Location: ../controlleur/login.controleur.php');
            exit;
        }
    }

    public function insertSeancesControlleur($method,$id_coach,$id_client) {
        $reservation = new Reservation_models($this->conn);
        $reservation->setDateSeances($method['dateDebut']);
        $reservation->setDebut($method['heure_debut']);
        $reservation->setDuree($method['durre']);
        $reservation->setIdClient($id_client);
        $reservation->setIdCoach($id_coach);
        $reservation->setIdSport($method['sport_id']);
        $reservation->setIdStatus(1);
        return $reservation->insertSeances();
    }

}

$db = new Connect();


$dbb = $db->dbconnect();

$allCoach = new Reservation_controleur($dbb);

$allCoach->checkRole(1);
$res = $allCoach->getcoach($_GET);
$id_coach= $res['id_coach'];
$id_client = $_SESSION['user_id'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($allCoach->insertSeancesControlleur($_POST,$id_coach,$id_client)){
        header("Location: reservation.controleur.php?id=$id_coach&reserv=yes");
    }else{
         header("Location: reservation.controleur.php?id=$id_coach&reserv=nom");
    }
}

require_once __DIR__ .'/../views/reservation.view.php';