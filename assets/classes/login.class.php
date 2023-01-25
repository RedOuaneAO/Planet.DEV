<?php
session_start();   
include "database.php";

class LOGIN {
    private $conn;
    public function __construct() {
        $config = new DbConnection();
        $this->conn = $config->connect();
    }

    public function login() {
        $request="SELECT * FROM admins";
        $result = $this->conn->prepare($request);
        $result->execute();
        $data=$result->fetchAll();
        return $data;
    }
}
if (isset($_POST['Submit'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $user = new LOGIN();
    $data = $user->login();
    foreach($data as $row){
        if ($Email==$row["email"] && $Password==$row["password"]) {
            $_SESSION["name"]=$row["fullName"];
            $_SESSION["email"]=$row["email"];
                header('location: ../pages/dashBoard.php');
        } else {
                $_SESSION['message']='Enter a validate information';
                header('location: ../pages/login.php');
        }
    }
}


