<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="libs/js/instafeed.js-master/instafeed.min.js"></script>
        <script type="text/javascript">
            var feed = new Instafeed({
                get: 'user',
                userId: '2217590575',
                accessToken: '2217590575.5a7a2c9.c55385942d6e4802be1b1f67082f5a57',
                resolution:'low_resolution',
                limit:'18',
                template: '<div class="ig-container-image"><div class="ig-image"style="background: url({{image}});background-repeat: no-repeat; background-size: cover;background-position: center;"><a href="{{link}}" title="{{caption}}"><img src="{{image}}" style="opacity:0;"alt="{{caption}}"class="img-fluid"/></a></div></div>'
            });
            feed.run();
        </script>
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    body{
        overflow: auto;
    }
    .login-full{
        position: fixed;    
    }
    a:hover{
        text-decoration: none;
    }
    #instafeed{
        position: relative;
        width: 100%;
        height: auto;
        display: -webkit-flex; /* Safari */
        display: flex;
        flex-wrap: wrap;
    }
    .ig-container{
        position: relative;
        width: 1200px;
        height: auto;
        padding-top: 160px;
        margin: auto;
        margin-bottom: 80px;
    }
    .ig-container-image{
        padding:20px;width:33.3%;float: left;
    }
    .ig-image{
        width: 100%;
        overflow: hidden;
        height: 340px;
    }
    .ig-container-content{
        position: relative;
        width: 100%;
        height: auto;
        margin-bottom: 40px;
    }
    .ig-container-mid-content{
        position: relative;
        margin: auto;
    }
    @media only screen and (max-width:1300px){
        .ig-container{
            width: 800px;
            padding-top: 120px;
        }
        .ig-image{
            height: 246px;
        }
        .ig-container-image{
            padding: 10px;
        }
    }
    @media only screen and (max-width:800px){
        .ig-container{
            width: 500px;
            padding-top: 80px;
        }
        .ig-image{
            height: 150px;
        }
    }
    @media only screen and (max-width:480px){
        .ig-container{
            width: 100%;
            padding-top: 100px;
        }
        .ig-container-image{
            padding: 3px;
        }
    }
    </style>
</head>
<body>
    <div class="container-event">
        <?php 
            include("menus/header2.php");
            include("menus/left-menu.php");
            include("menus/bottom-menu.php");
        ?>  
        <div class="ig-container">
            <div class="ig-container-content">
                <div class="ig-container-mid-content">
                    <p class="homepage-subtitle">
                        join and enjoy
                    </p>
                    <p class="homepage-title" data-scroll-speed="3">
                        simetri coffee<br>events
                    </p>
                </div>
            </div>
            <div id="instafeed">
            </div>
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
    $(document).ready(function(){
    $('.imghover').each(function(){
    $(this).mouseenter(function() {
         $(this).closest('#content').find('#hover').css('opacity', '1');
         $(this).closest('#content').find('#hover').css("visibility", "visible");
            });
        });
    $('.content-many-event-hover-container').each(function(){
    $(this).mouseleave(function() {
         $(this).closest('#content').find('#hover').css('opacity', '0');
         $(this).closest('#content').find('#hover').css("visibility", "hidden");
            });
        });
    });
</script>
</body>
</html>