<?php


$conn = new mysqli("localhost","root","","flashzap");

if($conn->connect_error)
{
    echo " Connection Failed";
    die;
}

?>