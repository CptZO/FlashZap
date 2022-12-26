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
    alert('Illegal Attempt to Restore, Login First to restore deleted products');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}


include_once "../shared/connection.php";

    
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    $cmd="update products set status = 1 where prodID = $pid";
    $sql_status=mysqli_query($conn,$cmd);
    if($sql_status)
    {
        echo "<script>
        alert('Product Restored Successfully');
        window.location.href='http://localhost/EcommWEB/Seller/view.php';  
        </script>";
        die();
    }
    else
    {
        echo "<script>
        alert('Product Could not be Restored! , Try Again');
        window.location.href='http://localhost/EcommWEB/Seller/restoreprod.php';  
        </script>";
        die();

    }
}
else{
    echo "<script>
    alert('Illegal Action , Product Could not be Restored!');
    window.location.href='http://localhost/EcommWEB/Seller/restoreprod.php';  
    </script>";
    die();
}





?>