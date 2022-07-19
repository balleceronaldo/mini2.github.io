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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-2 px-5" id="navigation-bar">

        <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarSupportedContent">

          <a class="navbar-brand" href="#">
              <img src="./img/grow_soils.webp" alt="logo" height="35">
          </a>

          <ul class="navbar-nav">
              <li class="nav-item px-2">
                  <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="./about.html">About</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="./products.html">Services</a>
              </li>
              <li class="nav-item px-2">
                  <a class="nav-link" href="./contact.html">Contact</a>
              </li>
              <li class="nav-item px-2">
                  <?php if (isset($_SESSION['UserLogin'])) { ?>
                  <a class="nav-link" href="index.php">Farmer List</a>
                  <?php  } else { ?>
                  <a class="nav-link" href="register.html">Register</a>
                  <?php } ?>
              </li>
              <li class="nav-item px-2">
                  <?php if (isset($_SESSION['UserLogin'])) { ?>
                  <a class="nav-link" href="logout.php">Logout</a>
                  <?php  } else { ?>
                  <a class="nav-link" href="login.php">Login</a>
                  <?php } ?>
              </li>
          </ul>

          <!--SearchBar-->
          <form>
            <input class="form-control px-1 py-1 rounded-0" type="search" placeholder="Search" aria-label="Search">
            <!-- idk why this icon is not working -->
            <i class="fa-solid fa-magnifying-glass-location"></i>
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

    <section class="d-flex justify-content-center text-center">

      <div class="row">

          <div class="col-12">
              <img class="img-fluid hero-img w-50 p-4" src="./img/grow_soils.webp" alt="">
          </div>

          <div class="col-12">

              <h2><span class="samotsari-color hero-title">Grow Soils Philippines</span></h2>

              <p class="lead my-2">Sinusuportahan natin ang ating mahal na mga <b class="text-warning">Magsasaka</b> upang matulungan sila sa kalidad ng kanilang mga ani.
              </p>

              <p class="lead">In support and in cooperation with the <b>Department of Agriculture</b>, Grow Soils Ph plans to provide up to date soil data and analysis for all farmers.
              </p>

              <a href="./register.html"><button class="btn btn-success">Iparehistro Ang Iyong Lupa</button></a>

          </div>

      </div>

    </section>
</div>

<footer class="footer"><small>&copy; <a href="./index.php">Grow Soils Ph</a></small></footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>