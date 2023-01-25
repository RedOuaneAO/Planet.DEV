<?php 
include '../classes/crudArticle.php';
include '../classes/statistic.class.php';
if(!isset($_SESSION["name"])){
    header("location:login.php");
}
// session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />
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
                        <a href="../classes/logout.class.php" name="logout"  class="nav-link mx-5 text-dark fw-bold">logout</a>
                    </div>
                </div>
            </div>
        </header>


<div class="container-fluid">
            <div class="d-md-flex justify-content-between mt-3 text-center">
                <h1 class="mt-2">Welcome <span class="spanColor"><?php echo $_SESSION["name"]?>
               !</span></h1>
                <button class="rounded-2 fw-bold border-0 btnColor text-white px-4 my-4"  data-bs-toggle="modal" data-bs-target="#addModal" id="addBookBtn" onclick="btnReset()" >ADD ARTICLE</button>
            </div><hr>
            <?php if (isset($_SESSION['message'])): ?> 						
						<div class="alert alert-primary alert-dismissible fade show">
						<strong>Done!</strong>
						<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
					</div>
			<?php endif ?>
                <div class="row gap-1 justify-content-evenly p-5 mx-3  rounded" style="background-color:#E9E9E9;">
                    <div class="d-flex bg-white rounded col-md-3  col-sm-6 ">
                        <div class="px-sm-4 pe-4 py-2 mx-4 mx-md-0">
                            <h6 class="spanColor">Users</h6>
                            <i class="fa fa-users spanColor"></i>
                        </div>
                        <p class="fw-bold fs-3 py-2"><?php STATISTIC::numUsers(); ?></p>
                    </div>
                    <div class="d-flex bg-white rounded col-md-3  col-sm-6">
                        <div class="px-sm-4 pe-3 py-2 mx-4 mx-md-0">
                            <h6 class="spanColor">Authors</h6>
                            <i class="bi bi-person-lines-fill spanColor"></i>
                        </div>
                        <p class="fw-bold fs-3 py-2"><?php STATISTIC::numAuthors(); ?></p>
                    </div>
                    <div class="d-flex bg-white rounded col-md-3  col-sm-6">
                        <div class="px-sm-4 pe-3 py-2 mx-4 mx-md-0">
                            <h6 class="spanColor">Articles</h6>
                            <i class="bi bi-file-text-fill spanColor"></i>
                            </div>
                        <p class="fw-bold fs-3 py-2"><?php STATISTIC::numArticles(); ?></p>
                    </div>
                </div> 
                <?php if (isset($_SESSION['delete'])): ?> 						
						<div class="alert alert-success mt-2 alert-dismissible fade show">
						<strong>Done!</strong>
						<?php 
						echo $_SESSION['delete']; 
						unset($_SESSION['delete']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
					</div>
			<?php endif ?>           
            <div class="table-responsive mt-5 tb rounded">
                <table class="table table-striped table-bordered"  id="tableId" >
                    <thead class="">
                        <tr>
                            <th scope="col">COVER</th>
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
                    <table class="table mt-3">
                            <tr class="border-0" hidden>
                                <th><label class="spanColor">id</label></th>
                                <th><input type="number" name="idInput" value=""></th>
                            </tr>
                            <tr class="border-0">
                                <th>  <label class="spanColor">Full Name</label></th>
                                <th><input type="text" name="nameInput" disabled value="<?php echo $_SESSION["name"] ?>"></th>
                            </tr>
                            <tr class="border-0">
                                <th>  <label class="spanColor">Email</label></th>
                                <th><input type="email" name="emailInput" disabled value="<?php echo $_SESSION["email"] ?>"></th>
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
      <div class="modal-body" style="height: 80vh; overflow-y: auto;">
          <button name="addNewArticle" id="addNArt" class="btn btn-primary text-end" onclick="addNewForm()">New Article</button>
        <form id="formId" action="../classes/crudArticle.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
            <div id="newArt"></div>
            <div id="formInputs">
                <!-- for update -->
                <input type="text" name="id" id="bookId" hidden><br>
                <!-- for update -->
                <label for="">Title</label><br>
                <input type="text" name="title[]" class="form-control" id="titleId" data-parsley-minlength="5" required><br>
                <label for="">Author</label><br>
                <input type="text" name="author[]" data-parsley-minlength="15" required class="form-control" id="authorId" ><br>
                <label for="">Categories</label><br>
                <select name="categories[]" id="categoriesId" class="form-control">
                    <option value="1">cloud</option>
                    <option value="2">web development</option>
                    <option value="3">applications</option>
                </select>  <br>  
                <label>image</label><br>
                <input type="file" name="image[]" id="imageId" accept=".jpg , .png , .jpeg"><br>
                <label>Content</label><br>
                <textarea name="content[]" class="form-control" id ="contentId"  cols="30" rows="10"></textarea>
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
 <script src="../js/parsley.js"></script>
 <script src="../js/scripts.js"></script>
 <script>
    $(document).ready( function () {
    $('#tableId').DataTable();
} );
 </script>
</body>
</html>
