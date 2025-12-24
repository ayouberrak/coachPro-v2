<?php 
require_once __DIR__ . '/../config/config.php';
class User{
    protected PDO $conn;
    private string $tableUser ='user';
    private string $nom;
    private string $prenom;
    private string $email;
    private string $pass;
    public int $role;

    // constructor
    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // getters
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getRoles(){
        return $this->role;
    }


    // setters 
    public function setNom(string $nom){
        $this->nom = $nom;
    }
    public function setPrenom(string $prenom){
        $this->prenom = $prenom;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setPass(string $pass){
        $this->pass = password_hash($pass, PASSWORD_BCRYPT);
    }
    public function setRole(int $role){
        $this->role = $role;
    }




    public function signupUser():bool{
        $sql = "INSERT INTO {$this->tableUser}(nom,prenom,email,password,id_role)
                values(:nom,:prenom,:email,:pass,:id_role)";
        $res = $this->conn->prepare($sql);


        return $res->execute([
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'email'=>$this->email,
            'pass'=>$this->pass,
            'id_role'=>$this->role
        ]);
    }

    public function LoginUser(string $email,string $pass){
        $sql = "SELECT * FROM {$this->tableUser} WHERE email =:email";
        $res = $this->conn->prepare($sql);
        $res->execute([
            'email'=>$email
        ]);
        $user = $res->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($pass,$user['password'])){
            $this->id = (int)$user['id'];
            $this->role = (int)$user['id_role'];
            $this->email = $user['email'];
            return $user;
        }
        return null;
    }

}