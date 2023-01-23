<?php 
include '../classes/crudArticle.php';
if(!isset($_SESSION["name"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>TECH CLUB</title>
<!-- ================== BEGIN core-css ================== -->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
<link rel="stylesheet" href="../css/dashStyle.css">
<!-- ================== END core-css ================== -->
</head>
<body>
        <header class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h4 class="navbar-brand fw-bold mx-4"><span class="spanColor">TECH</span>-CLUB</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#linksId"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse justify-content-end" id="linksId">
                    <div class="navbar-nav">
                        <a href="dashBoard.php" class="nav-link mx-5 text-dark fw-bold">Dashboard</a>
                        <a class="nav-link mx-5 text-dark fw-bold" data-bs-toggle="offcanvas" href="#sidebarId" role="button" aria-controls="offcanvasExample">Profile</a>
                        <a href="logout.php" name="logout"  class="nav-link mx-5 text-dark fw-bold">logout</a>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-fluid">
            <div class="d-md-flex justify-content-between mt-3 text-center">
                <h1 class="mt-2">Welcome <span class="spanColor"><?php echo $_SESSION["name"]?>
               !</span></h1>
                <div class="mt-4 d-md-flex">
                    <input list="cate" class="form-control">
                    <datalist id="cate">
                        <option value="Cloud">
                        <option value="frontend">
                        <option value="backend">
                        <option value="web">
                    </datalist>
                    <button class="rounded-2 fw-bold border-0 bg-info text-white px-4 my-4 ">Search</button>
                </div>
            </div><hr>
                </div> 
                <div class="d-flex justify-content-evenly">
                    <?php
                    $show =new CRUD();
                    $show->getArt($data);
                    // $show->$data=$result->fetchAll();
                    //  foreach($data as $row){
                    //         $id=$row['id'];
                    var_dump($show)
                    ?>
                    <div class="card" style="width: 18rem;">
                        <img src="../images/cloud.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="rounded-2 border-0 btnColor text-white btn"  data-bs-toggle="modal" data-bs-target="#showModal">SHOW MORE</button>
                        </div>
                    </div>   
                    <?php  ?>       
                    <!-- <div class="card" style="width: 18rem;">
                        <img src="../images/cloud.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="rounded-2 border-0 btnColor text-white btn"  data-bs-toggle="modal" data-bs-target="#showModal">SHOW MORE</button>
                        </div>
                    </div>          
                    <div class="card" style="width: 18rem;">
                        <img src="../images/cloud.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="rounded-2 border-0 btnColor text-white btn"  data-bs-toggle="modal" data-bs-target="#showModal">SHOW MORE</button>
                        </div>
                    </div>           -->
                </div> 
        </div>

<!-----------------------------------------------sidebar---------------------------------->

<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="sidebarId" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Edit<span class="spanColor"> Profile</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div>
            <div class="profImage">
                <img src="../images/user.png" width="100px" alt="not found" class="rounded-circle opacity-75 m-5"><br>
            </div>
        <form action="../classes/crudArticle.php" method="POST">
                    <table class="table mt-3" class="border-0">
                            <tr class="border-0" hidden>
                                <th><label class="spanColor">id</label></th>
                                <th><input type="number" name="idInput" value=""></th>
                            </tr>
                            <tr class="border-0">
                                <th>  <label for="" class="spanColor">Name</label></th>
                                <th><input type="text" name="nameInput" value=""></th>
                            </tr>
                            <tr class="border-0">
                                <th>  <label for="" class="spanColor">Email</label></th>
                                <th><input type="email" name="emailInput" value=""></th>
                            </tr>
                            <tr class="border-0">
                                <th>  <label for="" class="spanColor">Password</label></th>
                                <th><input type="password" name="passwordInput" value=""></th>
                            </tr>
                            <tr class="border-0">
                                <th class="text-end"><button name="editProfi" class="px-4 py-2 mt-4 rounded-2 fw-bold border-0 btnColor text-white">Enregistrer</button><th>
                            </tr>
                    </table>
        </form>
        </div>
    </div>

    <!---------------------------------Add articles Modal------------------------->

<div class="modal modal-xl fade" id="showModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Article Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form id="formId" action="../classes/crudArticle.php" method="POST"> -->
            <div>
                <!-- for update -->
                <input type="text" name="id" id="artId" hidden><br>
                <!-- for update -->
                <div class="row text-center rounded m-auto p-4" style="background-color:#E9E9E9; width:90%;">
                    <div class="col-4">
                        <label>Cover</label><br>
                        <img src="../images/cloud.jpg" class="w-25">
                    </div>
                    <div class="col-4">
                        <label>Author</label>
                        <p>your mom</p>
                    </div>
                    <div class="col-4">
                        <label>Categories</label>
                        <p>death</p>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="">Content</label><br>
                    <textarea name="content" class="form-control" cols="30" rows="10" disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, facilis iure. Necessitatibus dignissimos animi laborum quaerat deserunt optio placeat facere reprehenderit quia explicabo maxime officiis, quisquam nostrum? Doloremque rerum natus atque! Sunt illo odio voluptate pariatur veritatis, suscipit consectetur, laudantium alias neque, maxime accusamus temporibus facere. Dolor porro nemo quasi!</textarea>
                </div>
            </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>



 <!--==================================== scripts ======================================-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <script src="../scripts.js"></script>
</body>
</html>
