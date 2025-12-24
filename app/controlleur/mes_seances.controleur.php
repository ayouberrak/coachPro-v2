<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ .'/../models/reservation.models.php';
class Mes_seances_controleur{
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }
    public function getSeacnces($id_client){
        $get =new Reservation_models($this->conn);
        return $get->getSeancesByClient($id_client);
    }
    
}
$db = new Connect();
$dbb = $db->dbconnect();

$seances = new Mes_seances_controleur($dbb);

$seancesF = $seances->getSeacnces($_SESSION['user_id']);

require_once __DIR__ . '/../views/mes_seances.view.php';

