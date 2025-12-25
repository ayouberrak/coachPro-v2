<?php
require_once __DIR__ . "/../config/config.php";

class Disponibilite {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insert($id_coach, $jour, $heures_debut, $heures_fin) {
        $sql = "INSERT INTO disponible (id_coach, jour, heures_debut, heures_fin)
                VALUES (:id_coach, :jour, :heures_debut, :heures_fin)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_coach'    => $id_coach,
            'jour'         => $jour,
            'heures_debut' => $heures_debut,
            'heures_fin'   => $heures_fin
        ]);
    }


    public function getAllByCoach($id_coach) {
        $sql = "SELECT * FROM disponible WHERE id_coach = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_dispo) {
        $sql = "SELECT * FROM disponible WHERE id_dispo = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_dispo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id_dispo) {
        $sql = "DELETE FROM disponible WHERE id_dispo = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id_dispo]);
    }
}