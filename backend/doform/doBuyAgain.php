<?php
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('Y-m-d H:i:s');
include("connect.php");
$username = $_SESSION['username'];
$pro_id = $_POST['pid'];
$query=mysqli_query($connection,"select * from products where product_id='$pro_id'");
$baris=mysqli_fetch_array($query);
$name=$baris['product_name'];
    header("location:http://localhost/simetri/product/$pro_id&$name");
?>