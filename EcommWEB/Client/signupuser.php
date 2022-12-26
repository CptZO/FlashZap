<?php

$uname=$_POST['username'];
$pass1=$_POST['password'];
$pass2=$_POST['repassword'];

if($pass1!=$pass2)
{
    echo "<script>
    alert('Password Mismatch');
    window.location.href='http://localhost/EcommWEB/Client/signupuser.html';  
    </script>";
    die;
}

include_once "../shared/connection.php";

$query="select * from userclient where usernamecl='$uname'";

$sql_result=mysqli_query($conn,$query);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count>0)
{
    echo "<script>
    alert('Username already taken , try different username ');
    window.location.href='http://localhost/EcommWEB/Client/signupuser.html';  
    </script>";
    
    die();
}

$hash=md5($pass1);



$query="insert into userclient(usernamecl,password) values ('$uname','$hash')";


$sql_status=mysqli_query($conn,$query);
if($sql_status)
{
    echo "<script>
    alert('User signup Success! Reloading to Login Page');
    window.location.href='http://localhost/EcommWEB/Client/loginuser.html';  
    </script>";
    die();
}
else{
    echo "<script>
    alert('Failed Signup!');
    window.location.href='http://localhost/EcommWEB/Client/signupuser.html';  
    </script>";
    die;
}

?>