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
    <title>academy Management Detail - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-academy-management-detail">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span><a href="academy_management.php"> academy Management  </a></span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="academy-management-detail-content-container">
            <div class="academy-management-detail-content-box">
                <div class="management-content-header">
                    <img src="img/Academy-Icon.png">
                    <p class="management-content-header-title">academy</p>
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
                <form action="doform/doCpAddAcademy.php?academy=<?php echo $academyname; ?>" method="post" enctype="multipart/form-data">
                <div class="management-content-box-split">
                    <div class="management-content-box-left">
                        <div class="management-content-box-title">
                            <p>Basic <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left" style="width:37%">
                                    <p>Date</p>
                                    <p>academy name</p>
                                    <p>time</p>
                                    <p>price</p>
                                    <p>place</p>
                                    <p>capacity</p>
                                </div>
                                <div class="management-content-box-panel-right" style="width:63%">
                                    <input type="date" name="date">
                                    <input type="text" name="aname" placeholder="Academy Name">
                                    <input type="time" name="timestart">
                                    <span style="font-family:Proxima novasemi;font-size:20px;"> TO </span>
                                    <input type="time" name="timeend">
                                    <input type="text" name="price">
                                    <span style="margin-left:-30px;font-family:Proxima novasemi;font-size:14px;">IDR</span>
                                    <input type="text" name="place" placeholder="Place">
                                    <input type="number" name="capacity" placeholder="Academy Limit" maxlength="3">
                                    <span style="margin-left:-100px;font-family:Proxima novasemi;font-size:18px;">person</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="management-content-box-right">
                        <div class="management-content-box-title">
                            <p>Detail <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <p>details</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <textarea name="detail" placeholder="Detail (max 300 characters)"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="academy-management-detail-content-box-image">
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
                                                <img src="img/Upload-Image.jpg" class="edite">
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
                        <input type="submit" name="save" value="save">
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