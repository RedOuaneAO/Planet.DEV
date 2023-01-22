<?php

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

    }
    static public function numUsers(){

    }
}


