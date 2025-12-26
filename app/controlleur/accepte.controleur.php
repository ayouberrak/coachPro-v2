<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/reservation.models.php';

class accepte_controleur
{    
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function confirmerSeance($id_seances){
        $confirmer = new Reservation_models($this->conn);
        $confirmer->updateStatusSeances( $id_seances, 2);
    }  
}
$db = new Connect();
$dbb = $db->dbconnect();
$accepte = new accepte_controleur($dbb);
$id_seances = $_GET['id'];
$accepte->confirmerSeance($id_seances);
header('Location: coach_dash.controleur.php?seance=confirmer');
exit;