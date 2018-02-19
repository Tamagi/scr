<!DOCTYPE html>
<?php
include("backend/doform/connect.php");
session_start();
header("location:http://localhost/simetri");
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
    body{
        overflow: auto;
    }
    .login-full{
        position: fixed;    
    }
    </style>
</head>
<body>
    <div class="container-product">
        <?php 
            include("menus/header2.php");
            include("menus/left-menu.php");
            include("menus/bottom-menu.php");
        ?>     
        <div class="content-product">
            <img src="http://localhost/simetri/img/academy-image/Academy-Hero-Image.png" class="hero-image">
            <div class="homepage-product" alt="hero-image">
                <div class="homepage-product-container">
                </div>
                <div class="homepage-product-mid-container">
                    <div class="homepage-product-mid-container-content">
                        <p class="homepage-product-subtitle">
                            academy
                        </p>
                        <p class="homepage-product-title">
                            great coffee deserve great barista
                        </p>
                    </div>
                </div>
            </div>
            <div class="product-scroll-container" id="scroll">
                <svg version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                     x="0px" y="0px" width="40.7px" height="65.4px" viewBox="0 0 40.7 65.4"
                     style="overflow:scroll;enable-background:new 0 0 40.7 65.4;" xml:space="preserve" id="scroll">
                <style type="text/css">
                    .st2{fill:#010101;}
                </style>
                <defs>
                </defs>
                <g id="XMLID_15_">
                    <path id="XMLID_17_" class="st2" d="M20.3,65.4C9.1,65.4,0,56.3,0,45V20.3C0,9.1,9.1,0,20.3,0s20.3,9.1,20.3,20.3V45
                        C40.7,56.3,31.5,65.4,20.3,65.4z M20.3,3.5C11,3.5,3.5,11,3.5,20.3V45c0,9.3,7.6,16.8,16.8,16.8S37.2,54.3,37.2,45V20.3
                        C37.2,11,29.6,3.5,20.3,3.5z"/>
                    <rect id="XMLID_16_" x="18.6" y="11.6" class="st2" width="3.5" height="10.5"/>
                </g>
                </svg>
            </div>
        </div>
        <div class="content-many-product">
            <?php
                $academy_show = mysqli_query($connection,"select * from academy");
                while($academy_baris = mysqli_fetch_assoc($academy_show)){ 
            ?>
            <div class="content-many-product-container" id="content">
                <img src="http://localhost/simetri/img/academy-image/<?php echo $academy_baris['academy_image']; ?>" id="imghover" class="imghover">
                <div class="content-many-product-hover-container" id="hover">
                    <div class="content-many-product-hover-opacity">
                        
                    </div>
                    <div class="content-many-product-hover-content">
                        <p class="homepage-product-subtitle">Academy</p>
                        <p class="homepage-product-title"><?php echo $academy_baris['academy_name']; ?></p>
                        <div class="product-hover-button">
                            <?php if(isset($_SESSION['username'])){
                            ?>
                            <a href="http://localhost/simetri/academy_detail/<?php  echo $academy_baris['academy_id'];?>/<?php echo $academy_baris['academy_name'];?>">
                                <svg version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                     x="0px" y="0px" width="72.6px" height="68.1px" viewBox="0 0 72.6 68.1"
                                     style="overflow:scroll;enable-background:new 0 0 72.6 68.1;" xml:space="preserve">
                                <defs>
                                </defs>
                                <g id="XMLID_15_">
                                    <polygon id="XMLID_19_" class="st0" points="23.2,66.1 2.1,38.8 15.1,6.8 49.4,2.1 70.5,29.4 57.5,61.4 	"/>
                                    <g id="XMLID_16_">
                                        <line id="XMLID_18_" class="st1" x1="26.5" y1="34.1" x2="46.1" y2="34.1"/>
                                        <line id="XMLID_17_" class="st1" x1="36.3" y1="24.3" x2="36.3" y2="43.9"/>
                                    </g>
                                </g>
                                </svg>
                            </a>
                            <?php } ?>
                                <?php if(!isset($_SESSION['username'])){
                            ?>
                            <a href="http://localhost/simetri/academy_detail.php" onclick="mafun()">
                                <svg version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                     x="0px" y="0px" width="72.6px" height="68.1px" viewBox="0 0 72.6 68.1"
                                     style="overflow:scroll;enable-background:new 0 0 72.6 68.1;" xml:space="preserve">
                                <defs>
                                </defs>
                                <g id="XMLID_15_">
                                    <polygon id="XMLID_19_" class="st0" points="23.2,66.1 2.1,38.8 15.1,6.8 49.4,2.1 70.5,29.4 57.5,61.4 	"/>
                                    <g id="XMLID_16_">
                                        <line id="XMLID_18_" class="st1" x1="26.5" y1="34.1" x2="46.1" y2="34.1"/>
                                        <line id="XMLID_17_" class="st1" x1="36.3" y1="24.3" x2="36.3" y2="43.9"/>
                                    </g>
                                </g>
                                </svg>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="footer-product">
            <?php include("menus/footer.php");?>
        </div>
    </div>
<script>
    function mafun(){
        alert("Please login to continue.");
    }
    //menu left and menu bottom
    var side = document.getElementById('mySidenav');
    $('#menu-left-closer').click(function(){
        side.style.width="0%";
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
         function openNavbottom() {
        document.getElementById("mySidenav-bottom").style.height = "100%";
        document.getElementById("mySidenav-bottom").style.paddingTop = "60px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNavbottom() {
        document.getElementById("mySidenav-bottom").style.height= "0";
        document.getElementById("mySidenav-bottom").style.paddingTop = "0px";
        document.body.style.backgroundColor = "white";
    }
    //end of menu
    //scroll animation
    $(document).ready(function(){
        setInterval(function(){
            $('#scroll').animate({bottom: '120px'}, 700);
            $('#scroll').animate({bottom: '100px'},700);
        });
    });
    // end of scroll animation
   $(document).ready(function(){
    $('.imghover').each(function(){
    $(this).mouseenter(function() {
         $(this).closest('#content').find('#hover').css('opacity', '1');
         $(this).closest('#content').find('#hover').css("visibility", "visible");
            });
        });
    $('.content-many-product-hover-container').each(function(){
    $(this).mouseleave(function() {
         $(this).closest('#content').find('#hover').css('opacity', '0');
         $(this).closest('#content').find('#hover').css("visibility", "hidden");
            });
        });
    });
</script>
</body>
</html>