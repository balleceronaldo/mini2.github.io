<?php

if (!isset($_SESSION)) {
 session_start();
}

if (isset($_SESSION['UserLogin'])) {
 echo "Welcome " . $_SESSION['UserLogin'];
} else {
 echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM farmer_list ORDER BY id DESC";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Grow Soils Ph</title>
 <link rel="stylesheet" href="./css/style.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>

  <nav class="text-center navbar navbar-expand-lg navbar-dark bg-primary fixed-top pt-1">
    <div class="container">
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./products.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.html">Contact</a>
          </li>
        </ul>

        <a class="navbar-brand" href="#">
          <img src="./img/grow_soils.webp" alt="logo" height="35">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
          
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <?php if (isset($_SESSION['UserLogin'])) { ?>
              <a class="nav-link" href="index.php">Farmer List</a>
            <?php  } else { ?>
            <a class="nav-link" href="register.html">Register</a>
            <?php } ?>
            </li>
            <li class="nav-item">
            <?php if (isset($_SESSION['UserLogin'])) { ?>
            <a class="nav-link" href="logout.php">Logout</a>
            <?php  } else { ?>
            <a class="nav-link" href="login.php">Login</a>
            <?php } ?>
            </li>
          </ul>




      </div>
    </div>
  </nav>

  <div class="masthead" style="background-image: url('./img/background.webp');">
    <div class="color-overlay d-flex justify-content-center align-items-center">
<!--showcase flexbox method text-sm-start aligns text to left-->
<section class="text-light p-sm-5 pb-lg-5 pt-lg-5 text-center text-sm-start">
  <br>
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div class="col-sm">

          <div class="hero-text px-2 py-1 mt-sm-5 rounded">
          <h2><span class="samotsari-color hero-title">Grow Soils Philippines</span></h2>
          <p class="lead my-2">Sinusuportahan natin ang ating mahal na mga <b class="text-warning">Magsasaka</b> upang matulungan sila sa kalidad ng kanilang mga ani.</p>

          <p class="lead">In support and in cooperation with the <b>Department of Agriculture</b>, Grow Soils Ph plans to provide up to date soil data and analysis for all farmers.
          </p></div>
          
          <a href="./register.html"><button class="mt-2 hero-btn btn btn-primary btn-lg">Iparehistro Ang Iyong Lupa</button></a>
          


        </div>
        <!-- d-none makes image invisible at mobile devices-->
        <!-- d-sm-block makes image visible at breakpoint-->
        <img class="img-fluid hero-img d-md-block d-none w-50 p-4" src="./img/grow_soils.webp" alt="">
      </div>
    </div>
  </section>

    </div>
  </div>

<footer class="footer"><small>&copy; <a href="./index.php">Grow Soils Ph</a></small></footer>

</body>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>