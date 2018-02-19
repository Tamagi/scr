<!DOCTYPE html>
<?php
include("doform/connect.php");
session_start();
if(isset($_SESSION['username'])){
    header("location:index.php");
}
if(!isset($_SESSION['role'])){
    session_destroy();
}
else if(isset($_SESSION['role'])){
    header("location:index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Cstyle.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
</style>
</head>
    
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-login">
        <?php include("left_menu.php");?>
        <div class="login-content-container">
            <div class="login-content-1">
                <p class="login-content-title">Login to Creatheavity Panel</p>
                <form method="post" enctype="multipart/form-data" action="doform/doCpLogin.php">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="img/Profil-Icon.png">
                        </div>
                        <div class="icon-text">
                            <input type="text" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="icon-box">
                        <div class="icon">
                            <img src="img/Password-Icon.png">
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
                    <div class="login-button" align="center">
                        <input type="submit" class="login" name="login" value="login">
                    </div>
                    <!--<a href="forgotpassword.php" class="forgotpassword" align="center">Forgot Password?</a>-->
                    <br>
                </form>
            </div>
        </div>
    </div>
<script>
</script>
</body>
</html>