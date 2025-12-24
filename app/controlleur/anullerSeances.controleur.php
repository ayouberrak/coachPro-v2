<?php
session_start();
require_once __DIR__ . '/../config/config.php';

require_once __DIR__ . '/../models/reservation.models.php';


class AnullerSeances_controleur{
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }


    public function anullerSeances($id_status,$id_seances){
        $annuler = new Reservation_models($this->conn);
        $annuler->anulleSeances( $id_status, $id_seances);
    }
}
$db = new Connect();
$dbb = $db->dbconnect();

$ann = new AnullerSeances_controleur($dbb);
$id_seances = $_GET['id'];

$ann->anullerSeances(5,$id_seances);
    header('Location: mes_seances.controleur.php?seances=canceled');
    exit;

