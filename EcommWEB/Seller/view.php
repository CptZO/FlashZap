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
    alert('Illegal Attempt to View products page!');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}

include 'navbar.php';

?>

<html>
  <head>

  <head>
  <body>
      <div class='products'>
        <?php
          
          $uname=$_SESSION['username'];

          include_once '../shared/connection.php';

          $cmd="select * from products where username ='$uname' and status = 1 ";

           $sql_result=mysqli_query($conn,$cmd);


          while($row=mysqli_fetch_assoc($sql_result))
          {
            
              
            $pid=$row['ProdID'];
            $name=$row['prodname'];
            $price=$row['price'];
            $details=$row['details'];
            $imgpath=$row['imgpath'];

            
            echo"
                  <div class='card'>
                  <div
                    class='image'
                    style='background-image: url($imgpath)'>  
                  </div>
                  <div class='content'>
                    <h2>$name</h2>
                    <p>$details</p>
                    <div class='details'>
                      <h3>Price : <span> ₹$price</span></h3>
                      <a href='editpdt.php?pid=$pid'>
                        <i class='fa-solid fa-pen-to-square fa-2x'></i>
                      </a>
                      <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletepdt.php?pid=$pid'>
                          <i class='fa-solid fa-trash fa-2x'></i> 
                      </a>
                    </div>
                  </div>
                </div>
              ";
              
          }
          ?>
</div> 
