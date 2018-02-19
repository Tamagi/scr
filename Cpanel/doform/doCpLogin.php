<?php
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('l jS \of F Y h:i:s A');

include("connect.php");
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$query2=mysqli_query($connection,"SELECT * FROM cpanel_user where username='$username' and password='$password'");
$query=mysqli_fetch_array($query2);
$role=$query['role'];
$count=mysqli_num_rows($query2);
if($username=="")
{
	header("location:../cpanel_login.php?error=Username Must Be Filled");
}
else if($password=="")
{
	header("location:.../cpanel_login.php?error=Password Must Be Filled");
} 
else if($count==1){
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    $_SESSION['last_login_timestamp']=time();
    header("Location:../index.php");
}
else
{
    header("location:../cpanel_login.php?error=Wrong Username or Password");
}

?>