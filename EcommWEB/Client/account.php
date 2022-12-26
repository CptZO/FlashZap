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

$username=$_SESSION['username'];

$cmd= "select * from userclient where usernamecl='$username'";

$sql_result=mysqli_query($conn,$cmd);

$row=mysqli_fetch_assoc($sql_result);

$address=$row['address']

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
          <h1>Account</h1>
          <div><h3> Username:  <input type="text" value="<?php echo "$username"?>" disabled> </h3> </div> 
          <br>
          <div> <h3>Address:  <input type="text" value="<?php echo "$address"?>" disabled></h3> </div> 
         
          <br>
          <div>
          <a href="address.php" class="btn">Change address</a> <a href="chgpass.php" class="btn">Change password </a>
          </div>
          
          <br>
          <br>
          <div>
          
          </div>

          <div class="details">
          </div>
        </div>
      </div>
    </div>
        
    </body>
</html>

