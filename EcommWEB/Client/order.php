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
        .cart-card
        {
            grid-template-columns: 20% 40% 40% !important;
        }
        .products .card .content p{
            margin: 1px 5px;
            min-height: 46px !important;
        }
        .btn
        {
            width: 50%;
            background-color: green; 
            padding: 10px;
            border-radius: 30px;
        }
        .void-gap h4{
            margin-right: 10% !important;
            margin-top: 0 !important;

        }
    </style>
  </head>
    <body>
    <section class="cart">
        <div class="cart-wrapper">
            <h1>Orders Placed</h1>
            <?php

                $cmd="select * from orders join Products on products.ProdID=orders.ProdID join userclient on orders.usernameod=userclient.usernamecl";

                $sql_result=mysqli_query($conn,$cmd);


                while($row=mysqli_fetch_assoc($sql_result))
                {
                
                    $oid=$row['orderID'];
                    $pname=$row['prodname'];
                    $price=$row['price'];
                    $address=$row['address'];
                    $imgpath=$row['imgpath'];
                    $totalprice=$row['totalprice'];
                    $quantity=($totalprice/$price);

                    echo "<div class='cart-card'>
                                <div
                                class='watch-image'
                                style='background-image: url($imgpath)'
                                >
                                </div>
                                <div class='content'>
                                    <h3>$pname</h3>
                                    <h2>Order No : FZSTORE$oid</h2>
                                    <div class='details'>
                                        <h7>Payment mode : <span> Cash on Delivery</span></h7> 
                                    </div>

                                    <div class='void-gap'>
                                        <div><h4>Price : <span> ₹$price </span></h4> </div>
                                        <div><h4>Quantity : <span>$quantity</span> </div>
                                        <div><h4 class='quant-head'>Total Price:₹$totalprice</h4></div>
                                    </div>
                                </div>
                                <div class='trash'>
                                    <h4>Delivery Address</h4>$address
                                </div>
                            </div>
                            ";
                }
            ?>
        </div>
    </section>
    <?php
        $cmd="Delete from cart where username='$username'"; //Clearing Cart
        $sql_status=mysqli_query($conn,$cmd);
    ?>
</body>
</html>
