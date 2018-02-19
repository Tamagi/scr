<?php
include("backend/doform/connect.php");
session_start();
$username =  $_SESSION['username'];
$address = $_POST['address'];
    $query="update user set address='$address' where username='$username'";
    $result= mysqli_query($connection,$query);
?>