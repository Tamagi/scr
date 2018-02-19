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
    <title>Simetri Coffee News- Best Ground Coffee In Indonesia</title>
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
    <div class="container-news">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>     
        <div class="content-news">
            <div class="content-news-sort">
                <div class="content-news-sort-container">
                Sort &nbsp;
                <select>
                    <option value="all">All</option>
                    <option value="az">A-Z Alphabetic</option>
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                    <a href=""></a>
                </select>
                </div>
            </div>
            <div class="content-news-many">
                <div class="content-news-many-each" id="content-news-many-each-hero">
                    <div class="content-news-many-each-container" style="background:url('img/index/news-background.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
                        <div class="content-news-many-each-hero">
                            <p class="homepage-cafe-subtitle">
                                news
                            </p>
                            <p class="homepage-cafe-title">
                                do you like our writting
                            </p>
                            <p class="homepage-cafe-text news-text">
                                Subscribe to our newsletter for more of this super coffee related article
                            </p>
                            <a class="many-news-link" href="">SUBSCRIBE</a>
                        </div>
                    </div>   
                </div>
                <?php
                    $news_show = mysqli_query($connection,"select * from news");
                    while($news_baris = mysqli_fetch_assoc($news_show)){ 
                ?>
                <div class="content-news-many-each">
                    <a href="newsdetail/<?php echo $news_baris['id']; ?>/<?php echo $news_baris['news_title']; ?>" style="text-decoration:none;color:black;pointer:cursor;">
                    <div class="content-news-many-each-container">
                        <div class="content-news-many-each-container-img">
                            <img src="img/news-image/<?php echo $news_baris['news_image']; ?>" style="height:100%">
                        </div>
                        <div class="content-news-many-each-container-text">
                            <p class="content-news-many-each-title"><?php echo $news_baris['news_title']; ?></p>
                            <p class="content-news-many-each-text"><?php echo $news_baris['news_detail']; ?></p>
                            <p class="content-news-many-each-text">by <a href=""><b><?php echo $news_baris['creator']; ?></b></a></p>
                            <p class="content-news-many-each-text"><?php $time=strtotime($news_baris['news_date']); echo date("l",$time). ", " . date("d-m-Y",$time) ;?></p>
                        </div>
                    </div>
                    </a>   
                </div>
                    <?php } ?>
            </div>
            <div class="content-news-footer">
                <input type="button" name="button" value="load more" id="loadmore">
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
    //loadmore
    $(function () {
        
        $(".content-news-many-each").slice(0, 6).show();
        $("#loadmore").on('click', function (e) {
            e.preventDefault();
            $(".content-news-many-each:hidden").slice(0, 6).fadeIn();
            
        if($(".content-news-many-each:visible").length == $(".content-news-many-each").length){
            $("#loadmore").css("display","none");
        }
        else{
            $("#loadmore").css("display","inline-block");
        }
        });
    });
</script>
</body>
</html>