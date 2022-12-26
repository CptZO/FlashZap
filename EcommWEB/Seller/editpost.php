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

$pid=$_SESSION['pid'];
$name=$_POST['pname'];
$price=$_POST['price'];
$details=$_POST['details'];


if(null != ($actual_name=$_FILES['pdtimg']['name']))
{
    $actual_name=$_FILES['pdtimg']['name'];
    $tmp_path=$_FILES['pdtimg']['tmp_name'];

    $target_path="..//images//$actual_name";
    move_uploaded_file($tmp_path,$target_path);

}
else{
    $target_path=$_SESSION['imgpath'];
}

include_once '../shared/connection.php';

$cmd="update products set prodname ='$name',price='$price',details='$details',imgpath='$target_path' where prodid = '$pid' ";
$sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{

    echo "<script>
    alert('Product Updated Successfully');
    window.location.href='http://localhost/EcommWEB/Seller/view.php';  
    </script>";
    die();
}
else{
    echo "Update Failed";
    echo mysqli_error($conn);

}