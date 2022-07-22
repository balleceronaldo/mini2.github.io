<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once("connections/connection.php");
$con = connection();


// code validation for error message if database is connected or not
if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}
// check if variable is empty or not
if(!isset($_POST['username'], $_POST['password'], $_POST['email'])){
    exit('Empty Field(s)');
}

if(empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']))){
    exit('Values Empty');
}

// check if details already exist or if new enter into database
if ($stmt = $con->prepare('SELECT id, password FROM system_users WHERE username = ?')) {
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $stmt->store_result();

  if ($stmt->num_rows>0) {
      echo 'Username already exists. Try again';
  }
//  send data to database
  else {
      if($stmt = $con->prepare('INSERT INTO system_users (username, password, email) VALUES (?, ?, ?)')){
      $password = $_POST['password'];
      $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
      $stmt->execute();
      echo 'Successfully Registered';
      } else {
      echo 'Error Occured';
      }
  }

$stmt->close();
} else {
 echo 'Error occured';
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/register.css" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <title>Registration Page</title>
  </head>
  <body>
    <div class="register">
      <h1>Register</h1>
      <form action="register.php" method="POST">
        <label for="username"> </label>
        <input type="text" name="username" placeholder="Username" id="username" required/>
        <label for="password"></label>
        <input type="password" name="password" placeholder="Password" id="password" required/>
        <label for="email"></label>
        <input type="email" name="email" placeholder="Email" id="email" required/>
        <input type="submit" value="Register" />
      </form>
    </div>
    <br>
 <footer class="footer"><small>&copy; <a href="./landing.html">Grow Soils</a></small></footer>
  </body>
</html>
