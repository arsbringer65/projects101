<?php
include("./models/conn.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recolher Garbage Management System</title>
  <link rel="icon" href="images/recolher.png" alt="favicon">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a209a2380f.js" crossorigin="anonymous"></script>
</head>
<body>
  <!--------------------Container--------------->
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <img class="allimg" src="images/sidebar.png">
          <h2>RECO<span class="halved">LHER</span></h2>
        </div>
        <div class="close" id="close-btn">
          <i class="fa-solid fa-x"></i>
        </div>
      </div>
      <div class="sidebar">
        <a href="#" class="active">
          <i class="fa-solid fa-circle-info"></i>
          <h3>Dashboard</h3>
          <span class="dashboard-count">2</span>
        </a>
        <a href="login.html"> <!--logout button to at directory pabalik ng login page-->
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    <!---------------------------END OF SIDEBAR--------------------->