<?php

session_start();
include_once '../shared/connection.php';

if(isset($_SESSION['username']))
{
    if(time()-$_SESSION["login_time_stamp"] >3600) 
    {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}
else{
  echo "<script>
    alert('Login first to view the Account!');
    window.location.href='http://localhost/EcommWEB/Client/loginuser.html';  
    </script>";
    die;
   
}
include 'navbaruser.php';

$username=$_SESSION['username'];
$oldpass =$_POST['oldpass'];
$newpass =$_POST['newpass'];

$input_hash=md5($oldpass);
$hashnew=md5($newpass);

$cmd = "select * from userclient where usernamecl = '$username' and password = '$input_hash'";

$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count==1)
{   
    $cmd1 = "update userclient set password = '$hashnew' where usernamecl = '$username' ";

    $sql_result=mysqli_query($conn,$cmd1);
    if($sql_result)
    {
        echo "<script>
        alert('Password Changed Successfully');
        window.location.href='account.php';  
        </script>";
        die;
    }
    else
    {
        echo "<script>
        alert('Password could not be changed!');
        window.location.href='account.php';  
        </script>";
        die;

    }

    
}
else{
    echo "<script>
    alert('Incorrect Old Password!');
    window.location.href='chgpass.php';  
    </script>";
    die;
}
?>
