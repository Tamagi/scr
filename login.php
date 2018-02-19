<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/simetri/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/simetri/responsive.css">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    .footer{
        position: absolute;
    }
    </style>
</head>
<body>
    <div class="container-login">
        <div class="login-back">
            <img src="http://localhost/simetri/img/login/Back-Icon.png"> <a href="index.php">Back to home</a>
        </div>
        <div class="content-login">
            <div class="header-logo" align="center">
                <img src="http://localhost/simetri/img/login/Simetri-Full-Icon.png">
            </div>
            <div class="login-form">
                <form method="post" enctype="multipart/form-data" action="">
                <h1 class="login-title">Please login.</h1>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Username-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Password-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
                    <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['error']))
                        {
                            echo $_REQUEST['error'];
                        }
                        ?>
                    </label>
                    <label style="color:green">
                        <?php 
                            if(isset($_REQUEST['success']))
                                {
                                    echo $_REQUEST['success'];
                                }
                        ?>
                    </label><br>
                <a href="http://localhost/simetri/forgotpassword" class="forgotpassword" align="center">Forgot Password?</a>
                <br>
                <div class="login-button" align="center">
                    <input type="submit" class="login" name="login" value="login">
                </div>
                </form>
            </div>
        </div>
        <div class="register-link">
            <p>Not a member yet? <a href="http://localhost/simetri/register">Register here</a></p>
        </div>
    </div>

<script>
</script>
</body>
</html>
<?php
if(isset($_POST['login'])){
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('l jS \of F Y h:i:s A');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$query2=mysqli_query($connection,"SELECT * FROM user where username='$username'or email='$username'and password='$password'");
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
    header("Location:http://localhost/simetri/edit_profile");
}
else
{
    header("location:http://localhost/simetri/login.php?error=Wrong Username or Password");
}
}
?>