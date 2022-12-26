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

$cmd="select * from userclient where usernamecl='$username'";

$sql_result=mysqli_query($conn,$cmd);

$row=mysqli_fetch_assoc($sql_result);

if($row['address']==null)
{
    echo "<script>
    alert('Please add Address to Proceed ');
    window.location.href='http://localhost/EcommWEB/Client/Address.php';  
    </script>";
    die;
}
else{

    $Address=$row['address'];
    $totalprice=$_SESSION['totalprice'];

    $cmd="select * from products join cart on cart.prodID=products.prodID where cart.username='$username'";


    $sql_result=mysqli_query($conn,$cmd);

    while($row1=mysqli_fetch_assoc($sql_result))
    {
        $pid=$row1['ProdID'];
        $quantity=$row1['quantity'];
        $price=$row1['price'];

        $totprodprice =$quantity*$price;

        $insert_cmd="insert into orders(prodID,usernameod,address,totalprice,quantityod) values ('$pid','$username','$Address','$totprodprice','$quantity')";
        $sql_status=mysqli_query($conn,$insert_cmd);


    }

    if($sql_result)
    {
        echo "<script>alert('Order Placed Successfully');
        window.location.href='http://localhost/EcommWEB/Client/Order.php'</script> ";
        die();
    }
    else
    {
        echo mysqli_error($conn);
        // echo "<script>
        // alert('Order could not Processed');
        // window.location.href='http://localhost/EcommWEB/Client/cart.php';   
        // </script>";
    die();
    }
}

?>
