<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");

if(!isset($_SESSION['role'])){
    header("location:../index.php");
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
    <div class="container-contact">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> Help </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-content-container">
            <div class="contact-content-box">
                <div class="contact-content-box-header">
                    <img src="img/Need-Help-Icon.png">
                </div>
                <p class="contact-content-box-title">
                    need help?
                </p>
                <div class="contact-content-box-form">
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="contact-content-box-left">
                            <p>username</p>
                            <p>email</p>
                            <p>objective</p>
                            <p style="margin-top:35px;">message</p>
                        </div>
                        <div class="contact-content-box-right">
                            <input type="text" placeholder="Username" name="username" required><br>
                            <input type="text" placeholder="E-mail" name="email" required><br>
                            <input type="text" placeholder="Objective" name="obj" required><br>
                            <textarea placeholder="Message" required></textarea>
                        </div>
                        <div style="text-align:center">
                        <input type="submit" name="submit" value="send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
</script>
</body>
</html>