<?php
require_once __DIR__ . "/../config/config.php";

class SportManager {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }


    public function getAll() {
        $sql = "SELECT * FROM sport";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function assignToCoach($id_sport, $id_coach): bool {
        $check = $this->db->prepare("
            SELECT 1 FROM sport_coach 
            WHERE id_sport = :id_sport AND id_coach = :id_coach
        ");
        $check->execute([
            'id_sport' => $id_sport,
            'id_coach' => $id_coach
        ]);

        if ($check->fetch()) {
            return false; 
        }

        $sql = "INSERT INTO sport_coach (id_sport, id_coach) VALUES (:id_sport, :id_coach)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_sport' => $id_sport,
            'id_coach' => $id_coach
        ]);
    }


    public function createIfNew($type) {
        if (empty($type)) return false;

        $check = $this->db->prepare("SELECT id_sport FROM sport WHERE type = :type");
        $check->execute(['type' => $type]);
        $existing = $check->fetchColumn();
        
        if ($existing) return $existing;

        $sql = "INSERT INTO sport(type) VALUES (:type)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['type' => $type]);
        
        return $this->db->lastInsertId();
    }


    public function getByCoach($id_coach) {
        $sql = "SELECT s.type, s.id_sport as sport_id 
                FROM sport_coach sp 
                INNER JOIN sport s ON sp.id_sport = s.id_sport 
                WHERE sp.id_coach = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}