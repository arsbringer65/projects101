<?php
require_once "./models/conn.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recolher Garbage Collection Management System</title>
  <link rel="icon" href="images/recolher.png" alt="favicon">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a209a2380f.js" crossorigin="anonymous"></script>
</head>
<body>
  <!--Wave png-->
  <img class="wave" src="images/wave.png" alt="wave">
  <!--Nature svg-->
  <div class="container">
    <div class="img">
        <img src="images/nature.svg" alt="nature">
    </div> 
    <!--Log in-->
  <div class="login-content">
    <!--dahil nagkaroon tayo ng user side, tinanggal ko na yung magdidirect to admin side, placeholder na lang-->
        <form action="#">
            <img class=avatar src="images/avatar.svg" alt="avatar">
            <h2>Welcome!</h2>
            <!--Username-->
            <div class="input-div one">
              <div class="i">
                <i class="fa-solid fa-user"></i>
              </div>
              <div>
                <h5>Username</h5>
                <input class="input" type="text" required>
              </div>
            </div>
            <!--Password-->
            <div class="input-div two">
              <div class="i">
                <i class="fa-solid fa-lock"></i>
              </div>
              <div>
                <h5>Password</h5>
                <input class="input" type="password" required>
              </div>
            </div>
            <!--forgot password(?)
              <a href="#">Forgot Password</a> -->
            <input type="submit" class="btn" value="Login">   
        </form>
    </div>
  </div>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>