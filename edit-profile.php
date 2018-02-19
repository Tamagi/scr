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
    .content-edit-profile-box{
        position: relative; 
    }
    .confirmation-image-upload{
        font-size: 40px;
    }
    </style>
</head>
<body>
    <div class="container-edit-profile">
        
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>         
        <div class="content-edit-profile">
            <div class="content-edit-profile-header">
                <p class="homepage-edit-profile-title">edit profile</p>
                <p class="homepage-edit-profile-subtitle">basic information</p>
            </div>
            <div class="content-edit-profile-container">
                <form action="http://localhost/simetri/backend/doform/doUpdateProfile.php" enctype="multipart/form-data" method="post">
                <div class="content-edit-profile-inside">
                    <div class="content-edit-profile-image-container" >
                        <div class="content-edit-profile-image-box" id="uploadForm">
                            <img src="http://localhost/simetri/img/profile/<?php echo $run_user['user_image'];?>" class="edit-profile-image">
                        </div>
                        <div class="edit-image">
                            <div class="content-edit-profile-box">
                                <input type="file" name="image" id="file" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                            </div>
                            <a href="">
                                <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="60px" height="56.1px" viewBox="0 0 60 56.1" style="overflow:scroll;enable-background:new 0 0 60 56.1;"
                                 xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#FFFFFF;}
                            </style>
                            <defs>
                            </defs>
                            <g>
                                <path class="st0" d="M38,23.4L24.8,41l-6.7,1.9L18.1,36l12.6-16.8c0.4-0.5,0.3-1.2-0.2-1.6c-0.5-0.4-1.2-0.3-1.6,0.2L16.1,35
                                    c-0.1,0.2-0.2,0.4-0.2,0.7l0.1,8.8c0,0.3,0.2,0.7,0.4,0.9c0.2,0.2,0.5,0.3,0.8,0.2c0.1,0,0.1,0,0.1,0l8.4-2.4
                                    c0.2-0.1,0.4-0.2,0.6-0.4l13.4-17.9c0.4-0.5,0.3-1.2-0.2-1.6C39,22.8,38.3,22.9,38,23.4z"/>
                                <path class="st0" d="M42.2,13.4l-2.5-1.9c-1-0.8-2.3-1.1-3.6-0.9c-1.3,0.2-2.4,0.9-3.2,1.9l-1.4,1.9c-0.4,0.5-0.3,1.2,0.2,1.6
                                    l8.5,6.4c0.2,0.2,0.5,0.2,0.8,0.2c0.3,0,0.6-0.2,0.7-0.4l1.4-1.9C44.8,18,44.3,15,42.2,13.4z M41.4,18.8l-0.7,1l-6.7-5l0.7-1
                                    c0.4-0.6,1-0.9,1.7-1c0.7-0.1,1.4,0.1,1.9,0.5l2.5,1.9C42,16,42.3,17.7,41.4,18.8z"/>
                                <path class="st0" d="M20.7,39.6c0.2,0.2,0.5,0.2,0.8,0.2c0.3,0,0.6-0.2,0.7-0.4l12.7-17c0.4-0.5,0.3-1.2-0.2-1.6
                                    c-0.5-0.4-1.2-0.3-1.6,0.2L20.4,38C20.1,38.5,20.2,39.2,20.7,39.6z"/>
                                <path d="M41.4,0l-30,4.1L0,32.1l18.6,23.9l30-4.1l11.4-28L41.4,0z M17.2,45.5c-0.3,0-0.6,0-0.8-0.2c-0.3-0.2-0.4-0.5-0.4-0.9
                                    l-0.1-8.8c0-0.2,0.1-0.5,0.2-0.7l12.8-17.2c0.4-0.5,1.1-0.6,1.6-0.2c0.5,0.4,0.6,1.1,0.2,1.6L18.1,36l0.1,6.9l6.7-1.9L38,23.4
                                    c0.4-0.5,1.1-0.6,1.6-0.2c0.5,0.4,0.6,1.1,0.2,1.6L26.4,42.7c-0.1,0.2-0.4,0.3-0.6,0.4l-8.4,2.4C17.3,45.5,17.3,45.5,17.2,45.5z
                                     M33.1,21c0.4-0.5,1.1-0.6,1.6-0.2c0.5,0.4,0.6,1.1,0.2,1.6l-12.7,17c-0.2,0.2-0.4,0.4-0.7,0.4c-0.3,0-0.6,0-0.8-0.2
                                    c-0.5-0.4-0.6-1.1-0.2-1.6L33.1,21z M43.2,20.2L41.8,22c-0.2,0.2-0.4,0.4-0.7,0.4c-0.3,0-0.6,0-0.8-0.2l-8.5-6.4
                                    c-0.5-0.4-0.6-1.1-0.2-1.6l1.4-1.9c0.8-1,1.9-1.7,3.2-1.9c1.3-0.2,2.6,0.1,3.6,0.9l2.5,1.9C44.3,15,44.8,18,43.2,20.2z"/>
                                <path d="M40.9,15.2l-2.5-1.9c-0.6-0.4-1.3-0.6-1.9-0.5c-0.7,0.1-1.3,0.5-1.7,1l-0.7,1l6.7,5l0.7-1C42.3,17.7,42,16,40.9,15.2z"/>
                            </g>
                            </svg>
                            </a>
                        </div>
                        
                    </div>
                    <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
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
                    <div class="content-edit-profile-name">
                        <div class="content-edit-profile-name-left">
                            <p>first name</p>
                            <input type="text" name="fname" placeholder="First Name" value="<?php echo $run_user['name'];?>" required>
                        </div>
                        <div class="content-edit-profile-name-right">
                            <p>last name</p>
                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $run_user['lname'];?>"required>
                        </div>
                    </div>
                    <div class="content-edit-profile-status-left">
                        <p>gender</p>
                        <select name="gender" style="width: 100%;
                        margin-left: 0;
                        text-align-last: auto;">
                            <option value="<?php echo $run_user['gender'];?>" selected >
                            <?php echo $run_user['gender'];?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="content-edit-profile-status-right">
                        <p>birthdate</p>
                        <select name="days" id="days">
                            <option value="<?php echo $run_user['dayofbirth']; ?>" selected><?php echo $run_user['dayofbirth']; ?></option>
                            <option value="0" disabled>DD</option>
                        </select>
                        <select name="months" id="months">
                            <option value="<?php echo $run_user['monthofbirth']; ?>" selected ><?php echo $run_user['monthofbirth']; ?></option>
                            <option value="0" disabled>MM</option>
                        </select>
                        <select name="years" id="years">
                            <option value="<?php echo $run_user['yearofbirth']; ?>" selected ><?php echo $run_user['yearofbirth']; ?></option>
                            <option value="0" disabled>YYYY</option>
                        </select>
                    </div>
                    <p>City</p>
                    <select name="city" style="width: 100%;
                        margin-left: 0;
                        text-align-last: auto;">
                        <option value="<?php echo $run_user['city'];?>" selected readonly>
                        <?php echo $run_user['city'];?></option>
                        <?php $get_city=mysqli_query($connection,"select * from shipping_detail where s_id='1'");
                        while($run_city=mysqli_fetch_array($get_city)){
                            $city_name=$run_city['s_detail_destination'];
                        ?>
                        <option value="<?php echo $city_name;?>"><?php echo $city_name;?></option>
                        <?php
                        }     
                        ?>
                    </select>
                    <p class="address-edit">address</p>
                    <textarea class="address-textarea" placeholder="Address" name="address" maxlength="300" required><?php echo $run_user['address'];?></textarea>
                    <p>email address</p>
                    <input type="text" name="email" placeholder="Email" value="<?php echo $run_user['email'];?>"required>
                    <p>phone number</p>
                    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $run_user['phone_number'];?>"required>
                    <input type="submit"name="save-profile" class="save" value="save">
                </div>
                </form>
                <div class="content-edit-password">
                    <a href="http://localhost/simetri/userchangepassword"><h1 class="change-password-header">change password</h1></a>
                </div>
            </div>
        </div>
    </div>
<script>
    $("#file").change(function () {
        filePreview(this);
    });
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
    //day script
    var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];

    for (i = new Date().getFullYear(); i > 1900; i--){
        $('#years').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 13; i++){
        $('#months').append($('<option />').val(i).html(i));
    }
     updateNumberOfDays(); 

    $('#years, #months').on("change", function(){
        updateNumberOfDays(); 
    });
    function updateNumberOfDays(){
        $('#day').html('');
        month=$('#months').val();
        year=$('#years').val();
        days=daysInMonth(month, year);

        for(i=1; i < days+1 ; i++){
                $('#days').append($('<option />').val(i).html(i));
        }
        $('#message').html(monthNames[month-1]+" in the year "+year+" has <b>"+days+"</b> days");
    }

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }
    //end of day script
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadForm + img').remove();
                $('#uploadForm').after('<img src="'+e.target.result+'"class="edit-profile-image" style="z-index: 100;position: relative;"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>