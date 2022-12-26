<?php
session_start();
include_once '../shared/connection.php';


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

$username=$_SESSION['username'];
$Address=$_POST['address'];

$cmd="update userclient set address = '$Address' where usernamecl = '$username'";

$sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{
    echo "<script>alert('Address added Successfully');
     window.location.href='http://localhost/EcommWEB/Client/viewproduser.php'</script> ";
    die();
}
else
{
    echo "<script>
    alert('Address could not be Added');
    window.location.href='http://localhost/EcommWEB/Client/cart.php';   
    </script>";
die();
}