<?php
session_start();
	date_default_timezone_set("Asia/Bangkok"); 
	$date=date('l jS \of F Y h:i:s A');
	
include("connect.php");
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$query2=mysqli_query($connection,"SELECT * FROM user where username='$username'or email='$username' and password='$password'");
$count=mysqli_num_rows($query2);

if($username=="")
{
	header("location:http://localhost/simetri/login.php?error=Username Must Be Filled");
}
else if($password=="")
{
	header("location:http://localhost/simetri/login.php?error=Password Must Be Filled");
} 
else if($count==1){
    $_SESSION['username'] = $username;
    $_SESSION['last_login_timestamp'] = time();
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
else
{
    header("location:http://localhost/simetri/login.php?error=Wrong Username or Password");
}

?>