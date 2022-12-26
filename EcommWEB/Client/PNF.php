<?php

session_start();

include 'navbaruser.php';

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
          <h1>WORK IN PROGRESS FOR THIS PAGE</h1>
          <br>
          <br>
          <a href="index.php" class="btn">BACK TO INDEX</a>
        
          <div class="details">
          </div>
        </div>
      </div>
    </div>
        
    </body>
</html>
