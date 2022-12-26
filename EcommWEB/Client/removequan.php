<?php

session_start();

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
include_once '../shared/connection.php';
$username=$_SESSION['username'];
$quantity=$_GET['quantity'];
$pid=$_GET['pid'];

if($quantity==1)
{
    include_once '../shared/connection.php';

    $cmd="Delete from cart where ( prodID='$pid' and username = '$username' ) ";
 
    $sql_status=mysqli_query($conn,$cmd);

    if($sql_status)
    {
        echo "<script>
        alert('Product Removed from Cart Quantity : 0');
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
}
else{

    $quantity=$quantity-1;


    $cmd="update cart set quantity = '$quantity'  where username = '$username' and prodID='$pid' ";

    $sql_status=mysqli_query($conn,$cmd);

    if($sql_status)
    {
        echo "<script> window.location.href='http://localhost/EcommWEB/Client/cart.php'</script>";
        die();
    }
    else
    {
        echo "<script>
        alert('Product Quantity could not be decreased');
        window.location.href='http://localhost/EcommWEB/Client/cart.php';   
        </>";
        die();
    }
    

}

?>