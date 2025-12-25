<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ .'/../config/config.php';
require_once __DIR__ .'/../models/reservation.models.php';


class UpdateSeances_controleur{
    private PDO $conn;


    public function __construct(PDO $db) {
        $this->conn = $db;
    }


    public function afficher($id_secances){
        $seancess = new Reservation_models($this->conn);
        return $seancess->getSeanceById($id_secances);
    }
    public function update($method,$id_seances){
        $update = new Reservation_models($this->conn);
        $update->setDateSeances($method['dateDebut']);
        $update->setDebut($method['heure_debut']);
        $update->setDuree($method['durre']);
        $update->setIdSport($method['sport_id']);
        if($update->updateSeances($id_seances)){
            header('Location: mes_seances.controleur.php?modification=yes');
        }else{
            header('Location: updateSeances.controleur.php?modification=nom');
        };
    }
}
$id_S = $_GET['id'];
$db = new Connect();
$dbb = $db->dbconnect();

$update = new UpdateSeances_controleur($dbb);

$senacesUp =$update->afficher($id_S);
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $update->update($_POST,$id_S);
}

require_once __DIR__ .'/../views/updateSeances.view.php';