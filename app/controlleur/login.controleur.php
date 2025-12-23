<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/user.models.php';

class Login_controleur{
    private PDO $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function login(array $method){
        $user = new User($this->conn);

        if($user->LoginUser($method['email'],$method['password'])){
            if($user->role == 1){
                header('Location: dashobrd_client.php?valid=yes');
                exit;
            }elseif($user->role == 2){
                header('Location: dashobrd_coach.php?valid=yes');
                exit;
            }
        }
        header('Location: dashobrd.php?valid=nom');

    }
    
}

$connect = new Connect();
$db = $connect->dbconnect();


$var = new Login_controleur($db);

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $var->login($_POST);
}   

require_once __DIR__ . '/../views/login.view.php';
