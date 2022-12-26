<?php
session_start();

if($_SESSION['login']==true)
{
    if(time()-$_SESSION["login_time_stamp"] >600) 
    {
        session_unset();
        session_destroy();
        header("Location:login.html");
        die;
    }

}
else{
    echo "<script>
    alert('Illegal Attempt to Delete, Login First to delete product');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}


include_once "../shared/connection.php";

    
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    $cmd="update products set status= 0 where prodid = '$pid'";
    $sql_status=mysqli_query($conn,$cmd);
    if($sql_status)
    {
        echo "<script>
        alert('Product Deleted Successfully');
        window.location.href='http://localhost/EcommWEB/Seller/view.php';  
        </script>";
        die();
    }
    else
    {
        echo "<script>
        alert('Product Could not be Deleted!');
        window.location.href='http://localhost/EcommWEB/Seller/view.php';  
        </script>";
        die();

    }
}
else{
    echo "<script>
    alert('Illegal Attempt , Product Could not be Deleted!');
    window.location.href='http://localhost/EcommWEB/Seller/view.php';  
    </script>";
    die();
}





?>