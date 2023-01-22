<?php
require 'database.php';

class user extends DbConnection{
public  $userName;
 public function login(){
  if (!empty($userName)){
    $request ="INSERT INTO `users` VALUES (null,'$userName')";
    $result=$this->connect()->prepare($request);
    $result->execute();
    header('Location:../pages/login.php');
  }
 }
}

$log =new user();
$log->login();