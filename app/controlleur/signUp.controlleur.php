<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/user.models.php';
require_once __DIR__ . '/../models/role.models.php';
require_once __DIR__ . '/../models/sportif.models.php';
require_once __DIR__ . '/../models/coach.models.php';


class SignUp_controlleur{
    private PDO $conn ;
    private Roles $roles;



    public function __construct($db) {
        $this->conn = $db;
        $this->roles = new Roles($db);
    }



    public function getrole(){
        return $this->roles->getAllRoles();
    }

    public function register(array $method){
            $roleV = $method['role'];

            if($roleV == 2){

            $coach = new Coach($this->conn);
            $file_name = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

            $new_file_name = $file_name . '_' . time() . '.' . $file_extension;
            $upload_dir = '../../public/uploads/';

            $upload_path = $upload_dir . $new_file_name;

            
            $coach->setNom($method['nom']);
            $coach->setPrenom($method['prenom']);
            $coach->setEmail($method['email']);
            $coach->setPass($method['password']);
            $coach->setBoi($method['biographie']);
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path)){
                $coach->setPhoto($new_file_name);
            }
            $coach->setAnne($method['annes_exepriances']);
            $coach->setCertif($method['certification']);
            $coach->setRole(2);
            if($coach->addCoach()){
                header("Location: signUp.controlleur.php?add_coach=yes");
            }
        }elseif($roleV == 1){
            $sportif = new Sportif($this->conn);
            $sportif->setNom($method['nom']);
            $sportif->setPrenom($method['prenom']);
            $sportif->setEmail($method['email']);
            $sportif->setPass($method['password']);
            $sportif->setTele($method['tel']);
            $sportif->setRole(1);

            if($sportif->addClient()){
                header("Location: signUp.controlleur.php?add_clienaddCoacht=yes");
            }
        }
    }

}

$db = new Connect();

$dbb = $db->dbconnect();
$res = new SignUp_controlleur($dbb);

$reslt=$res->getrole();

$signUp = new SignUp_controlleur($dbb);

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $signUp->register($_POST);
}

require_once __DIR__ . '/../views/signup.view.php';