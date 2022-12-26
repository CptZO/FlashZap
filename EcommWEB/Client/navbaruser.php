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
    <style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      margin-top: 10px;
      display: none;
      position: absolute;
      background-color: transparent;
      left:12%;
      
    }
        /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      margin-top: 5px;
      
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #89fc89;
      color: black !important;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    </style>
  </head>
  <body>
    <nav class="navigation">
      <div class="nav-left">
        <div class="logo">
          <img src="../Main/assets/logo.png" alt="Flash zap Logo" />
        </div>
        <div class="page-links">
          <a href="index.php" class="links">Home</a>
          <a href="viewproduser.php" class="links">Products</a>
          <a href="#footer" class="links">About</a>
        </div>
      </div>
      <div class="user-links">
            <?php
                if(isset($_SESSION['username']))
                {
                $username=$_SESSION['username'];
                echo " <a href='cart.php' class='cart-link'><i class='fa-solid fa-cart-shopping fa-2x'></i></a>
                <div class='dropdown'>
                  <button><a class='imp'>Welcome, $username !</a></button>
                  <div class='dropdown-content'>
                    <a href='account.php'>Account</a>
                    <a href='order.php'>Orders</a>
                  </div>
                </div>
                <a href='logout.php' class='imp'>Log out</a>";
                }
                else{
                echo " <a href='cart.php' class='cart-link'><i class='fa-solid fa-cart-shopping fa-2x'></i></a> 
                <a href ='signupuser.html' class='imp'>Sign in </a>
                <a href='loginuser.html' class='imp'>Log in</a>";
                }
            ?>
      </div>
    </nav>
    </body>
</html>