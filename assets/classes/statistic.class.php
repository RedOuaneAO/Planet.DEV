<?php
// include "database.php";


class STATISTIC{
    static public function numArticles(){
        $config = new DbConnection();
        $conn = $config->connect();
        $request="SELECT * FROM articles ";
        $result = $conn->prepare($request);
        $result->execute();   
        $data=$result->fetchAll();
        $rowcount=count($data);
        echo $rowcount;
    }
    static public function numAuthors(){
        $config = new DbConnection();
        $conn = $config->connect();
        $request="SELECT COUNT(DISTINCT author) FROM articles "; 
        $result = $conn->prepare($request);
        $result->execute();   
        $data=$result->fetch();
        echo $data["COUNT(DISTINCT author)"];

    }
    static public function numUsers(){
        $config = new DbConnection();
        $conn = $config->connect();
        $request="SELECT * FROM users ";
        $result = $conn->prepare($request);
        $result->execute();   
        $data=$result->fetchAll();
        $rowcount=count($data);
        echo $rowcount;
    }
}

