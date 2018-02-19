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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    body{
        overflow: auto;
    }
    @media only screen and (max-width:479px){
        .save{
            font-size: 20px;
            letter-spacing: 10px;
        }   
    }
    </style>
</head>
<body>
    <div class="container-user-profile">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-user-profile">
            <div class="content-edit-profile-header">
                <p class="homepage-edit-profile-title">my profile</p>
                <p class="homepage-edit-profile-subtitle">basic information</p>
            </div>
            <div class="content-user-profile-container">
                <div class="content-user-profile-inside">
                    <div class="content-edit-profile-image-container">
                        <img src="http://localhost/simetri/img/profile/<?php echo $run_user['user_image'];?>" class="edit-profile-image">
                    </div>
                    <div class="content-user-profile-name">
                        <div class="content-user-profile-name-left">
                            <p>first name</p>
                            <span><?php echo $run_user['name']; ?></span>
                        </div>
                        <div class="content-user-profile-name-right">
                            <p>last name</p>
                            <span><?php echo $run_user['lname']; ?></span>
                        </div>
                    </div>
                    <div class="content-user-profile-status">
                        <div class="content-user-profile-status-left">
                            <p>gender</p>
                            <span><?php echo $run_user['gender']; ?></span>
                        </div>
                        <div class="content-user-profile-status-right">
                            <p>birthdate</p>
                            <span><?php 
                                echo $run_user['dayofbirth']."-";
                                echo $run_user['monthofbirth']."-";
                                echo $run_user['yearofbirth'];
                                ?></span>
                        </div>
                    </div>
                    <div class="content-user-profile-address">
                        <p>address</p>
                        <span><?php echo $run_user['address']; ?></span>
                    </div>
                    <div class="content-user-profile-email">
                        <p>email address</p>
                        <span><?php echo $run_user['email']; ?></span>
                    </div>
                    <div class="content-user-profile-phone">
                        <p>phone number</p>
                        <span><?php echo $run_user['phone_number']; ?></span><br>
                    </div>
                    <div class="save" style="margin-bottom: 80px;"><a href="http://localhost/simetri/edit_profile">edit profile</a></div>
                </div>
            </div>
        </div>
        <div class="footer-product">
                <?php include("menus/footer.php");?>
        </div>
    </div>
<script>
    //menu left and menu bottom
    var side = document.getElementById('mySidenav');
    $('#menu-left-closer').click(function(){
        side.style.width="0%";
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
         function openNavbottom() {
        document.getElementById("mySidenav-bottom").style.height = "100%";
        document.getElementById("mySidenav-bottom").style.paddingTop = "60px";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNavbottom() {
        document.getElementById("mySidenav-bottom").style.height= "0";
        document.getElementById("mySidenav-bottom").style.paddingTop = "0px";
        document.body.style.backgroundColor = "white";
    }
    //end of menu
</script>
</body>
</html>