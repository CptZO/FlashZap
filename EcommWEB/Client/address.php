<?php

session_start();
$username=$_SESSION['username'];

if(isset($_SESSION['username']))
{
    if(time()-$_SESSION["login_time_stamp"] >3600) 
    {
        session_unset();
        session_destroy();
        header("Location:viewproduser.php");
    }
}
else{
  echo "<script>
    alert('Login first to view the cart!');
    window.location.href='http://localhost/EcommWEB/Client/loginuser.html';  
    </script>";
    die;
   
}

include 'navbaruser.php';

include_once '../shared/connection.php';

?>

<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flash Zap</title>
    <link rel="stylesheet" href="../Main/css/main.css">
    
    <script
      src="https://kit.fontawesome.com/1b5d036e6f.js"
      crossorigin="anonymous"
    ></script>
    <style>
        h1{
            font-size: 56px;
        }
        .products
        {
            grid-template-columns:1fr;
        }
        .products .card .content p{
            margin: 1px 5px;
            min-height: 46px !important;
        }
        .btn
        {
            width: 50%;
            background-color: green; 
            padding: 10px;
            border-radius: 30px;
        }
    </style>
  </head>
    <body>
    <div class="products">
      <div class="card">
        <div></div>
        <div class="content">
          <h1>ADDRESS</h1>
          <p> Please add your delivery Address </p>
          <form action="add_address.php" method="post">
            <textarea rows="20" cols="70" name='address' placeholder="Please add Delivery Address"></textarea>
            <br>
            <input type="submit" value="Submit" class="btn form-control bg-success">
          </form>
          <div class="details">
          </div>
        </div>
      </div>
    </div>
        
    </body>
</html>
