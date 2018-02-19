<!DOCTYPE html>

<?php
session_start();
include("backend/doform/connect.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simetri Coffee Roaster is the best coffee roaster in Indonesia">
    <meta property="og:title" content="Simetri Coffee roaster" />
    <meta property="og:type" content="coffee" />
    <meta property="og:url" content="https://creatheavity.com/customer_development/simetri_coffee/" />
    <meta property="og:image" content="https://creatheavity.com/customer_development/simetri_coffee/img/index/Logo-Simetri-Full.png" />
    <link rel="stylesheet" type="text/css" href="http://localhost/simetri/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/simetri/responsive.css">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="libs/js/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="libs/js/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css">
    <script src="libs/js/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
    
            <!-- jQuery library -->
        <script src="libs/js/jquery.js"></script>

        <!-- bootstrap JavaScript -->
        <script src="libs/css/bootstrap/docs-assets/js/holder.js"></script>
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
    
<style>
    .dropdown-menu{
        position:fixed;
        top: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        margin-left:0;
        background-color: transparent;
        padding: 0;
        z-index: 1000;
    }
    .linee svg{
        fill: #EAEAEA;
    }
    #menu-left-home-dropdown{
        font-family: proxima novabold;
        font-size: 16px;
        text-transform: uppercase;
        list-style-type: none;
    }
    #menu-left-home-dropdown ul{
         font-family: proxima nova;
        font-size: 14px;
        text-transform: uppercase;
        list-style-type: none;
    }
    #cafe{
        font-family: proxima nova;
        font-size: 16px;
        text-transform: uppercase;
    }
    #clients{
        font-family: proxima nova;
        font-size: 16px;
        text-transform: uppercase;
    }
    #contact{
        font-family: proxima nova;
        font-size: 14px;
        text-transform: uppercase;
    }
    .sidenav{
        background-color: transparent;
        opacity: 1;
        padding: 0;
    }
    .menu-left-dropdown-header-title{
        font-size: 24px;
        font-family: proxima nova;
        color: white;
        text-align: center;
    }
    .pembatas-menu-title{
        height: 1px;
        border: 1px solid white;
        width: 95%;
        margin: auto;
    }
    .owl-theme .owl-nav [class*=owl-] {
        background-color: transparent;
    }
    .owl-prev{
        left: -50px;
    }
    .owl-next{
        right: -50px;
    }
    .homepage-event-item:hover{
        opacity: 0.6;
    }
    .homepage-shop-item:hover{
        opacity: 0.6;
    }
    .footer{
        z-index: 10;
    }
    .product-scroll-container{
        bottom: 0px;
    }
    @media only screen and (max-width: 1184px) and (min-width: 817px){
        .product-scroll-container {
            margin-bottom: -60px;
        }
    }
</style>


<script>
   /*
    jQuery(window).scroll(function(){
        var vscroll = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
        jQuery('#homepage').css({
            "transform" : "translate(0px,"+vscroll/2+"px)"
        });
    });*/
$(document).ready(function () {
    $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#top-menu a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#top-menu table tr td a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}
</script>    
</head>
<body>
    <div class="container-home">
        <?php
            include("menus/headerwhite.php");
            include("menus/fullmenu.php");
        ?>
        <div class="content-box" id="main">
            <div class="homepage"id="homepage">
                <div class="homepage-container">
                </div>
                <video id="bgvid" playsinline autoplay muted loop class="homepage-container" style="position:fixed;">
                    <source src="http://localhost/simetri/Sequence%2001_1.mp4" type="video/mp4">
                </video>
                <div class="product-scroll-container">
                    <div id="scroll" data-scroll-speed="3" style="position:relative"> 
                        <a href="#homepage-shop"><svg version="1.1"
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
                        </a>
                    </div>
                </div>
            </div>
            <div class="homepage-shop"id="homepage-shop">
                <div class="homepage-shop-container">
                    <div class="homepage-shop-container-half">
                    </div>
                </div>
                <div class="homepage-shop-mid-container">
                    <div class="homepage-shop-mid-container-content">
                        <p class="homepage-subtitle">
                            shop
                        </p>
                        <div class="owl-carousel owl-theme" id="owl-carousel">
                            <?php 
                            $product_show = mysqli_query($connection,"select * from products where product_size=0");
                                while($product_baris = mysqli_fetch_assoc($product_show)){
                            ?>
                            <div class="homepage-shop-item">
                                <div class="homepage-shop-carousel-image-container">
                                    <a href="http://localhost/simetri/product_detail/<?php echo $product_baris['product_id'];?>/<?php echo $product_baris['product_name']; ?>"><img src="http://localhost/simetri/img/shop-image/<?php echo $product_baris['product_image']; ?>" style="width:auto;" alt=:"Coffee"></a>
                                </div>
                                <div class="homepage-shop-carousel-content-container">
                                    <p class="homepage-shop-carousel-subtitle"><?php echo $product_baris['origin']; ?></p>
                                    <a href="http://localhost/simetri/product_detail/<?php echo $product_baris['product_id'];?>/<?php echo $product_baris['product_name']; ?>" style="color:black;text-decoration:none;"><p class="homepage-shop-carousel-title"><?php echo $product_baris['product_name']; ?></p></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <p class="homepage-link" id="black-text">
                            <a href="http://localhost/simetri/product">shop now</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="homepage-cafe"id="homepage-cafe">
                <div class="homepage-cafe-container">
                </div>
                <div class="homepage-cafe-mid-container">
                    <div class="homepage-cafe-mid-container-content">
                        <p class="homepage-subtitle">
                            cafe
                        </p>
                        <p class="homepage-title">
                            great coffee deserves a great ambience
                        </p>
                        <p class="homepage-text">
                            We’re a firm believer that our shop        should tingle your productivity sense and a sport to fullfil your relaxing crave
                        </p>
                        <p class="homepage-link" id="white-text">
                            <a href="http://localhost/simetri/cafe">visit us</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="homepage-event"id="homepage-event">
                <div class="homepage-event-container">
                    <div class="homepage-event-container-news">
                        <div class="homepage-event-container-news-content middle">
                            <img src="img/index/news-icon.png" alt="icon">
                            <p class="homepage-subtitle" style="color:#525252">news</p>
                            <div class="homepage-event-container-content-box">
                                <?php
                                    $news_show = mysqli_query($connection,"select * from news order by news_date desc limit 2");
                                    while($news_baris = mysqli_fetch_assoc($news_show)){ 
                                ?>
                                <div class="homepage-event-container-news-content-box-each">
                                    <a href="newsdetail/<?php echo $news_baris['id']; ?>/<?php echo $news_baris['news_title']; ?>"><h1><?php  $time=strtotime($news_baris['news_date']); echo date("d-M-Y",$time) ;?></h1></a>
                                    <a href="newsdetail/<?php echo $news_baris['id']; ?>/<?php echo $news_baris['news_title']; ?>"><h2><?php echo $news_baris['news_title']; ?></h2></a>
                                    <p><?php echo $news_baris['news_detail']; ?></p>
                                </div>
                                <?php } ?>
                            </div>
                            <a href="news" class="news-links">know more</a>
                        </div>
                    </div>
                    <div class="homepage-event-container-event">
                        <div class="homepage-event-container-event-content middle">
                            <img src="img/index/event-icon.png" alt="icon">
                            <p class="homepage-subtitle" style="color:#525252">event</p>
                            <div class="homepage-event-container-content-box">
                                <?php
                                    $event_show = mysqli_query($connection,"select * from event order by id desc");
                                    while($event_baris = mysqli_fetch_assoc($event_show)){ 
                                ?>
                                <div class="homepage-event-container-event-content-box-each">
                                    <div class="homepage-event-content-box-each-hover">
                                        <div></div>
                                        <a href="http://localhost/simetri/eventdetail/<?php  echo $event_baris['id'];  ?>/<?php echo $event_baris['event_name']; ?>"><h2>MORE INFO</h2></a>
                                    </div>
                                    <div class="homepage-event-content-box-each-left fleft">
                                        <h2><?php echo $event_baris['event_name']; ?></h2>  
                                    </div>
                                    <div class="homepage-event-content-box-each-right fright">
                                        <h2><?php echo  date('d M',strtotime($event_baris['event_date'])); ?></h2>
                                    </div>
                                </div>
                                <?php 
                                    }
                                ?>
                            </div>
                            <p class="homepage-event-container-content-box-footer">Make sure to check the date<br>and check us out on these<br>amazing events —</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homepage-ws"id="homepage-ws">
                <div class="homepage-ws-container">
                </div>
                <div class="homepage-ws-mid-container" id="front">
                    <div class="homepage-ws-mid-container-content">
                        <p class="homepage-subtitle">
                            wholesale
                        </p>
                        <p class="homepage-title">
                            great coffee deserves a great beans
                        </p>
                        <p class="homepage-text">
                            We provide our beans in batches and large quantities for business or enthusiast alike
                        </p>
                        <p class="homepage-link" id="white-text">
                            <a id="clicked">order now</a>
                        </p>
                    </div>
                </div>
                <div class="homepage-ws-mid-container-form" id="back">
                    <div class="homepage-ws-mid-container-form-content">
                        <div class="homepage-ws-mid-container-form-left">
                            <p class="homepage-subtitle">
                                wholesale
                            </p>
                            <p class="homepage-title" id="homepage-title-ws">
                                great coffee deserves a great beans
                            </p>
                            <p class="homepage-text" id="homepage-subtitle-ws">
                                We provide our beans in batches and large quantities for business or enthusiast alike
                            </p>
                        </div>
                        <div class="homepage-ws-mid-container-form-right">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" placeholder="Name" name="name" required><br>
                                <input type="text" placeholder="Company" name="company" required><br>
                                <input type="text" placeholder="E-mail" name="email" required><br>
                                <input type="submit" name="wssubmit" value="send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="homepage-contact"id="homepage_contact">
                <div class="homepage-contact-container">
                    <div class="homepage-contact-container-adds">
                        <div class="homepage-contact-container-adds-content">
                        </div>
                        <div class="homepage-contact-container-adds-image">
                            <img src="img/index/phone.png" alt="icon">
                        </div>
                    </div>
                    <div class="homepage-contact-container-form">
                        <form method="post" action="" enctype="multipart/form-data" id="contactform" name="contactform">
                        <div class="homepage-contact-container-form-content middle">
                            <img src="img/index/contact-icon.png" alt="icon">
                            <p class="homepage-subtitle" style="color:#525252">contact</p>
                            <div class="homepage-contact-container-form-box">
                                <label class="login-error" id="error"style="color:red">
                                </label>
                                <select name="contactsubject">
                                    <option value="General Inquiry">General Inquiry</option>
                                </select>
                                <input type="text" placeholder="Name" name="contactname" id="contactname">
                                <input type="text" placeholder="Email (Please use a valid email address)" name="contactemail" id="contactmail">
                                <textarea placeholder="Message" name="contactmessage" id="contactmessage"></textarea>
                                <input type="submit" name="contactsubmit" placeholder="send" value="send">
                            </div>
                        </div>
                        <div class="homepage-contact-container-form-submit" id="show-form-contact">
                            <div style="position:absolute;height:100%;width:100%;background-color:black;opacity:0.7;"></div>
                            <div class="homepage-contact-container-form-submit-content middle">
                                <p class="homepage-subtitle">
                                    thank you
                                </p>
                                <p class="homepage-title">
                                    WE WILL GET TO YOU AS SOON AS POSSIBLE
                                </p>
                                <p class="homepage-text">
                                    It may take up to 24 hours for our representatives can get to you. Thank you for your understanding!
                                </p>
                                <p class="homepage-link" id="white-text">
                                    <a href="http://localhost/simetri/#homepage-contact" onclick="gototab();">again</a>
                                </p>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-popup" id="popup">
                <div class="product-popup-container">
                    <div class="product-popup-container-left">
                        <img src="img/index/truck-icon.png" alt="icon">
                        <p class="homepage-popup-text">Try our beans. We ship all around Indonesia now!</p>
                    </div>
                    <div class="product-popup-container-middle">
                        <a href="product" class="homepage-popup-link">shop now</a>
                    </div>
                    <div class="product-popup-container-right">
                        
                    </div>
                </div>
                <div class="popup-closer">
                    <span class="glyphicon glyphicon-remove-sign" onclick="popupclose()"></span>
                </div>
            </div>
            <?php include("menus/footer.php");?>
        </div>
    </div>
<script>
$("#clicked").click(function(){
    $("#front").fadeOut(1000);
    $("#back").fadeIn(3000);
});
//Carousel script//
$(document).ready(function(){
  $("#owl-carousel").owlCarousel();
});
    $('#owl-carousel').owlCarousel({
    center:true,
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    nav:true,
    dots:false,
    autoWidth:true,
    nav:false,
    items:1
});
$(document).ready(function(){
  $("#owl-carousell").owlCarousel();
});
    $('#owl-carousell').owlCarousel({
    center:true,
    autoplay:true,
    autoplayTimeout:3000,
    margin:140,
    loop:true,
    autoWidth:true,
    nav:false,
    items:1
});
//late scroll//
    $.fn.moveIt = function(){
      var $window = $(window);
      var instances = [];

      $(this).each(function(){
        instances.push(new moveItItem($(this)));
      });

      window.onscroll = function(){
        var scrollTop = $window.scrollTop();
        instances.forEach(function(inst){
          inst.update(scrollTop);
        });
      }
    }

    var moveItItem = function(el){
      this.el = $(el);
      this.speed = parseInt(this.el.attr('data-scroll-speed'));
    };

    moveItItem.prototype.update = function(scrollTop){
      this.el.css('transform', 'translateY(' + (scrollTop / this.speed) + 'px)');
    };

    // Initialization
    $(function(){
      $('[data-scroll-speed]').moveIt();
    });
    var side = document.getElementById('mySidenav');
    $(document).ready(function(){
        setInterval(function(){
            $('#scroll').animate({bottom: '120px'}, 700);
            $('#scroll').animate({bottom: '100px'},700);
        });
    });
    $(function () {

        $('#contactform').on('submit', function (e) {

          e.preventDefault();
            var name = $("input#contactname").val();
            var email = $("input#contactmail").val();
            var message = $("#contactmessage").val();
            if (name == "") {
                $("#error").text("Name must be filled!");
            return false;
            }
            if (email == "") {
                $("#error").text("Email must be filled!");
            return false;
            }
            if(message == ""){
                $("#error").text("Message must be filled!");
            return false;
            }
            else{
          $.ajax({
            type: 'post',
            url: 'AJAXcontact.php',
            data: $('#contactform').serialize(),
            success: function () {
               $("#show-form-contact").css("right", "0px");
            }
          });
          }
        });

      });
    function gototab(reload)
   {
    window.location.hash = '#homepage-contact';
    window.location.reload(true);
   }
    function popupclose(){
        document.getElementById("popup").style.display="none";
    }
    $(window).on("load", function(){
        setTimeout(function(){
            $("#popup").css("height", "80px");
            $(".popup-closer").css("display","block");
        },30000);
    });
</script>
</body>
</html>
<?php
if(isset($_POST['wssubmit'])){
    $wsname=$_POST['name'];
    $wscom=$_POST['company'];
    $wsemail=$_POST['email'];
    if ($wsemail=="") {
        echo "<script>alert('Email must be filled');
        window.location.href='http://localhost/simetri/#homepage-ws';</script>";
    }
    else if (!filter_var($wsemail, FILTER_VALIDATE_EMAIL)) {
        header("location:http://localhost/simetri/edit_profile/Invalid Email Format");
    }
    else if (!preg_match("/^[a-zA-Z\s]*$/",$wsname)) {
        echo "<script>alert('Name Can be only contain letters');
        window.location.href='http://localhost/simetri/#homepage-ws';</script>";
    }
    else{
        $ws_query="insert into wholesale values('','$wsname','$wscom','$wsemail')";
        $ws_result= mysqli_query($connection,$ws_query);
        
        $to = "rob@rnwood.co.uk"; // this is your Email address
            $from = $email; // this is the sender's Email address
            $subject = "Wholesale Request Submission";
            $message ='<html>
                      <head>
                        <meta http-equiv="content-type" content="text/html; charset=utf-8">
                      </head>
                      <body bgcolor="#FFFFFF" text="#000000">
                        <meta charset="UTF-8">
                        <table style="border-collapse:collapse;" height="100%"
                          bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0"
                          width="100%">
                          <tbody>
                            <tr>
                              <td align="center" valign="top">
                                <center style="width: 100%;">
                                  <!-- Visually Hidden Preheader Text : BEGIN -->
                                  <div style="display: none; font-size: 1px; line-height:
                                    1px; max-height: 0px; max-width: 0px; opacity: 0;
                                    overflow: hidden; mso-hide:all; font-family:
                                    sans-serif;">Someone wants to do business with you.-</div>
                                  <!-- Visually Hidden Preheader Text : END -->
                                  <div style="max-width: 600px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
                                <tr>
                                <td>
                                <![endif]-->
                                    <!-- Email Header : BEGIN -->
                                    <table style="max-width: 600px;" align="center"
                                      border="0" cellpadding="0" cellspacing="0"
                                      width="100%">
                                      <tbody>
                                        <tr>
                                          <td style="padding-left: 0px; padding-top: 30px;
                                            padding-bottom: 0px; padding-right: 30px;
                                            text-align: center" bgcolor="#ffffff"> <img src="http://www.simetricoffee.com/img/Logo-Simetri-black.png" height="80px"alt="Simetri Coffee Roasters">
                                            </td>
                                        </tr>
                                      </tbody>
                                      </table>
                                    <hr>
                                      <div style="max-width:600px" align="center">
                                          <p style="margin:0;font-size:30px;font-family:arial">Wholesale Contact Submission</p>
                                          <hr>
                                          <br>
                                          <p style="margin:0;text-align:left;">Dear Mr/Mrs.'.$wsname.' from '.wscom.' .inc</p>
                                          <br>
                                          <p style="margin:0;text-align:left;font-size:12px">Email = <i>'.$wsemail.'</i></p>
                                          <br>
                                          <p style="margin:0;text-align:left;">He/She has contacted you to request a wholesale for Simetri Coffee Roaster.</p>
                                      </div>
                                      <hr>
                                    </div>
                                  </center>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    <style>
                    html, body {
                        margin: 0 !important;
                        padding: 0 !important;
                        height: 100% !important;
                        width: 100% !important;
                    }
                    /* What it does: Stops email clients resizing small text. */
                    * {
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%;
                    }
                    /* What it does: Forces Outlook.com to display emails full width. */
                    .ExternalClass {
                        width: 100%;
                    }
                    /* What is does: Centers email on Android 4.4 */
                    div[style*="margin: 16px 0"] {
                        margin: 0 !important;
                    }
                    /* What it does: Stops Outlook from adding extra spacing to tables. */
                    table, td {
                        mso-table-lspace: 0pt !important;
                        mso-table-rspace: 0pt !important;
                    }
                    /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
                    table {
                        border-spacing: 0 !important;
                        border-collapse: collapse !important;
                        table-layout: fixed !important;
                        margin: 0 auto !important;
                    }
                    table table table {
                        table-layout: auto;
                    }
                    /* What it does: Uses a better rendering method when resizing images in IE. */
                    img {
                        -ms-interpolation-mode: bicubic;
                    }
                    /* What it does: Overrides styles added when Yahoo"s auto-senses a link. */
                    .yshortcuts a {
                        border-bottom: none !important;
                    }
                    /* What it does: Another work-around for iOS meddling in triggered links. */
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                    }
                    a {
                        text-decoration: none !important;
                    }
                    </style>
                        <link
                    href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700"
                          rel="stylesheet" type="text/css">
                        <link
                          href="https://fonts.googleapis.com/css?family=Arimo:400,600,700"
                          rel="stylesheet" type="text/css">
                        <link
                          href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
                          rel="stylesheet" type="text/css">
                      </body>
                    </html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$message,$headers);
        
        echo "<script>alert('wholesale request sended, please check your email occasionally for an email from us. Thank you.');
        window.location.href='http://localhost/simetri/#homepage-ws';</script>";
    }
    
}
?>