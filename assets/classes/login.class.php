<?php

include "database.php";
session_start();   
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
                header('location: ../pages/dashBoard.php');
        } else {
                header('location: ../pages/login.php');
        }
    }
}


