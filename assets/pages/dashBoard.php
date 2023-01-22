<?php 
include '../classes/crudarticle.php';
session_start();
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
                        <a href="articles.php" class="nav-link mx-5 text-dark fw-bold">Home</a>
                        <a class="nav-link mx-5 text-dark fw-bold" data-bs-toggle="offcanvas" href="#sidebarId" role="button" aria-controls="offcanvasExample">Profile</a>
                        <a href="logout.php" name="logout"  class="nav-link mx-5 text-dark fw-bold">logout</a>
                    </div>
                </div>
            </div>
        </header>


<div class="container-fluid">
    <!-- <div class="row"> -->
      
        <!-- <main class="col-11 col-sm-10"> -->

            <div class="d-md-flex justify-content-between mt-3 text-center">
                <h1 class="mt-2">Welcome <span class="spanColor"><?php echo $_SESSION["name"]?>
               !</span></h1>
                <button class="rounded-2 fw-bold border-0 btnColor text-white px-4 my-4"  data-bs-toggle="modal" data-bs-target="#addModal" id="addBookBtn" onclick="btnReset()" >ADD ARTICLE</button>
            </div><hr>
            <!-- alert -->
                            <!-- <div class="alert alert-primary d-flex align-items-center" role="alert">
                              <div>the article has been added</div>
                            </div> -->
            <!-- end of alert -->
                <div class="row gap-1 justify-content-evenly p-5 mx-3 bg-secondary bg-opacity-75 rounded">
                    <div class="d-flex bg-danger rounded col-md-3 col-6">
                        <div class="px-4 py-2">
                            <h6 class="text-white">Users</h6>
                            <i class="fa fa-users spanColor"></i>
                        </div>
                        <p class="fw-bold fs-3 py-2">12</p>
                    </div>
                    <div class="d-flex bg-warning rounded col-md-3 col-6">
                        <div class="px-4 py-2">
                            <h6 class="text-white">writers</h6>
                            <!-- <i class="fa fa-book spanColor"></i> -->
                        </div>
                        <p class="fw-bold fs-3 py-2">22</p>
                    </div>
                    <div class="d-flex bg-success rounded col-md-3 col-6">
                        <div class="px-4 py-2">
                            <h6 class="text-white">Articles</h6>
                            <!-- <i class="fa fa-shopping-cart spanColor"></i> -->
                        </div>
                        <p class="fw-bold fs-3 py-2">6</p>
                    </div>
                </div>            
            <div class="table-responsive mt-5 tb rounded">
                <table class="table table-striped table-bordered"  id="tableId" >
                    <thead class="">
                        <tr>
                            <th scope="col">TITLE</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">CONTENT</th>
                            <th scope="col">CATEGORIE</th>
                            <th scope="col">PUB-DATE</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        CRUD::getArticles();
                        ?>
                    </tbody>
                </table>
            </div>    
        <!-- </main> -->
    <!-- </div> -->
</div>

<!-----------------------------------------------sidebar---------------------------------->

<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="sidebarId" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Edit<span class="spanColor"> Profile</span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div>
            <div class="profilImage">
                <img src="../images/user.png" width="100px" alt="not found" class="rounded-circle opacity-75 m-5"><br>
            </div>
        <form action="../classes/crudarticle.php" method="POST">
                    <table class="table mt-3">
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

<div class="modal modal-xl fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add a Article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <button type="submit" name="addNewArticle" class="btn btn-primary text-end" id="nABtn">add new article</button>
        <form id="formId" action="../classes/crudarticle.php" method="POST">
            <div id="formInputs">
                <!-- for update -->
                <input type="text" name="id" id="bookId" hidden><br>
                <!-- for update -->
                <label for="">Title</label><br>
                <input type="text" name="title" class="form-control" id="titleId" data-parsley-minlength="25" required><br>
                <label for="">Author</label><br>
                <input type="text" name="author" class="form-control" id="authorId" value=""><br>
                <label for="">Categories</label><br>
                <select name="categories" id="categoriesId" class="form-control">
                    <option value="1">cloud</option>
                    <option value="2">web development</option>
                    <option value="3">application</option>
                </select>  <br>  
                <label for="">Content</label><br>
                <textarea name="content" class="form-control" id ="contentId"  cols="30" rows="10"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="addArticle" class="btn btn-primary" id="addBtn">Add</button>
              <button type="submit" name="update" class="btn btn-primary" id="updateId" >Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



 <!--==================================== scripts ======================================-->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="../js/scripts.js"></script>
 <script>
    $(document).ready( function () {
    $('#tableId').DataTable();
} );
 </script>
</body>
</html>
