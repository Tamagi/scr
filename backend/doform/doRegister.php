<?php
session_start();
	date_default_timezone_set("Asia/Bangkok"); 

	$date=date('l jS \of F Y h:i:s A');
	
include("connect.php");
$email = $_POST['email'];
$password = md5($_POST['password']);
$password1 = $_POST['password'];
$name = $_POST['name'];
$username = $_POST['username'];
$query2 = mysqli_query($connection,"SELECT username FROM user WHERE username='$username'");
$query1 = mysqli_query($connection,"SELECT email FROM user WHERE email='$email'");
$count=mysqli_num_rows($query1);
$count2=mysqli_num_rows($query2);

if($name=="")
{
	header("location:http://localhost/simetri/register.php?errors=Name Must Be Filled");
}
else if($password=="")
{
	header("location:http://localhost/simetri/register.php?errors=Password Must Be Filled");
}
else if(strlen($password1)<="7")
{
	header("location:http://localhost/simetri/register.php?errors=Password Must Be More Than 8 Character");
}
else if(preg_match("/(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]/",$password)){
    header("location:http://localhost/simetri/register.php?errors=Wrong Password Format!!");
}
else if ($email=="") {
    header("location:http://localhost/simetri/register.php?errors=E-Mail Must Be Filled");
  } 
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location:http://localhost/simetri/register.php?errors=Invalid Email Format");
    }
else if ($count==1) {
    header("location:http://localhost/simetri/register.php?errors=E-Mail already registered");
  } 
else if ($count2==1) {
    header("location:http://localhost/simetri/register.php?errors=Username already registered");
  }
else if (!preg_match("/^[a-zA-Z]*$/",$name)) {
      header("location:http://localhost/simetri/register.php?errors=Name Can be only contain letters");
    }
else
{
	$query = "insert into user values('','user-default.png', '$name','','$username', '$email', '$password','','Jakarta','','1','','','','') ";
	$result = mysqli_query($connection,$query);
    header("location:http://localhost/simetri/login.php?success= '$name' has been successfully created. Please login.");
  
}
?>