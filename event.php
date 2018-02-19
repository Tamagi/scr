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
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
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
    #hoverp:hover{
        color: grey;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div class="container-event">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-event">
            <img src="http://localhost/simetri/img/event-image/Event-Hero-Image.jpg" class="hero-image">
            <div class="homepage-event-main">
                <div class="homepage-event-main-container">
                </div>
                <div class="homepage-event-main-mid-container">
                    <div class="homepage-event-main-mid-container-content">
                        <p class="homepage-event-subtitle">
                            event
                        </p>
                        <p class="homepage-event-title">
                            great coffee deserve great moment
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
        <div class="content-many-event">
            <?php
                $event_show = mysqli_query($connection,"select * from event");
                while($event_baris = mysqli_fetch_assoc($event_show)){ 
            ?>
            <div class="content-many-event-container" id="content">
                <div class="imghover" id="content-many-event-container-text">
                    <img src="http://localhost/simetri/img/event-image/<?php echo $event_baris['event_image']; ?>" id="imghover"class="imghover">
                    <p class="many-event-date"><?php echo $event_baris['event_date']; ?></p>
                    <p class="many-event-text"><?php echo $event_baris['event_detail']; ?></p>
                </div>
                <div class="content-many-event-hover-container" id="hover">
                    <div class="content-many-event-hover-opacity">
                        
                    </div>
                    <div class="content-many-event-hover-content">
                        <p class="homepage-event-subtitle">Event</p>
                        <a href="http://localhost/simetri/eventdetail/<?php  echo $event_baris['id'];  ?>/<?php echo $event_baris['event_name']; ?>"><p class="homepage-event-title" id="hoverp"><?php echo $event_baris['event_name']; ?></p>
                        <div class="event-hover-button">
                            
                                <svg version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                     x="0px" y="0px" width="72.6px" height="68.1px" viewBox="0 0 72.6 68.1"
                                     style="overflow:scroll;enable-background:new 0 0 72.6 68.1;" xml:space="preserve">
                                <defs>
                                </defs>
                                <g id="XMLID_15_">
                                    <g id="XMLID_47_">
                                        <polygon id="XMLID_48_" class="st0" points="23.2,66.1 2.1,38.8 15.1,6.8 49.4,2.1 70.5,29.4 57.5,61.4 		"/>
                                    </g>
                                    <g id="XMLID_16_">
                                        <g id="XMLID_18_">
                                            <g id="XMLID_19_">
                                                <path id="XMLID_29_" class="st1" d="M36.3,45.5c-1.4,0-2.6-0.1-3.8-0.4c-3.4-0.7-7-2.6-10.6-5.5c-1.7-1.4-3.1-2.6-4.1-3.8
                                                    c-0.9-1.1-0.9-2.5,0-3.6c0.3-0.4,0.7-0.8,1.3-1.4c2.5-2.5,5.2-4.5,7.9-5.9c2-1,4.1-1.8,6-2.1c1-0.2,2-0.3,3.3-0.3
                                                    c1.2,0,2.2,0.1,3.2,0.3c2,0.4,4,1.1,6,2.1c2.8,1.4,5.3,3.3,7.9,5.9c0.5,0.5,0.9,0.9,1.3,1.4c0.9,1.1,0.9,2.5,0,3.6
                                                    c-1,1.2-2.3,2.5-4,3.8c-3.6,2.9-7.2,4.7-10.7,5.5C38.9,45.4,37.7,45.5,36.3,45.5z M36.3,25.3c-0.9,0-1.9,0.1-2.8,0.2
                                                    c-1.6,0.3-3.3,0.9-5.3,1.9c-2.5,1.2-4.9,3-7.2,5.3c-0.1,0.1-0.3,0.3-0.6,0.6c-0.2,0.3-0.4,0.5-0.5,0.6l-0.1,0.1
                                                    c0.9,1.1,2.2,2.3,3.7,3.5c3.3,2.6,6.5,4.2,9.6,4.9c1,0.2,2.1,0.3,3.2,0.3c1.1,0,2.2-0.1,3.3-0.3c3.1-0.6,6.2-2.3,9.5-4.9
                                                    c1.6-1.3,2.8-2.4,3.7-3.5c0,0,0.1-0.1,0-0.1c-0.2-0.3-0.6-0.7-1.1-1.2c-2.3-2.3-4.7-4-7.2-5.3c-2-1-3.7-1.6-5.3-1.9
                                                    C38.2,25.4,37.3,25.3,36.3,25.3z"/>
                                                <path id="XMLID_26_" class="st1" d="M54.6,32.4c-0.4-0.5-0.8-0.9-1.3-1.3c-2.4-2.4-5-4.4-7.8-5.8c-2-1.1-4.1-1.8-6-2.1
                                                    c-1.2-0.2-2.2-0.3-3.2-0.3c-1,0-2.1,0.1-3.3,0.3c-2,0.4-4,1.1-6,2.1c-2.8,1.4-5.4,3.4-7.8,5.8c-0.5,0.5-0.9,0.9-1.3,1.3
                                                    c-0.8,1-0.8,2.3,0,3.3c1,1.2,2.4,2.4,4,3.8c3.6,2.9,7.1,4.7,10.5,5.4c1.2,0.3,2.5,0.4,3.8,0.4c1.3,0,2.5-0.1,3.7-0.4
                                                    c3.5-0.8,7-2.6,10.6-5.4c1.8-1.4,3.1-2.7,4-3.8C55.5,34.7,55.5,33.4,54.6,32.4z M52.9,34.2c-0.9,1.1-2.2,2.3-3.7,3.5
                                                    c-3.2,2.6-6.4,4.3-9.6,4.9c-1.2,0.2-2.2,0.3-3.2,0.3h-0.1c-1,0-2.1-0.1-3.2-0.3c-3.1-0.7-6.4-2.3-9.7-4.9
                                                    c-1.6-1.2-2.8-2.4-3.7-3.5c-0.1-0.1-0.1-0.2,0-0.4c0.1-0.1,0.3-0.4,0.5-0.6c0.3-0.3,0.5-0.5,0.6-0.6c2.4-2.3,4.8-4.1,7.3-5.4
                                                    c2-1,3.7-1.6,5.4-1.9c0.9-0.2,1.9-0.2,2.8-0.2c0.9,0,1.9,0.1,2.8,0.2c1.6,0.3,3.4,0.9,5.4,1.9c2.5,1.3,4.9,3,7.2,5.4
                                                    c0.5,0.5,0.9,0.9,1.1,1.2C53,34,53,34.1,52.9,34.2z"/>
                                                <path id="XMLID_23_" class="st1" d="M36.3,41.5c-2.1,0-3.8-0.7-5.3-2.2c-1.5-1.5-2.2-3.2-2.2-5.2c0-2,0.7-3.8,2.2-5.3
                                                    c1.4-1.4,3.2-2.2,5.3-2.2c2,0,3.8,0.7,5.2,2.2c1.4,1.5,2.2,3.2,2.2,5.3c0,2.1-0.7,3.8-2.2,5.2C40.1,40.7,38.4,41.5,36.3,41.5z
                                                     M36.3,29.3c-1.3,0-2.4,0.5-3.4,1.4c-0.9,0.9-1.4,2-1.4,3.4c0,1.3,0.5,2.4,1.4,3.3c0.9,0.9,2.1,1.4,3.4,1.4
                                                    c1.3,0,2.4-0.5,3.3-1.4c0.9-0.9,1.4-2,1.4-3.4c0-1.3-0.5-2.4-1.4-3.4C38.7,29.8,37.6,29.3,36.3,29.3z"/>
                                                <path id="XMLID_20_" class="st1" d="M36.3,26.8c-2,0-3.7,0.7-5.1,2.1c-1.4,1.4-2.1,3.1-2.1,5.1c0,2,0.7,3.7,2.1,5.1
                                                    c1.4,1.4,3.2,2.1,5.1,2.1c2,0,3.7-0.7,5.1-2.1c1.4-1.4,2.1-3.1,2.1-5.1c0-2-0.7-3.7-2.1-5.1C40,27.5,38.3,26.8,36.3,26.8z
                                                     M39.8,37.6c-1,1-2.1,1.4-3.5,1.4c-1.4,0-2.6-0.5-3.5-1.5c-1-1-1.5-2.1-1.5-3.5c0-1.4,0.5-2.5,1.5-3.5c1-1,2.1-1.5,3.5-1.5
                                                    c1.4,0,2.5,0.5,3.5,1.5c1,1,1.4,2.1,1.4,3.5C41.3,35.4,40.8,36.6,39.8,37.6z"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                </svg>
                        </div>
                        </a>
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