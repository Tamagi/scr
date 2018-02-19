<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
$username =  $_SESSION['username'];
$pid=$_GET['id'];
$event_show11 = mysqli_query($connection,"select * from event where id='$pid'");
$count_event_ide= mysqli_fetch_array($event_show11);
$id_count=$count_event_ide['id'];
$idd = $pid-1;
if($pid==0){
    header("location:http://localhost/simetri/eventdetail/1");
}
else if($id_count==""){
    header("location:http://localhost/simetri/eventdetail/$idd");
}
$event_show = mysqli_query($connection,"select * from event where id='$pid'");
$event_show2 = mysqli_query($connection,"select * from event where id='$pid'");
$event_baris2 = mysqli_fetch_array($event_show2);
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
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
    <title>Simetri Coffee - Event <?php echo $event_baris2['event_name']; ?></title>
    <meta name="title" content="Simetri Coffee - Event <?php echo $event_baris2['event_name']; ?>">
    <meta name="description" content="<?php echo $event_baris2['event_detail']; ?>">
    <link rel="caronical" href="http://localhost/simetri/eventdetail/<?php  echo $event_baris2['id'];  ?>/<?php echo $event_baris2['event_name']; ?>">
    <meta property="og:url" content="http://localhost/simetri/eventdetail/<?php  echo $event_baris2['id'];  ?>/<?php echo $event_baris2['event_name']; ?>">
    <meta property="og:type" content="event">
    <meta property="og:title" content="Simetri Coffee - Event <?php echo $event_baris2['event_name']; ?>">
    <meta property="og:description" content="<?php echo $event_baris2['event_detail']; ?>">
    <meta property="og:site_name" content="Simetri Coffee">
    <meta property="og:image" content="http://localhost/simetri/img/event-image/<?php echo $event_baris2['event_image'];?>">
<style>
    body{
        overflow: auto;
    }
    .login-full{
        position: fixed;    
    }
    .menu-content a{
        color: white;
    }
    </style>
</head>
<body>
    <div class="container-event-detail">
        <?php 
            include("menus/headerwhite.php");
            include("menus/fullmenu.php");
        ?>    
        <?php 
                while($event_baris = mysqli_fetch_assoc($event_show)){ 
            ?>
        <div class="content-event-detail" style="background: url(http://localhost/simetri/img/event-image/<?php 
            echo $event_baris['event_image'];?>);background-position: center;
    background-size: cover;
    background-repeat: no-repeat;">
            <img src="http://localhost/simetri/img/event-image/<?php echo $event_baris['event_image'];?>" class="hero-image">
            <div class="homepage-event-detail">
                <div class="homepage-event-detail-container">
                </div>
                <div class="homepage-event-detail-mid-container">
                    <div class="homepage-event-detail-mid-container-content">
                        <p class="homepage-event-detail-subtitle" id="late1">
                            event
                        </p>
                        <p class="homepage-event-detail-title" id="late">
                            <?php echo $event_baris['event_name'];?>
                        </p>
                        <p class="homepage-event-detail-date" id="late2">
                            jakarta, <?php echo $event_baris['event_date'];?>
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
        <div class="content-event-detail-blog">
            <div class="content-event-detail-blog-container">
                <p><span class="big-letter"><?php echo $event_baris['first_letter'];?></span><?php echo $event_baris['event_content'];?>
                </p>
            </div>
            <div class="content-event-detail-blog-button">
                <p class="blog-prev"><a href="http://localhost/simetri/eventdetail/<?php echo $event_baris['id']-1;?>" style="text-decoration:none;">Prev</a></p>
                <p class="blog-line"></p>
                <p class="blog-next"><a href="http://localhost/simetri/eventdetail/<?php echo $event_baris['id']+1;?>" style="text-decoration:none;">next</a></p>
            </div>
        </div>
        <?php } ?>
        <div class="footer-product">
            <?php include("menus/footer.php"); ?>
        </div>
    </div>
<script>
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
//heading animation  
$(window).scroll(function () { 
   $('#late').css({
      'margin-top' : ($(this).scrollTop()/2)+"px"
   }); 
});
    $(window).scroll(function () { 
   $('#late1').css({
      'margin-top' : ($(this).scrollTop()/4)+"px"
   }); 
});
    $(window).scroll(function () { 
   $('#late2').css({
      'margin-top' : ($(this).scrollTop()/8)+"px"
   }); 
});
    $(window).scroll(function () { 
   $('#scroll').css({
      'margin-bottom' : -($(this).scrollTop()/2)+"px"
   }); 
});
//end of heading animation
</script>
</body>
</html>