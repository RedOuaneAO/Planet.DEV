<?php
    session_start();
include "database.php";

class CRUD {
    private $conn;
    public function __construct() {
        $config = new DbConnection();
        $this->conn = $config->connect();
    }
    public function addArticle($Title,$Author,$Content,$Categories ,$image){
        $request="INSERT INTO articles VALUE(null,'$Title','$Author','$Content','$Categories',NOW(),'$image')";
        $result = $this->conn->prepare($request);
        $result->execute();   
        $_SESSION['message']='the article has been added';
        header('location: ../pages/dashBoard.php');
    }
    public function updateArticle($Title,$Author,$Content,$Categories ,$image,$id){
        $request="UPDATE `articles` SET `title`='$Title',`author`='$Author',`content`='$Content',`categorie_id`=$Categories,`publishDate`=NOW(),`images`='$image' WHERE id =$id";
        $result = $this->conn->prepare($request);
        $result->execute();   
        header('location: ../pages/dashBoard.php');
    }
    public function getArt(){
        $request="SELECT * FROM articles ";
        $result = $this->conn->prepare($request);
        $result->execute();   
        $data=$result->fetchAll();
        return $data;
    }
    public function deleteArticle($id){
            $Delete="DELETE FROM articles WHERE id=$id";
            $result = $this->conn->prepare($Delete);
            $result->execute();
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
            <td class="article-cover"><img style="width: 50px;" id="coverId" src="../images/'.$row['images'].'"></td>
            <td class="article-title">'.$row['title'].'</td>
            <td class="article-author">'.$row['author'].'</td>
            <td class="article-content">'.$row['content'].'</td>
            <td class="article-categories">'.$row['categorie_id'].'</td>
            <td class="article-publishDate">'.$row['publishDate'].'</td>
            <td class=" d-flex py-3">
            <a class="text-decoration-none bg-danger border-0 rounded px-2 py-1 text-white" href="dashboard.php?id='.$id.'">DELETE</a>
            <button  class="bg-success border-0 rounded px-2 py-1 ms-2 text-white" data-bs-toggle="modal" data-bs-target="#addModal"  onclick="fillModal('.$id.')">UPDATE</button>
            </td>
        </tr>
        ';
    }

    }

}
if (isset($_POST['addArticle'])){
    for($i=0;$i<count($_POST['title']);$i++){
    $Title=$_POST['title'][$i];
    $Author=$_POST['author'][$i];
    $Content=$_POST['content'][$i];
    $Categories=$_POST['categories'][$i];
    $image=$_FILES['image']['name'][$i];
    $image_temp=$_FILES['image']['tmp_name'][$i];
    $upload_file = '../images/' . $image;
    move_uploaded_file($image_temp, $upload_file);
    $add= new CRUD();
    $add->addArticle($Title,$Author,$Content,$Categories ,$image);
    }
}
if(isset($_POST['update'])){
    for($i=0;$i<1;$i++){
        $id=$_POST['id'];
        $Title=$_POST['title'][$i];
        $Author=$_POST['author'][$i];
        $Content=$_POST['content'][$i];
        $Categories=$_POST['categories'][$i];
        $image=$_FILES['image']['name'][$i];
        $image_temp=$_FILES['image']['tmp_name'][$i];
        $upload_file = '../images/' . $image;
        move_uploaded_file($image_temp, $upload_file);
        $update= new CRUD();
        $update->updateArticle($Title,$Author,$Content,$Categories,$image,$id);
    }
}


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $add= new CRUD();
    $add->deleteArticle($id);
}
