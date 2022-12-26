<?php

session_start();

$_SESSION['login']=false;

$uname =$_POST['username'];
$pass =$_POST['password'];

$input_hash=md5($pass);

include_once "../shared/connection.php";

$cmd = "select * from user where username = '$uname' and password = '$input_hash'";

$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count==1)
{
    $_SESSION['login']=true;
    $_SESSION["login_time_stamp"] = time(); 
    $_SESSION['username']=$uname;
    echo "<script>
    alert('Login Success!');
    window.location.href='view.php';  
    </script>";
    die;
}
else{
    echo "<script>
    alert('Login Failed!');
    window.location.href='login.html';  
    </script>";
    die;
}
?>