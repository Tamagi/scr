<?php
include("backend/doform/connect.php");
session_start();
$username =  $_SESSION['username'];
$check=$_POST['selected'];
$query=mysqli_query($connection,"update user set ship='$check' where username='$username'");
?>