<!--PHP Landing Code -->
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

<!-- PHP Login Code -->
<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connections/connection.php");
$con = connection();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM system_users WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

if ($total > 0) {
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Access'] = $row['access'];

    echo header("Location: index.php");
} else {
    echo "No user found or wrong password.";
}
}

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="page min-vh-100">
    
    <div class="masthead" style="background-image: url('./img/noah-buscher-x8ZStukS2PM-unsplash.jpg'); height: 100vh">
    
        <!--Navbar-->
      <nav class="navbar navbar-expand-lg py-1 shadow-lg px-md-4 d-flex justify-content-around" id="navigation-bar">

          <div class="d-flex align-items-center justify-content-between pb-1 w-100">
            
              <div class="d-flex align-items-center">
                
                <button 
                    class="navbar-toggler me-2 border-1" 
                    id="nav-tag"
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                    
                    <i class="fas fa-bars py-1" id="nav-icon"></i>
                </button>

                <a class="navbar-brand" href="#">
                    <img src="./img/grow_soils.webp" alt="logo" height="35">
                </a>

              </div>
  
              <form class="d-lg-none">
                  <input class="form-control px-1 py-0 rounded-0 w-auto" type="search" placeholder="Search" aria-label="Search">
              </form>

          </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav text-start">
                <li class="nav-item px-1 w-auto">
                    <a class="nav-link active text-light w-auto" aria-current="page" href="./index.html">Home</a>
                </li>
                
                <li class="nav-item px-1">
                    <a class="nav-link  text-light" href="./about.html">About</a>
                </li>
                
                <li class="nav-item px-1">
                    <a class="nav-link  text-light" href="./products.html">Services</a>
                </li>
                
                <li class="nav-item px-1">
                    <a class="nav-link  text-light" href="./contact.html">Contact</a>
                </li>
                
                <li class="nav-item px-1">
                    <?php if (isset($_SESSION['UserLogin'])) { ?>
                    <a class="nav-link  text-light" href="index.php">Farmer List</a>
                    <?php  } else { ?>
                    <a class="nav-link  text-light" href="register.html">Register</a>
                    <?php } ?>
                </li>
                
                <!-- <li class="nav-item px-1">
                    <?php if (isset($_SESSION['UserLogin'])) { ?>
                    <a class="nav-link  text-light" href="logout.php">Logout</a>
                    <?php  } else { ?>
                    <a class="nav-link  text-light" href="login.php">Login</a>
                    <?php } ?>
                </li> -->

                <!-- modal login -->
                <li class="nav-item px-1">
                    <!-- Button trigger modal -->
                    <a class="nav-link  text-light btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Login
                    </a>
                </li>

            </ul>

            <form class="d-none d-lg-flex justify-content-center">
              <input class="form-control px-1 py-0 rounded-0 w-auto" type="search" placeholder="Search" aria-label="Search">
            </form>

          </div>

      </nav>

      <section class="section-content text-center d-flex align-items-center">

          <div class="row">

              <div class="col-12">
                  <img class="main-img pb-4" src="./img/grow_soils1.webp" alt="Grow Soils">
              </div>

              <div class="col-12 para py-3">

                  <!-- <h3 class="head my-2" id="para">Sinusuportahan natin ang ating mahal na mga Magsasaka upang matulungan sila sa kalidad ng kanilang mga ani.
                  </h3> -->
                    
                  <!-- <h3 class="lead my-2" id="para">Sinusuportahan natin ang ating mahal na mga <span class="important"><b>Magsasaka</b></span> upang matulungan sila sa kalidad ng kanilang mga ani.
                  </h3> -->

                  <!-- <h3 class="lead" id="para">In support and in cooperation with the <span class="important"><b>Department of Agriculture</b></span>, Grow Soils Ph plans to provide up to date soil data and analysis for all farmers.
                  </h3> -->

                  <h3 class="lead" id="para">Grow Soils Ph plans to provide up to date soil data and analysis for all farmers.</h3>

              </div>

              <div class="col-12">
                  <!-- <a href="register.html"><button class="rounded-3 text-light mt-4">Iparehistro Ang Iyong Lupa</button></a> -->
                  <a href="register.html"><button class="rounded-3 text-light mt-4">Register your land</button></a>
              </div>

          </div>

      </section>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Login</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form action="#" method="post">

            <div class="text-center">
                <img src="./img/grow_soils_logo.webp" alt="Avatar" class="avatar">
            </div>

            <div class="text-center">

                <label>Username</label>
                <input type="text" name="username" id="username">

                <label>Password</label>
                <input type="password" name="password" id="password">

                <a href="#"><button type="submit" name="login" class=" rounded px-2 log-in-button">Login</button></a>
                
            </div>

        </form>

      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->

    </div>
  </div>
</div>

<!-- <footer><small>&copy; <a href="./index.php">Grow Soils Ph</a></small></footer> -->
<footer>
  <div class="container">
    <div class="row">
    
      <div class="col-12 text-center border-bottom border-1 d-flex justify-content-around align-items-center pb-3 footer-top">

        <h1><a href="#"><img src="./img/Logo.ico" alt="Logo"></a></h1>
        <a class="footer-text-link sm-mt-2" href="#" id="footer-text-link-top"><h2">About Us</h2></a>
        <a class="footer-text-link sm-mt-2" href="#" id="footer-text-link-top"><h2">Contact Us</h2></a>
        <a class="footer-text-link sm-mt-2" href="#" id="footer-text-link-top"><h2">Partners</h2></a>
        <a class="footer-text-link sm-mt-2" href="#" id="footer-text-link-top"><h2">Locations</h2></a>
        
        <div class="d-flex">
            <a class="footer-icon-link px-3" href="#"><i class="fa-brands fa-facebook"></i></a>
            <a class="footer-icon-link px-3" href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a class="footer-icon-link px-3" href="#"><i class="fa-brands fa-youtube"></i></a>
            <a class="footer-icon-link px-3" href="#"><i class="fa-brands fa-twitter"></i></a>
            <a class="footer-icon-link px-3" href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>

      </div>

      <div class="col-12 d-flex justify-content-between footer-info text-center pt-3 footer-bottom">
        <a class="footer-text-link" href="./index.php">Grow Soils Ph</a>
        <p class="footer-text-link">© 2022 GrowSoils. All Rights Reserved.</p>
      </div>

    </div>
  </div>
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>