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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        form
        {
            border:2px solid #89fc89;
            padding :50px;
        }
        .create{
            color:#89fc89;

        }
    </style>
    <title>Upload Product</title>
</head>
<body>
    <?php include ("navbar.php"); ?>
    <div class="d-flex justify-content-center align-items-center vh-100 ">

        <form enctype="multipart/form-data" action="uploadprod.php" method="post" >
            
            <div class="create"><b><h3>Upload Product</h3></b></div>
            <br>

            <h6><b>Enter product name </b></h6>
            <input type="text" name="pname" id="usn" placeholder="Enter Product Name" class="form-control mb-2" required>

            <h6><b>Enter price</b></h6>
            <input type="number" name="price" id="pri" placeholder="Enter Product price!"
            class="form-control mb-2" required>

            <textarea name="details" class="form-control mb-2"  id="txtar" cols="30" rows="10" placeholder="Enter product description"></textarea>
           
            <input type="file" name="pdtimg" class="form-control mb-2" id="" accept="image/png, image/jpeg" required>
        
            <input type="submit"  value = "Submit" class="bg-success btn text-white sub mt-3 ">

            

        </form>
    </div>
    
</body>
</html>