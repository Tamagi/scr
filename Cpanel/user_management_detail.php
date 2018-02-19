<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(!isset($_GET['user']))
    header("location:user_management.php");
$username=$_GET['user'];
$get_user=mysqli_query($connection,"select * from user where user_id='$username'");
$run_user=mysqli_fetch_assoc($get_user);
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
    <title>User Management Detail - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-user-management-detail">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span><a href="user_management.php"> User Management  </a></span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-management-detail-content-container">
            <div class="user-management-detail-content-box">
                <div class="management-content-header">
                    <img src="img/User-Icon.png">
                    <p class="management-content-header-title">user</p>
                    <p class="management-content-header-subtitle">management</p>
                </div>
                <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
                        }
                        ?>
                    </label>
                    <label class="login-success" style="color:green">
                        <?php 
                            if(isset($_REQUEST['success']))
                                {
                                    echo $_REQUEST['success'];
                                }
                        ?>
                    </label>
                <form action="doform/doCpEditUser.php?id=<?php echo $username; ?>" method="post" enctype="multipart/form-data">
                <div class="management-content-box-split">
                    <div class="management-content-box-left">
                        <div class="management-content-box-title">
                            <p>User <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <p>first name</p>
                                    <p>last name</p>
                                    <p>gender</p>
                                    <p>birthdate</p>
                                    <p>address</p>
                                    <p style="margin-top:110px;">phone</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="fname" value="<?php echo $run_user['name'];?>" palceholder="First Name">
                                    <input type="text" name="lname" value="<?php echo $run_user['lname'];?>" palceholder="Last Name">
                                    <select name="gender" disabled>
                                        <option><?php echo $run_user['gender'];?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <input type="date" name="birthdate" value="<?php echo $run_user['yearofbirth'];?>-<?php echo $run_user['monthofbirth'];?>-<?php echo $run_user['dayofbirth'];?>">
                                    <textarea name="address"><?php echo $run_user['address'];?></textarea>
                                    <input type="text" name="phone" value="<?php echo $run_user['phone_number'];?>" palceholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="management-content-box-right">
                        <div class="management-content-box-title">
                            <p>Account <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <p>username</p>
                                    <p>email</p>
                                    <p>password</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="username" value="<?php echo $run_user['username'];?>" palceholder="username" disabled>
                                    <input type="text" name="email" value="<?php echo $run_user['email'];?>" palceholder="E-mail">
                                   <input type="password" name="password" value="<?php echo $run_user['password'];?>" placeholder="Password" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="user-management-detail-content-box-image">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <div class="management-content-box-title">
                                        <h1>Upload <br>Image.</h1>
                                    </div>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <div class="management-content-box-image-split">
                                        <div class="management-content-box-image-left">
                                            <div class="management-content-box-image-container" id="uploadForm">
                                                <img src="../img/profile/<?php echo $run_user['user_image'];?>" class="edite">
                                            </div> 
                                        </div>
                                        <div class="management-content-box-image-right">
                                            <div class="management-content-box-image-button">
                                                <p>Upload Image</p>
                                                <input type="file" name="image" id="file" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="management-content-box-image-big">
                                        <div class="management-content-box-image-big-container" id="uploadForm">
                                            <img src="img/Upload-Image.jpg">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="management-content-box-footer">
                        <input type="submit" name="submit" value="save">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadForm img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
    });
</script>
</body>
</html>