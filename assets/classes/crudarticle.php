<?php

include "database.php";

class CRUD {
    private $conn;
    public function __construct() {
        $config = new DbConnection();
        $this->conn = $config->connect();
    }
    public function addArticle($Title,$Author,$Content,$Categories){
        $request="INSERT INTO articles VALUE(null,'$Title','$Author','$Content','$Categories',NOW())";
        $result = $this->conn->prepare($request);
        $result->execute();   
        header('location: ../pages/dashBoard.php');
    }
    public function updateArticle(){

    }
    public function deleteArticle(){

    }
   static public function getArticles(){
    $config = new DbConnection();
    $conn = $config->connect();
    $request="SELECT * FROM articles ";
    $result = $conn->prepare($request);
    $result->execute();   
    $data=$result->fetchAll();
    foreach($data as $row){
        $id=$row['id'];
        echo'
        <tr id="'.$id.'">
            <td class="article-title">'.$row['title'].'</td>
            <td class="article-author">'.$row['author'].'</td>
            <td class="article-content">'.$row['content'].'</td>
            <td class="article-categories">'.$row['categorie_id'].'</td>
            <td class="article-publishDate">'.$row['publishDate'].'</td>
            <td class=" d-flex py-3">
            <a class="text-decoration-none bg-danger border-0 rounded px-2 py-1 text-dark" href="dashboard.php?id='.$id.'">DELETE</a>
            <button  class="testeddd bg-success border-0 rounded px-2 py-1 ms-2" data-bs-toggle="modal" data-bs-target="#addModal"  onclick="fillModal('.$id.')">UPDATE</button>
            </td>
        </tr>
        ';
    }

    }

}
if (isset($_POST['addArticle'])){
    $Title=$_POST['title'];
    $Author=$_POST['author'];
    $Content=$_POST['content'];
    $Categories=$_POST['categories'];
    $add= new CRUD();
    $add->addArticle($Title,$Author,$Content,$Categories);
}

