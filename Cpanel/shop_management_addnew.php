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
    <title>shop Management Detail - Creatheavity panel.</title>
<style>
    .management-content-box-panel-left p {
        height: 60px;
    }
    .management-content-box-panel-right input[type=text] {
        height: 60px;
    }
    .management-content-box-panel-right input[type=number] {
        height: 60px;
    }
    .management-content-box-panel-right select{
        height: 60px;
    }
    .shop-management-content-each-size-panel-content{
        padding: 20px 0px 0px 40px;
    }
    .shop-management-content-each-size-panel input[type=checkbox]{
        font-family: Proxima novasemi;
        font-size: 16px;
        border: 0;
        border-bottom: 2px solid black;
        width: 20px;
        height: 20px;
        outline: none;
        background: white;
        color: white;
    }
    .checkbox-size-text{
        position: absolute;
        margin-top: -30px;
        margin-left: 40px;
        font-family: Proxima novasemi;
        font-size: 20px;
        letter-spacing: 4px;
    }
    .management-content-box-image-button input[type=file] {
        font-size: 25px;
        opacity: 1;
        position: absolute;
        top: 43px;
        left: 125px;
        max-width: 150px;
        opacity: 0;
        cursor: pointer;
    }
    .shop-management-content-each-size-panel-left{
        float: left;
        width: 150px;
    }
    .shop-management-content-each-size-panel-left p{
        position: relative;
        font-family: Proxima novasemi;
        font-size: 20px;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 20px;
        height: 40px;
    }
    .shop-management-content-each-size-panel-right input[type=text]{
        font-family: Proxima novasemi;
        font-size: 16px;
        letter-spacing: 4px;
        margin-bottom: 20px;
        border: 0;
        border-bottom: 2px solid black;
        width: 300px;
        height: 40px;
        padding: 0px 0px 10px 10px;
        outline: none;
    }
    .shop-management-content-each-size-panel input[type=number]{
        font-family: Proxima novasemi;
        font-size: 16px;
        letter-spacing: 4px;
        margin-bottom: 20px;
        border: 0;
        border-bottom: 2px solid black;
        width: 300px;
        height: 40px;
        padding: 0px 0px 10px 10px;
        outline: none;
    }
    .shop-management-content-each-size-panel{
        margin-bottom: 40px;
    }
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-shop-management-detail">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span><a href="shop_management.php"> shop Management  </a></span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-management-detail-content-container">
            <div class="shop-management-detail-content-box">
                <div class="management-content-header">
                    <img src="img/Shop-Icon.png">
                    <p class="management-content-header-title">shop</p>
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
                <form action="doform/doCpAddShop.php" method="post" enctype="multipart/form-data">
                <div class="management-content-box-split">
                    <div class="management-content-box-left">
                        <div class="management-content-box-title">
                            <p>Shop <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <p>product name</p>
                                    <p>product origin</p>
                                    <p>product description</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="name"  placeholder="Product Name">
                                    <input type="text" name="origin" placeholder="origin">
                                    <textarea name="desc" placeholder="Description"></textarea>
                                </div>
                                <div class="shop-management-content-size-panel">
                                    <div class="shop-management-content-each-size-panel">
                                        <input type="checkbox" name="size[]" value="1"><p class="checkbox-size-text"> 100gr</p>
                                        <div class="shop-management-content-each-size-panel-content">
                                            <div class="shop-management-content-each-size-panel-image" style="position:relative;height:120px;" id="uploadImg1">
                                                <img src="img/Upload-Image.jpg" class="edit" height="100" width="100" style="float:left;">
                                                <div class="management-content-box-image-button" style="margin-top:40px;margin-left:20px;float:left;">
                                                <p>Upload Image</p>
                                                <input type="file" name="imagesize[]" id="filesize1" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                                </div>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-left">
                                                <p>Price</p>
                                                <p>Stock</p>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-right">
                                            <input type="text" name="price[]" placeholder="price">
                                            <input type="number" name="stock[]" min="1" placeholder="Stock">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="shop-management-content-each-size-panel">
                                        <input type="checkbox" name="size[]" value="2"><p class="checkbox-size-text"> 250gr</p>
                                        <div class="shop-management-content-each-size-panel-content">
                                            <div class="shop-management-content-each-size-panel-image" style="position:relative;height:120px;" id="uploadImg2">
                                                <img src="img/Upload-Image.jpg" class="edit" height="100" width="100" style="float:left;">
                                                <div class="management-content-box-image-button" style="margin-top:40px;margin-left:20px;float:left;">
                                                <p>Upload Image</p>
                                                <input type="file" name="imagesize[]" id="filesize2" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                                </div>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-left">
                                                <p>Price</p>
                                                <p>Stock</p>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-right">
                                            <input type="text" name="price[]" placeholder="price">
                                            <input type="number" name="stock[]" min="1" placeholder="Stock">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-management-content-each-size-panel">
                                        <input type="checkbox" name="size[]" value="3"><p class="checkbox-size-text"> 500gr</p>
                                        <div class="shop-management-content-each-size-panel-content">
                                            <div class="shop-management-content-each-size-panel-image" style="position:relative;height:120px;" id="uploadImg3">
                                                <img src="img/Upload-Image.jpg" class="edit" height="100" width="100" style="float:left;">
                                                <div class="management-content-box-image-button" style="margin-top:40px;margin-left:20px;float:left;">
                                                <p>Upload Image</p>
                                                <input type="file" name="imagesize[]" id="filesize3" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                                </div>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-left">
                                                <p>Price</p>
                                                <p>Stock</p>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-right">
                                            <input type="text" name="price[]" placeholder="price">
                                            <input type="number" name="stock[]" min="1" placeholder="Stock">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-management-content-each-size-panel">
                                        <input type="checkbox" name="size[]" value="4"><p class="checkbox-size-text"> 1000gr</p>
                                        <div class="shop-management-content-each-size-panel-content">
                                            <div class="shop-management-content-each-size-panel-image" style="position:relative;height:120px;" id="uploadImg4">
                                                <img src="img/Upload-Image.jpg" class="edit" height="100" width="100" style="float:left;">
                                                <div class="management-content-box-image-button" style="margin-top:40px;margin-left:20px;float:left;">
                                                <p>Upload Image</p>
                                                <input type="file" name="imagesize[]" id="filesize4" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                                </div>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-left">
                                                <p>Price</p>
                                                <p>Stock</p>
                                            </div>
                                            <div class="shop-management-content-each-size-panel-right">
                                            <input type="text" name="price[]" placeholder="price">
                                            <input type="number" name="stock[]" min="1" placeholder="Stock">
                                            </div>
                                        </div>
                                    </div>
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
                                    <p>product brew</p>
                                    <p>product process</p>
                                    <p>product roast</p>
                                    <p>product varietals</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <select name="brew">
                                        <option value="0">-select one-</option>
                                        <?php 
                                        $get_brew=mysqli_query($connection,"select * from brew_type");
                                        while($run_brew=mysqli_fetch_array($get_brew)){
                                            $brew_id=$run_brew['brew_id'];
                                            $brew_type=$run_brew['brew_type'];
                                        echo "<option value='$brew_id'>$brew_type</option>";
                                        }
                                    ?>
                                    </select>
                                    
                                   <select name="process">
                                        <option value="0">-select one-</option>
                                        <?php 
                                        $get_process=mysqli_query($connection,"select * from process_type");
                                        while($run_process=mysqli_fetch_array($get_process)){
                                            $process_id=$run_process['process_id'];
                                            $process_type=$run_process['process_type'];
                                        echo "<option value='$process_id'>$process_type</option>";
                                        }
                                    ?>
                                    </select>
                                    
                                    <select name="roast">
                                        <option value="0">-select one-</option>
                                        <?php 
                                        $get_roast=mysqli_query($connection,"select * from roast_type");
                                        while($run_roast=mysqli_fetch_array($get_roast)){
                                            $roast_id=$run_roast['roast_id'];
                                            $roast_type=$run_roast['roast_type'];
                                        echo "<option value='$roast_id'>$roast_type</option>";
                                        }
                                    ?>
                                    </select>
                                    
                                    <input type="text" name="varietal"  placeholder="varietal">
                                </div>
                            </div>
                        </div>
                        <div class="shop-management-detail-content-box-image">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left">
                                    <div class="management-content-box-title">
                                        <h1>Upload Hero <br>Image.</h1>
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
                                            <div class="management-content-box-image-button" style="margin-top:40px">
                                                <p>Upload Image</p>
                                                <input type="file" name="image" id="file" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload" style="left:165px;">
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
    
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadImg1 img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#filesize1").change(function(){
        readURL1(this);
    });
    
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadImg2 img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#filesize2").change(function(){
        readURL2(this);
    });
    
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadImg3 img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#filesize3").change(function(){
        readURL3(this);
    });
    
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadImg4 img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#filesize4").change(function(){
        readURL4(this);
    });
</script>
</body>
</html>