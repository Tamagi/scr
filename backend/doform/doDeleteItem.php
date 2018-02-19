<?php
session_start();	
include("connect.php");
$username=$_SESSION['username'];
$id = $_GET['id'];
$cart = $_GET['cart'];
$delete_product = "delete from cart_items where product_id='$id' AND username='$username' AND cart_id='$cart'";
$delete_order = "delete from order_item where product_id='$id' AND username='$username' AND id='$cart'";
$run_delete = mysqli_query($connection,$delete_product);
$run_delete1= mysqli_query($connection,$delete_order);
header('location:http://localhost/simetri/cart');

?>