<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
header("location:http://localhost/simetri");
$username =  $_SESSION['username'];
if(!isset($_SESSION['username']))
header("http://localhost/simetri/location:academy.php");
$pid=$_GET['pid'];
$academy_show = mysqli_query($connection,"select * from academy where academy_id='$pid'");
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
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    </style>
</head>
<body>
    <div class="container-academy-detail">
        <div class="header-2nd">
            <div class="menu-bar-2nd">
                <div class="menu-content">
                    <a href="http://localhost/simetri/"><img src="http://localhost/simetri/img/default-image/Simetri-Logo-Black.png"></a> <a href="http://localhost/simetri/academy.php">back</a>
                </div>
                <div class="menu-title" align="center">
                    <img src="http://localhost/simetri/img/default-image/Simetri-Logo-Black.png">
                </div>
                <div class="menu-bar-kanan" align="right">
                    <?php if(!isset($_SESSION['username'])){
                        ?>
                    <div class="menu-login"id="menu-login">
                        <ul>
                            <li class="login-image" id="menuLogin" onclick="full">
                                <a class="login-toggle" href="http://localhost/simetri/login.php" id="navLogin" onclick="full()"><img src="http://localhost/simetri/img/default-image/Profil-Icon-Black.png"></a>
                            </li>
                        </ul>
                    </div>
                    <?php
                       }
                        else{
                    ?>
                    <div class="menu-cart" id="menu-cart">
                        <a href="http://localhost/simetri/cart.php"><img src="http://localhost/simetri/img/default-image/Cart-Icon-Black.png" width="40"height="40"></a>
                    </div>
                    <?php  
                        $username=$_SESSION['username'];
                        $user_image=mysqli_query($connection,"select * from user where username='$username'");
                        $imagess=mysqli_fetch_assoc($user_image);
                        $name=$imagess['name'];
                    ?>
                    <div class="menu-user" id="menu-user">
                        <img src="http://localhost/simetri/img/profile/<?php echo $imagess['user_image']; ?>" width="40"height="40" alt="user-image">
                        <a href="javascript:void(0)" class="userdropbtn"style="text-decoration:none;"><span>&nbsp;<?php echo $name; ?></span></a>
                        <div class="user-dropdown-content">
                            <div class="user-dropdown-myprofile">
                            <span>My Profile</span>
                            <a href="http://localhost/simetri/user_profile.php"><?php echo $name; ?></a>
                            </div>
                            <hr class="user-dropdown-lining">
                            <a href='http://localhost/simetri/user_transaction_history.php'>Trasaction history</a>
                            <hr class="user-dropdown-lining">
                            <a href='http://localhost/simetri/backend/doform/doLogout.php'>logout</a>
                        </div>
                    </div>
                        <?php
                            }
                    ?>                    
                </div>
            </div>
        </div>
        <div class="content-academy-detail">
            <?php 
                while($academy_baris = mysqli_fetch_assoc($academy_show)){ 
            ?>
            <div class="academy-detail-image-container" style="background:url(http://localhost/simetri/img/academy-image/<?php echo $academy_baris['academy_image'];?>);background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
            </div>
            <div class="academy-detail-content-right">
                <div class="academy-detail-content-container">
                    <div class="academy-detail-stock">
                        <p class="stock">available</p>
                    </div>
                    <div class="academy-detail-subtitle">
                        <p class="academy-subtitle">academy</p>
                    </div>
                    <div class="academy-detail-title">
                        <p class="academy-title"><?php echo $academy_baris['academy_name'] ?></p>
                    </div>
                    <div class="academy-detail-image-mobile">
                        <img src="img/academy-image/<?php echo $academy_baris['academy_image'];?>">
                    </div>
                    <div class="academy-detail-text">
                        <p class="academy-text"><?php echo $academy_baris['academy_description']; ?></p>
                    </div>
                    <div class="academy-detail-date">
                        <p class="academy-date">
                            <?php $date =$academy_baris['academy_time'];
                                $timestamp= strtotime($date);
                                echo date("l",$timestamp);?>,&nbsp;<?php echo $date?>
                       </p>
                    </div>
                    <div class="academy-detail-types">
                        <div>
                            <p class="academy-detail-types-top-text">place</p>
                            <p class="academy-detail-types-bot-text">simetri</p>
                        </div>
                        <div>
                            <p class="academy-detail-types-top-text">time</p>
                            <p class="academy-detail-types-bot-text"><?php echo $academy_baris['time_start'] ?>- <?php echo $academy_baris['time_end'] ?></p>
                        </div>
                        <div>
                            <p class="academy-detail-types-top-text">capacity</p>
                            <p class="academy-detail-types-bot-text"><?php echo $academy_baris['academy_limit'];?> people</p>
                        </div>
                    </div>
                    <form action="http://localhost/simetri/backend/doform/doRegisterAcademy.php?pid=<?php echo $academy_baris['academy_id'];?>" method="post" enctype="multipart/form-data">
                    <input type="text" style="display:none;" id="price" value="<?php echo $academy_baris['academy_price'];?>">
                    <div class="academy-detail-size">
                        <input type="button" value='-' class="qtyminus">
                        <input type="text" id="quantity" name="person-qty" class="qty" value="1">
                        <input type="button" value='+' class="qtyplus">
                    </div>
                    <div class="academy-detail-price">
                        <div><p class="rp">RP&nbsp;</p><p class="price"><input class="price" id="total"type="text" value="<?php echo number_format($academy_baris['academy_price'],'0',',','.');?>" readonly></p>
                        <p class="rp">,-</p>
                        </div>
                    </div>
                    <div class="academy-detail-button">
                        <input type="submit" class="addcart" name="addcart" value="add to cart">
                    </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<script>
    $('#quantity').on('change',function(){
    var tot = $('#price').val() * this.value;
    $('#total').val(tot);
});
    $('.qtyplus').click(function(e){
        e.preventDefault();
        var qty= $('#quantity');
        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal)&& currentVal < 2) {
            qty.val(currentVal + 1);
        } else {
            qty.val(2);
        }

        //Trigger change event
        qty.trigger('change');
    });
    $('.qtyminus').click(function(e){
        e.preventDefault();
        var qty= $('#quantity');
        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal)&& currentVal > 0) {
            qty.val(currentVal - 1);
        } else {
            qty.val(0);
        }

        //Trigger change event
        qty.trigger('change');
    });
</script>
</body>
</html>