<?php

session_start();
include_once '../shared/connection.php';

if(isset($_SESSION['username']))
{
    if(time()-$_SESSION["login_time_stamp"] >3600) 
    {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}
else{
  echo "<script>
    alert('Login first to view the Account!');
    window.location.href='http://localhost/EcommWEB/Client/loginuser.html';  
    </script>";
    die;
   
}


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
            margin-top: 10px;
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
          <form action="chgpasspost.php" method="post">
                <h1>Password Change</h1>
                <div><h3> Old password:  <input type="password" name="oldpass" > </h3> </div> 
                <br>
                <div><h3> New password:  <input type="password" name="newpass" id="pass" pattern= "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  placeholder="Enter Password" onchange="testfuc()"  required> </h3> </div> 
                <br>
                <div><h3> Retype New password:  <input type="text" name="renewpass" id="repass" onkeyup="testfuc()"> </h3> </div> 
                <div>
                <input type="submit" value="Submit" class="btn form-control bg-success">
                </div>
          </form>
          
          <br>
          <br>
          <div>
          
          </div>

          <div class="details">
          </div>
        </div>
      </div>
    </div>
        <script>
        var password = document.getElementById("pass")
        function testfuc()
        {
            validatePassword();
            CheckPassword();
        }
        function validatePassword(){
            
            var Retyped = document.getElementById("repass");
            
            if(password.value != Retyped.value) 
            {
                Retyped.setCustomValidity("Passwords Don't Match");
            } else 
            {
                Retyped.setCustomValidity('');
            }
        }   
    
    </script>
    </body>
</html>
