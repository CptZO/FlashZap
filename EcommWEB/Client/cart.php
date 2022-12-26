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

include 'navbaruser.php';

$totalprice=0;
?>

<!DOCTYPE html>
<html lang="en">
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
  </head>
  <body>

    <section class="cart">
      <div class="above">
        <h2 class="cart-title">Shopping Cart:</h2>
      </div>
      <div class='cart-wrapper'>
        <?php
                  $uname=$_SESSION['username'];

                  include_once '../shared/connection.php';

                  $cmd="select * from products join cart on cart.prodID=products.prodID where cart.username='$uname'";

                  $sql_result=mysqli_query($conn,$cmd);

                  while($row=mysqli_fetch_assoc($sql_result))
                  {
                    // print_r($row);
                    $pid=$row['ProdID'];
                    $name=$row['prodname'];
                    $price=$row['price'];
                    $details=$row['details'];
                    $imgpath=$row['imgpath'];

                    $quantity=$row['quantity'];
                    
                    echo "
                    <div class='cart-card'>
                            <div
                              class='watch-image'
                              style='background-image: url($imgpath)'
                              >
                            </div>
                            <div class='content'>
                              <h2>$name</h2>
                              <p>$details
                              </p>
                              <div class='details'>
                                <h3>Price : <span> ₹$price</span></h3>
                                <h3 class='quant-head'>Quantity</h3>
                              </div>

                              <div class='void-gap'>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div class='qty'>
                                  <div class='minus'>
                                    <a href='removequan.php?pid=$pid&&quantity=$quantity' style='color:#89fc89'><i class='fa-solid fa-minus fa-2x'></i></a>
                                  </div>
                                  <div class='no'><h3>$quantity</h3></div>
                                  <div class='plus' ><a href='addquan.php?pid=$pid&&quantity=$quantity' style='color:#89fc89' ><i class='fa-solid fa-plus fa-2x'></i></a></div>
                                </div>
                              </div>
                            </div>
                            <div class='trash'>
                              <a href='removecart.php?pid=$pid'><i class='fa-solid fa-trash fa-2x'></i></a>
                            </div>
                          </div>
                          ";
                          $totprodprice=$quantity*$price;
                        $totalprice = ($totprodprice) + $totalprice;
                  }
            ?>
        </div>
      <div class='bottom'>
        <div class='total'>
          <h3>Grand-Total:<span> ₹<?php echo $totalprice;
          $_SESSION['totalprice']=$totalprice; ?></span></h3>
        </div>
        <div class='out'>
          <a href='checkout.php' class='check-out'>Checkout</a>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>