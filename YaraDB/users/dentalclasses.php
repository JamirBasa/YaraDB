<?php
require_once "database.php";

class User{

    public $first_name = '';
    public $middle_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $passwordRepeat = '';
    public $mobile_number = '';

    protected $userconn;

    function __construct(){
        $this->userconn = new Connection();
    }

    public function addUser($passwordHash){
        $sql = "INSERT INTO users (first_name, middle_name, last_name, email, password, mobile_number) VALUES (:first_name, :middle_name, :last_name, :email, :password, :mobile_number)";
    
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':first_name', $this->first_name);
        $prepsql->bindParam(':middle_name', $this->middle_name);
        $prepsql->bindParam(':last_name', $this->last_name);
        $prepsql->bindParam(':email', $this->email);
        $prepsql->bindParam(':password', $passwordHash);
        $prepsql->bindParam(':mobile_number', $this->mobile_number); // Ensure this is included
        
        return $prepsql->execute(); // Return whether the insert was successful
    }

    public function emailExists($email){
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':email', $this->email);
        $prepsql->execute();
        $count = $prepsql->fetchColumn();

        return $count;
    }

    public function loginUser($password, $email) {
        // Select user based on email only
        $sql = "SELECT * FROM users WHERE email = :email;";
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':email', $email);
        $prepsql->execute();
        $verify = $prepsql->fetch(PDO::FETCH_ASSOC);
    
        if ($verify) {
            // Verify the hashed password
            if (password_verify($password, $verify['password'])) {
                $_SESSION["login"] = "yes"; // Updated session key for clarity
                header("Location: index.php");
                exit; 
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
        } 
    }
    
}