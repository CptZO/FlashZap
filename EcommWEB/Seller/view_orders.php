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
    alert('Illegal Attempt to Upload page!');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}

include "navbar.php";

include_once "../shared//connection.php";



?>

<html>
    <head>
    <style>
      th, td {
        border: 5px solid #89fc89;
        padding: 20px;

      }
      table{
        margin-left: 20%;
        margin-top: 2%;
      }
      h1{
        font-size: 50px !important;
        display: flex;
        margin-left: 30%;
      }
    </style>
    
    </head>
    <body>
        <h1>ORDER PLACED BY CLIENT</h1>
        <?php
        echo "
        <table class='table table-border w-50'>
        <tr class='border'>
           <th class='head'>Order ID </th>
           <th class='head'>Product ID</th>
           <th class='head'>Quantity</th>
           <th class='head'>Client Username</th>
           <th class='head'>Address</th>
       <tr>";

        $cmd="select * from orders join products on products.ProdID=orders.prodid where products.username='$username'";
        
        $sql_result=mysqli_query($conn,$cmd);

       
        
        while($row=mysqli_fetch_assoc($sql_result))
        {
            $orderID=$row['orderID'];
            $pid=$row['prodID'];
            $quantity=$row['quantityod'];
        
            $usernameod=$row['usernameod'];
        
            $address=$row['address'];
            
            echo " <tr class='border'>
            <tr class='border'>
                <td class='head'>$orderID</td>
                <td class='head'>$pid</td>
                <td class='head'>$quantity</td>
                <td class='head'>$usernameod</td>
                <td class='head'>$address</td>
            <tr>";

        }

        echo "</table>";
        ?>

    </body>
</html>
