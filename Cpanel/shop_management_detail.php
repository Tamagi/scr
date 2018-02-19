<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(!isset($_GET['shop']))
    header("location:shop_management.php");
$shopname=$_GET['shop'];
$get_shop=mysqli_query($connection,"select * from products where id='$shopname'");
$run_shop=mysqli_fetch_assoc($get_shop);
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
                <form action="doform/doCpEditShop.php?shop=<?php echo $shopname; ?>" method="post" enctype="multipart/form-data">
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
                                    <p>product price</p>
                                    <p>product stock</p>
                                    <p>product description</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="name" value="<?php echo $run_shop['product_name'];?>" palceholder="Product Name">
                                    <input type="text" name="origin" value="<?php echo $run_shop['origin'];?>">
                                    <input type="text" name="price" value="<?php echo $run_shop['product_price'];?>">
                                    <input type="text" name="stock" value="<?php echo $run_shop['stock'];?>" palceholder="Stock">
                                    <textarea name="desc"><?php echo $run_shop['product_description'];?></textarea>
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
                                    <p>product size</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="brew" value="<?php 
                                     $brew= $run_shop['product_brew'];
                                    $get_brew=mysqli_query($connection,"select * from brew_type where brew_id=$brew");
                                    $run_brew=mysqli_fetch_array($get_brew);
                                    echo $run_brew['brew_type'];
                                    ?>" palceholder="shopname" disabled>
                                    
                                   <input type="text" name="process" value="<?php 
                                     $process= $run_shop['product_process'];
                                    $get_process=mysqli_query($connection,"select * from process_type where process_id=$process");
                                    $run_process=mysqli_fetch_array($get_process);
                                    echo $run_process['process_type'];
                                    ?>" palceholder="shopname" disabled>
                                    
                                    <input type="text" name="roast" value="<?php 
                                     $roast= $run_shop['product_roast'];
                                    $get_roast=mysqli_query($connection,"select * from roast_type where roast_id=$roast");
                                    $run_roast=mysqli_fetch_array($get_roast);
                                    echo $run_roast['roast_type'];
                                    ?>" palceholder="shopname" disabled>
                                    
                                    <input type="text" name="varietals" value="<?php echo $run_shop['product_varietals'];?>" palceholder="shopname" disabled>
                                    
                                    <input type="text" name="size" value="<?php 
                                     $size= $run_shop['product_size'];
                                    $get_size=mysqli_query($connection,"select * from coffee_bag_size where bag_id=$size");
                                    $run_size=mysqli_fetch_array($get_size);
                                    echo $run_size['bag_size'];
                                    ?>" palceholder="shopname" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="shop-management-detail-content-box-image">
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
                                                <img src="../img/shop-image/<?php echo $run_shop['product_image'];?>" class="edite">
                                            </div> 
                                        </div>
                                        <div class="management-content-box-image-right">
                                            <div class="management-content-box-image-button" >
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