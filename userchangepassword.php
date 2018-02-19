<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
$username=$_SESSION['username'];
$get_user=mysqli_query($connection,"select * from user where username='$username'");
$run_user=mysqli_fetch_assoc($get_user);
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
    <div class="container-user-change-pass">
        <div class="login-back">
            <img src="http://localhost/simetri/img/login/Back-Icon.png"> <a href="http://localhost/simetri/user_profile">Back to profile</a>
        </div>
        <div class="content-login">
            <div class="content-edit-profile-image-container">
                <img src="http://localhost/simetri/img/profile/<?php echo $run_user['user_image'];?>" class="edit-profile-image">
            </div>
            <div class="login-form">
                <h1 class="login-title">change password</h1>
                <form action="http://localhost/simetri/backend/doform/doChangePassword.php" method="post" enctype="multipart/form-data">
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Password-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="password" name="oldpass" placeholder="Old Password">
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Password-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="password" name="newpass" placeholder="New Password">
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Password-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="password" name="cfnewpass" placeholder="Confirm New Password">
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
                    </label>
                <br>
                <div class="login-button" align="center">
                    <input type="submit" class="login" name="change" value="Change">
                </div>
                </form>
            </div>
        </div>
    </div>

<script>
</script>
</body>
</html>