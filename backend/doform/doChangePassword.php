<?php
session_start();
	date_default_timezone_set("Asia/Bangkok"); 
	$date=date('l jS \of F Y h:i:s A');
	
include("connect.php");
$username=$_SESSION['username'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$cfnewpass= $_POST['cfnewpass'];
$query2=mysqli_query($connection,"SELECT * FROM user where username='$username'or email='$username'");
$query=mysqli_fetch_array($query2);
$password=$query['password'];

if($newpass=="")
{
	header("location:http://localhost/simetri/userchangepassword.php?error=New Password Must Be Filled");
}
else if($oldpass!==$password)
{
	header("location:http://localhost/simetri/userchangepassword.php?error=Wrong input Old Password");
}
else if($oldpass=="")
{
	header("location:http://localhost/simetri/userchangepassword.php?error=Old Password Must Be Filled");
} 
else if($cfnewpass=="")
{
	header("location:http://localhost/simetri/userchangepassword.php?error=Confirm New Password Must Be Filled");
}
else if($newpass!==$cfnewpass)
{
	header("location:http://localhost/simetri/userchangepassword.php?error=New Password and Confirm Password Must Be the same");
}
else if($newpass==$oldpass && $cfnewpass==$oldpass)
{
	header("location:http://localhost/simetri/userchangepassword.php?error=New Password and Confirm Password cant be the exact same as old password.");
}
else
{
    $insert_password="update user set password='$newpass'";
    $run_pass= mysqli_query($connection,$insert_password);
    header("location:http://localhost/simetri/login.php?success=Success change password please login again.");
    session_destroy();
}

?>