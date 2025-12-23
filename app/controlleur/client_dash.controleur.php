<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/coach.models.php';

class Client_dash_controleur{
    private PDO $conn ;
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function getcoach(){
        $coach = new Coach($this->conn);
        return $coach->getAllCoach();
    }

}
$db = new Connect();


$dbb = $db->dbconnect();

$allCoach = new Client_dash_controleur($dbb);

$res = $allCoach->getcoach();


require_once __DIR__ .'/../views/client_dash.view.php';