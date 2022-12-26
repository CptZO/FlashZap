<?php

session_start();

$pid=$_GET['pid'];

if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];

    include_once '../shared/connection.php';


    $cmd="select * from cart where username = '$username' and prodid='$pid'";
 
    $sql_result=mysqli_query($conn,$cmd);

    $total_row_count=mysqli_num_rows($sql_result);
    
    if($total_row_count==1)
    {
        echo "<script>
        alert('Product is already in Cart');
        window.location.href='viewproduser.php';  
        </script>";
        die;
    }
    else{

        $cmd="insert into cart(prodid,username) values ('$pid','$username')";

        $sql_status=mysqli_query($conn,$cmd);

        if($sql_status)
        {
        
            echo "<script>
            alert('Product Added to Cart Successfully');
            window.location.href='http://localhost/EcommWEB/Client/viewproduser.php';  
            </script>";
            die();
        }
        else{
            echo "<script>
            alert('Product could not be Added');
            window.location.href='http://localhost/EcommWEB/Client/viewproduser.php';  
            </script>";
            die();
        }
    }
}
else
{
    echo "<script>
    alert('To add products in cart ! Login First');
    window.location.href='Loginuser.html';  
    </script>";
    die;
}

?>
