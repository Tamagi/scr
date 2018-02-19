<?php
session_start();
	date_default_timezone_set("Asia/Bangkok"); 
	$date=date('Y-m-d H:i:s');
    include("connect.php");
    $pid=$_GET['pid'];
    $username=$_SESSION['username'];
    $qty=$_POST['quantity'];
    $size=$_POST['size'];
    if($size==0){
        echo"<script>alert('choose size please');window.location.href='http://localhost/simetri/product_detail/$pid';</script>";
    }
    else if($qty==0){
        echo"<script>alert('choose Quantity please');window.location.href='http://localhost/simetri/product_detail/$pid';</script>";
        
    }
else{
    $get_size=mysqli_query($connection,"select * from products where product_price='$size'");
    $row_size=mysqli_fetch_array($get_size);
    $psize = $row_size['product_size'];    
    
	$query = "insert into cart_items values('','$username','coffee','$pid','$psize', '$qty', '$date','') ";
    $query1 = "insert into order_item values ('','$username','coffee','$pid','$psize', '$qty', '$date','$date','cart pending','','')";

    $result = mysqli_query($connection,$query);

    $result1 = mysqli_query($connection,$query1);

    header("location:http://localhost/simetri/cart");
}
?>