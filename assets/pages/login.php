<?php
// include '../classes/scripts.php'; 
// include '../classes/database.class.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>TECH CLUB</title>
<!-- ================== BEGIN core-css ================== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
<link rel="stylesheet" href="../css/loginstyle.css">
<!-- ================== END core-css ================== -->
</head>
<body>

<div class="contentContainer">
    <div class="loginForm" id="loginId">
        <div>
            <h2 class="fontWeight">Login</h2>
            <hr>
        </div>
        <form action="../classes/login.class.php" method="POST">
        <div>
            <label for="" class="mb-3">Email</label><br>
            <input type="email" class="form-control" name="email">
            <label for="" class="my-3">Password</label><br>
            <input type="password" class="form-control" name="password"><br>
        </div>
            <button type="submit" class="submitBtn fw-bold rounded px-3 py-1 border-0" name="Submit">Login</button>
        </form><hr>
        <div class="mt-3">
            <p>I Don't Have Account</p>
            <button class="border-0 text-info" id="goToSgin">Sign Up</button>
        </div>
    </div>
    <!-- sign up -->
    <div class="loginForm" id="signId" style="display:none;">
        <div>
            <h2 class="fontWeight">Sign Up</h2>
            <hr>
        </div>
        <form action="../classes/user.php" method="POST">
        <div>
            <label for="" class="mb-3">First Name</label><br>
            <input type="text" class="form-control" >
            <label for="" class="mb-3">Last Name</label><br>
            <input type="text" class="form-control" >
            <label for="" class="mb-3">Email</label><br>
            <input type="email" class="form-control" >
            <label for="" class="my-3">Password</label><br>
            <input type="password" class="form-control"><br>
        </div>
       
            <button type="submit" class="submitBtn fw-bold rounded px-3 py-1 border-0" name="Submit">Sign Up</button>
        </form><hr>
        <div class="mt-3">
            <p>I Already Have Account</p>
            <button class="border-0 text-info" id="goTologin">Login</button>
        </div>
    </div>
</div>
    <!--==================================== scripts ======================================-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>





