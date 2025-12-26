<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/reservation.models.php';

class AnullerSeances_controleur{
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }
    public function refuserSeance($id_seances){
        $refuser = new Reservation_models($this->conn);
        $refuser->updateStatusSeances( $id_seances, 3);
    }
}

$db = new Connect();
$dbb = $db->dbconnect();
$ann = new AnullerSeances_controleur($dbb);
$id_seances = $_GET['id'];

$ann->refuserSeance($id_seances);
header('Location: coach_dash.controleur.php?seance=refuser');
exit;
