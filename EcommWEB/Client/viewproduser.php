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
   
}

include 'navbaruser.php';

?>

<html>
  <head>

  <head>
  <body>
      <div class='products'>
        <?php
          
          //$uname=$_SESSION['username'];

          include_once '../shared/connection.php';

          $cmd="select * from products where status = 1 ";

           $sql_result=mysqli_query($conn,$cmd);


          while($row=mysqli_fetch_assoc($sql_result))
          {
            
              
            $pid=$row['ProdID'];
            $name=$row['prodname'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];

            
            echo"<div class='card'>
                  <div
                    class='image'
                    style='background-image: url($imgpath)'>  
                  </div>
                  <div class='content'>
                     <h2>$name</h2>
                     <p>$details</p>
                     <div class='details'>
                        <h3>Price : <span> ₹$price</span></h3>
                        <a href='addcart.php?pid=$pid'><i class='fa-solid fa-cart-shopping fa-2x'></i></a>
                      </div>
                   </div>
                </div>
              ";
              
          }
          ?>
</div> 
<?php include 'footer.php'; ?>
</body>
</html>
