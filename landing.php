<?php

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['UserLogin'])) {
  //I removed this console.log - by Michael
  //echo "Welcome " . $_SESSION['UserLogin'];
} else {
  //I removed this console.log - by Michael
  //echo "Welcome Guest";
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
  <!-- fontawesome cdn -->
  <script src="https://use.fontawesome.com/370fcb8630.js"></script>
</head>

<body>
<div class="page min-vh-100">
    
    <div class="masthead" style="background-image: url('./img/noah-buscher-x8ZStukS2PM-unsplash.jpg'); height: 100vh">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-1 px-5" id="navigation-bar">

        <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarSupportedContent">

          <a class="navbar-brand" href="#">
              <img src="./img/grow_soils.webp" alt="logo" height="35">
          </a>

          <ul class="navbar-nav ms-5">
              <li class="nav-item px-2">
                  <a class="nav-link active  text-light" aria-current="page" href="./index.html">Home</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link  text-light" href="./about.html">About</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link  text-light" href="./products.html">Services</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link  text-light" href="./contact.html">Contact</a>
              </li>
              <li class="nav-item px-2">
                  <?php if (isset($_SESSION['UserLogin'])) { ?>
                  <a class="nav-link  text-light" href="index.php">Farmer List</a>
                  <?php  } else { ?>
                  <a class="nav-link  text-light" href="register.html">Register</a>
                  <?php } ?>
              </li>
              <li class="nav-item px-2">
                  <?php if (isset($_SESSION['UserLogin'])) { ?>
                  <a class="nav-link  text-light" href="logout.php">Logout</a>
                  <?php  } else { ?>
                  <a class="nav-link  text-light" href="login.php">Login</a>
                  <?php } ?>
              </li>
          </ul>

          <form>
            <input class="form-control px-1 py-1 rounded-0" type="search" placeholder="Search" aria-label="Search">
          </form>

          <button 
              class="navbar-toggler" 
              type="button" 
              data-bs-toggle="collapse" 
              data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" 
              aria-expanded="false" 
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

        </div>

    </nav>

    <section class="d-flex justify-content-center align-items-center text-center">

      <div class="row">

          <div class="col-12">
              <img class="hero-img w-50 p-4" src="./img/grow_soils.webp" alt="Grow Soils">
          </div>

          <div class="col-12 para py-3">

              <h3 class="lead my-2" id="para">Sinusuportahan natin ang ating mahal na mga <span class="important"><b>Magsasaka</b></span> upang matulungan sila sa kalidad ng kanilang mga ani.
              </h3>

              <h3 class="lead" id="para">In support and in cooperation with the <span class="important"><b>Department of Agriculture</b></span>, Grow Soils Ph plans to provide up to date soil data and analysis for all farmers.
              </h3>

          </div>

          <div class="col-12 mt-3">
          <a href="./register.html"><button class="rounded-3 text-light">Iparehistro Ang Iyong Lupa</button></a>
          </div>

      </div>

    </section>

</div>

<!-- i removed this temporarily but i had to ask this to sir ronaldo for confirmation -->
<!-- <footer><small>&copy; <a href="./index.php">Grow Soils Ph</a></small></footer> -->
<footer>
  <div class="container">
    <div class="row">
    
      <div class="col-12 text-center border-bottom border-1 d-flex justify-content-around">
        <h1>Logo</h1>
        <a href="#"><h2">Lorem</h2></a>
        <a href="#"><h2">Lorem</h2></a>
        <a href="#"><h2">Lorem</h2></a>
        <a href="#"><h2">Lorem</h2></a>
        <a href="#"><h2">Lorem</h2></a>

        <a href="#"><i class="fa-brands fa-facebook-square">fb</i></a>
        <a href="#"><i class="fa-brands fa-facebook-square">fb</i></a>
        <a href="#"><i class="fa-brands fa-facebook-square">fb</i></a>

      </div>

      <div class="col-12 footer-info text-center pt-3">
        <a href="./index.php">Grow Soils Ph</a>
      </div>

    </div>
  </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>