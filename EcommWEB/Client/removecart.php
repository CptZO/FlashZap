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

$pid=$_GET['pid'];


    include_once '../shared/connection.php';


    $cmd="delete from cart where username = '$username' and prodid='$pid'";
 
    $sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{
    echo "<script>
    window.location.href='http://localhost/EcommWEB/Client/cart.php';  
    </script>";
    die();
}
else
{
    echo "<script>
    alert('Product could not be deleted');
    window.location.href='http://localhost/EcommWEB/Client/cart.php';   
    </script>";
    die();
}
