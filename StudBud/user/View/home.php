<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Styles/home.css">
  <title>studbud</title>
</head>

<body>
  
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>S</span>tud<span>B</span>ud</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="viewprofile.php" data-after="Profile">Profile</a></li>
            <li><a href="../Controller/logout.php" data-after="Logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Welcome, <span></span></h1>
        <h1>I am your <span></span></h1>
        <h1>STUDY BUDDY <span></span></h1>
        <a href="#footer" type="button" class="cta">About US</a>
      </div>
    </div>
  </section>
  

  

  
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>S</span>TUD <span>B</span>UD</h1>
      </div>
      <h2>Your Homework Buddy</h2>
      <p>Copyright © 2020 . All rights reserved</p>
    </div>
  </section>
  
  <script src="../Scripts/app.js"></script>
</body>

</html>