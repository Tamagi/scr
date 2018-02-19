<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
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
    .register-link{
        bottom: -100px;
    }
    </style>
</head>
<body>
    <div class="container-register">
        <div class="login-back">
            <img src="http://localhost/simetri/img/login/Back-Icon.png"> <a href="http://localhost/simetri/">Back to home</a>
        </div>
        <div class="content-register">
            <div class="header-logo" align="center">
                <img src="http://localhost/simetri/img/login/Simetri-Full-Icon.png">
            </div>
            <div class="login-form">
                <h1 class="login-title">Please register.</h1>
                    <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
                        }
                        ?>
                    </label><br>
                <form action="backend/doform/doRegister.php" method="post" enctype="multipart/form-data">
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Username-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="text" name="name" placeholder="Front Name(1 word)" maxlength="20">
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Username-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="text" name="username" placeholder="Username(max 20 character)" maxlength="20">
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Email-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="text" name="email" placeholder="Email">
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
                <div class="icon-box">
                    <div class="icon">
                        <img src="http://localhost/simetri/img/login/Password-Icon.png">
                    </div>
                    <div class="icon-text">
                        <input type="password" name="cfpassword" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="login-button" align="center">
                    <input type="submit" class="register" name="register" value="register">
                </div>
                </form>
            </div>
            <div class="register-link">
                <p>Back to<a href="http://localhost/simetri/login"> Login page</a></p>
            </div>
        </div>
    </div>

<script>
</script>
</body>
</html>