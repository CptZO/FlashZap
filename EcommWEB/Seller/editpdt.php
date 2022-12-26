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
    alert('Illegal Attempt to Edit product!');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}

include_once '../shared/connection.php';

$pid=$_GET['pid'];
$_SESSION['pid']=$pid;

$cmd="select * from products where prodid= '$pid' ";

$sql_result=mysqli_query($conn,$cmd);

$row=mysqli_fetch_assoc($sql_result);
$name=$row['prodname'];
$price=$row['price'];
$details=$row['details'];
$imgpath=$row['imgpath'];

$_SESSION['imgpath']=$row['imgpath'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        form
        {
            margin-top:30%;
            border:7px double #89fc89;
            padding :50px;
        }
        .img1{
            width:400px;
            height:400px;
        }
        .sub{
            width:100%
        }
    </style>
    <title>Edit product </title>
</head>
<body>
<?php include ("navbar.php"); ?>
    <div class="d-flex justify-content-center align-items-center vh-100 ">

        <form enctype="multipart/form-data" action="editpost.php" method="post" >
            
            <div class="create mb-1"><b><h2>Edit Product</h2></b></div>
            <br>

            <h6><b>Enter new Product name </b></h6>
            <input type="text" name="pname" id="usn" value="<?php echo $name ?>" class="form-control mb-4" >

            <h6><b>Enter new price</b></h6>
            <input type="number" name="price" id="pri" value="<?php echo $price ?>"
            class="form-control mb-4" >

            <textarea name="details" class="form-control mb-2"  id="txtar" cols="30" rows="10" ><?php echo $details ?></textarea>
           
            <input type="file" name="pdtimg" class="form-control mb-2" id="" accept="image/png, image/jpeg">
            <img class="img1" src="<?php echo $imgpath ?>" alt="SEl">
            <br>
        
            <input type="submit"  value = "Edit Product" class="sub bg-success btn text-white sub mt-3 ">

            

        </form>
    </div>
    
</body>
</html>