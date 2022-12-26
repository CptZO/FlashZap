<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flash Zap</title>
    <link rel="stylesheet" href="../Main/css/main.css" />
    <script
      src="https://kit.fontawesome.com/1b5d036e6f.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navigation">
      <div class="nav-left">
        <div class="logo">
          <a href=""><img src="../Main/assets/logo.png" alt="Flash zap Logo" /></a>
        </div>
        <div class="page-links">
          <a href="view.php" class="links">View </a>
          <a href="upload.php" class="links">Upload </a>
          <a href="restoreprod.php" class="links">Restore </a>
          <a href="view_orders.php" class="links">Orders </a>
        </div>
      </div>
      <div class="user-links">
        <?php

        if(isset($_SESSION['username']))
        {
          $username=$_SESSION['username'];
          echo " <a class='imp'>Welcome, $username !</a>
          <a href='logout.php' class='imp'>Log out</a>";
        }
        else{
          echo " <a href ='signup.html' class='imp'>Sign in </a>
          <a href='login.html' class='imp'>Log in</a>";

        }
       ?>
      </div>
    </nav>
 </body>
</html>