<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
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
    <title>Simetri Coffee Cafe - Best Ground Coffee In Indonesia</title>
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
    <div class="container-cafe">
        <?php 
            include("menus/headerwhite.php");
            include("menus/fullmenu.php");
        ?>     
        <div class="content-cafe">
            <img src="http://localhost/simetri/img/index/cafe-background.jpg" class="hero-image">
            <div class="homepage-cafe-main">
                <div class="homepage-cafe-main-container">
                </div>
                <div class="homepage-cafe-main-mid-container">
                    <div class="homepage-cafe-main-mid-container-content">
                        <p class="homepage-cafe-subtitle">
                            cafe
                        </p>
                        <p class="homepage-cafe-title">
                            welcome to our humble space
                        </p>
                        <p class="homepage-cafe-text">
                            We’re a firm believer that our shop should tingle your productivity senss and a sport to fullfil your relaxing crave
                        </p>
                    </div>
                </div>
            </div>
            <div class="event-scroll-container" id="scroll">
                <svg version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                     x="0px" y="0px" width="40.7px" height="65.4px" viewBox="0 0 40.7 65.4"
                     style="overflow:scroll;enable-background:new 0 0 40.7 65.4;" xml:space="preserve" id="scroll">
                <style type="text/css">
                    .st2{fill:#FFFFFF;}
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
        <div class="content-many-cafe">
            <div class="content-many-cafe-left" id="content">
                <div></div>
                <div></div>
            </div>
            <div class="content-many-cafe-right" id="content">
                <div class="content-many-cafe-right-container">
                    <div class="content-many-cafe-right-container-image">
                        <img src="img/cafe-image/cafe-image-right-1.png">
                    </div>
                    <div class="content-many-cafe-right-container-content">
                        <div class="content-many-cafe-right-content">
                            <div class="content-many-cafe-right-content-1" style="margin-bottom:20px;">
                                <p class="many-cafe-title">GREAT PLACE TO IMMERSE YOURSELF</p>
                                <p class="many-cafe-text">Our coffee shop is perfect place to hangout a gateway from mundane busy life enjoying a perfect sip of great coffee and just get yourself relax.</p>
                            </div>
                            <div class="content-many-cafe-right-content-2">
                                <img src="img/cafe-image/coffee-icon.png">
                                <p class="many-cafe-subtitle">COFFEE</p>
                                <p class="many-cafe-text">We pledge ourself to be the best at our craft serving the best cup of coffee. We wanted you to taste the journey of the beans, where you can appreciate the beautiful taste of the coffee.</p>
                            </div>
                            <div class="content-many-cafe-right-content-3">
                                <img src="img/cafe-image/food-icon.png">
                                <p class="many-cafe-subtitle">FOOD</p>
                                <p class="many-cafe-text">Our chef prepares the most amazing meal for you night and day, whether you come in breakfast, brunch, or even dinner. Be sure to check out our cakes and pastry selection as well.</p>
                            </div>
                            <br>
                            <a class="many-cafe-link" href="product.php">SEE MENU</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-cafe-carousel">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="bg-1" style="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="bg-1" style="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="bg-1" style="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-cafe-location">
            <div class="content-cafe-location-container left">
                <div class="content-cafe-location-middle">
                    <img src="img/cafe-image/location-icon.png">
                    <p class="location-cafe-subtitle" style="color:white">JAKARTA</p>
                    <p class="location-cafe-text" style="color:white">Jl. Puri Kembangan 1 No. 16 <br>Jakarta Barat 11660</p>
                    <a href="https://www.google.co.id/maps/dir/''/simetri+coffee+maps/@-6.1603283,106.8250592,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e69f70b7ebe1689:0x38fe0a5d9623f204!2m2!1d106.7532217!2d-6.1839702"><img src="img/cafe-image/maps-icon.png"style="height:40px;"></a>
                    <a href="waze://?ll-6.183969,106.752706"><img src="img/cafe-image/waze-icon.png"style="height:47px;margin-top:12px;margin-left:10px;"></a>
                </div>
            </div>
            <div class="content-cafe-location-container right">
                <div class="content-cafe-location-middle">
                    <img src="img/cafe-image/location-icon.png">
                    <p class="location-cafe-subtitle" style="color:white">JOGJAKARTA</p>
                    <p class="location-cafe-text" style="color:white">Jl. Puri Kembangan 1 No. 16 <br>Jakarta Barat 11660</p>
                    <a href="https://www.google.co.id/maps/dir/''/simetri+coffee+maps/@-6.1603283,106.8250592,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e69f70b7ebe1689:0x38fe0a5d9623f204!2m2!1d106.7532217!2d-6.1839702"><img src="img/cafe-image/maps-icon.png"style="height:40px;"></a>
                    <a href="waze://?ll-6.183969,106.752706"><img src="img/cafe-image/waze-icon.png"style="height:47px;margin-top:12px;margin-left:10px;"></a>
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
    //opacity 
    $(function(){
        setheader();
        $(window).scroll(setheader);
    });
    function setheader(){
        if($(window).scrollTop() > 100) {
            $(".homepage-cafe-main-container").css("opacity","0.6");
        }
        else{
            $(".homepage-cafe-main-container").css("opacity","0");
        }
    }
$('.carousel').carousel({
    pause: "false"
});
</script>
</body>
</html>