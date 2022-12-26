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


$uname=$_SESSION['username'];
$name=$_POST['pname'];
$price=$_POST['price'];
$details=$_POST['details'];


$actual_name=$_FILES['pdtimg']['name'];

$tmp_path=$_FILES['pdtimg']['tmp_name'];

$target_path="..//images//$actual_name";

move_uploaded_file($tmp_path,$target_path);

include_once '../shared/connection.php';

if($price==0) //database elimination statement
{
    echo "<script>
    alert('Illegal Attempt to Upload page!');
    window.location.href='http://localhost/EcommWEB/Seller/login.html';  
    </script>";
    die;
}

$cmd="insert into products(username,prodname,price,details,imgpath) values ('$uname','$name','$price','$details','$target_path')";
$sql_status=mysqli_query($conn,$cmd);



if($sql_status)
{

    echo "<script>
    alert('Product Uploaded Successfully');
    window.location.href='http://localhost/EcommWEB/Seller/view.php';  
    </script>";
    die();
}
else{
    echo "Upload Failed";
    echo mysqli_error($conn);


}


?>