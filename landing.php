<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="img/Fav-Icon.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Average+Sans" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Simetri Coffee Roasters-Best Ground coffee in Indonesia.</title>
<style>
    @font-face {
 font-family: Gotham-book;
  src: url(font/GOTHAM-BOOK.ttf);
}
@font-face {
 font-family: Gotham-medium;
  src: url(font/GOTHAM-MEDIUM.ttf);
}
a:hover{
    text-decoration: none;
}
body{
    width: 100%;
    min-height: 100%;
    margin:0;
    transition: background-color .5s;
    overflow-x: hidden;
}
.container-home{
    width:100%;
    height:100%;
    position:absolute;
    right:0;
    bottom:0;
    top:0;
    left:0;
    min-height: 850px;
}
    .background{
         width:100%;
        height:100%;
        background: url(img/landing/Background.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
    }
    .containerere{
        position: absolute;
        top: 50%;
        left: 50%;
    transform: translate(-50%,-50%);
    }
.header-logo{
    position: relative;
    width: 100%;
    height: 180px;
}
.header-logo img{
    position: absolute;
    height: 180px;
    left: 50%;
    transform: translate(-50%,0%);
}
.container-content{
    position: relative;
    width: 100%;
}
.content{
    position: relative;
    width:800px;
    margin: auto;
    text-align: center;
}
.title{
    font-family: Proxima Novabold;
    font-size: 72px;
    text-align: center;
    margin-bottom: 40px;
    text-transform: uppercase;
    line-height: 70px;
    color: white;
}
.subtitle{
    font-family:Acumin Light;
    font-size: 26px;
    text-align: center;
    margin-bottom: 20px;
    letter-spacing: 4px;
    color: white;
}
    input[type=text]{
        font-family: Gotham-book;
        font-size: 14px;
        text-align: center;
        border: 0;
        border-bottom: 2px solid white;
        width: 380px;
        padding: 10px;
        background-color: transparent;
        margin-bottom: 20px;
        color: white;
    }
    input[type=submit]{
        font-family: Proxima Nova;
        font-size: 24px;
        letter-spacing: 10px;
        text-transform: uppercase;
        text-align: center;
        color: white;
        margin-bottom: 20px;
        margin: 0;
        border: 0;
        background-color: transparent;
    }
.subtitle a{
    color: #00AEEF;
}
.subtitle a:hover{
    text-decoration: none;
}
.text{
    width: 530px;
    font-family: Gotham-medium;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}
.power{
    font-family: Gotham-medium;
    font-size: 14px;
    text-align: center;
    color: white;
}
.sosmed-container{
    position: relative;
    text-align: center;
    margin-bottom: 60px;
    margin-top: 60px;
}
.sosmed-container a{
    padding-left: 15px;
    padding-right: 15px;
}
.sosmed-container img{
    height:25px;
    width: 25px;
}

/*-----------------------responsive------------------------*/
@media only screen and (max-width:1400px)and (min-width: 1025px){
    .container-home{
        min-height: 700px;
    }
    .title{
        font-size: 56px;
        line-height: 60px;
    }
    .header-logo{
        height: 140px;
        margin-bottom: 60px;
    }
    .header-logo img{
        height: 140px;
    }.sosmed-container{
        margin-bottom: 40px;
        margin-top: 40px;
    }
}
@media only screen and (max-width:1024px)and (min-width: 768px){
    .container-home{
        min-height: 800px;
    }
    .title{
        font-size: 56px;
        line-height: 60px;
    }
    .header-logo{
        height: 140px;
        margin-bottom: 60px;
    }
    .header-logo img{
        height: 140px;
    }
    .sosmed-container{
        margin-bottom: 40px;
        margin-top: 40px;
    }
    .content{
        width: 700px;
    }
    .subtitle{
        font-size: 18px;
    }
    .text{
        font-size: 18px;
    }
    .power{
        font-size: 12px;
    }
}

@media only screen and (max-width:767px)and (min-width: 490px){
     .container-home{
        min-height: 700px;
    }
    .title{
        font-size: 48px;
        line-height: 50px;
    }
    .header-logo{
        height: 120px;
        margin-bottom: 40px;
    }
    .header-logo img{
        height: 120px;
    }
    .sosmed-container{
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .content{
        width: 500px;
    }
    .title{
        font-size: 38px;
        line-height: 40px;
    }
    .subtitle{
        font-size: 16px;
    }
    .text{
        font-size: 16px;
        width: 360px;
    }
    .power{
        font-size: 10px;
    }
}
@media only screen and (max-width:489px){
    .container-home{
        min-height: 550px;
    }
    .header-logo{
        height: 120px;
        margin-bottom: 40px;
    }
    .header-logo img{
        height: 120px;
    }
    .sosmed-container{
        margin-bottom: 20px;
        margin-top: 20px;
    }
    input[type=text]{
        width: 80%;
    }
    input[type=submit] {
        font-size: 16px;   
    }
    .content{
        width: 300px;
    }
    .title{
        font-size: 28px;
        line-height: 30px;
        margin-bottom: 20px;
    }
    .subtitle{
        font-size: 14px;
        margin-bottom: 20px;
    }
    .text{
        font-size: 14px;
        width: 240px;
        margin-bottom: 20px;
    }
    .power{
        font-size: 10px;
    }   
}
</style>
<script>
</script>    
</head>
<body>
    <div class="container-home">
        <div class="background">
        </div>
        <div class="containerere">
            <div class="header-logo">
                <img src="img/landing/Logo-Simetri.png">
            </div>
            <div class="container-content">
                <div class="content">
                    <p class="title">our new website is under heavy construction</p>
                    <p class="subtitle">Stay tuned. Be notified when our site ready.</p>
                    <form action="#" method="post" enctype="multipart/form-data">
                    <input type="text" name="email" placeholder="Your Email Address">
                    <br>
                    <input type="submit" value="send" name="submit">
                    </form>
                    <div class="sosmed-container">
                        <a href="https://www.instagram.com/simetricoffeeroasters/?hl=en"><img src="img/landing/Instagram-Icon.png"></a>
                        <a href="https://www.facebook.com/simetricoffee/"><img src="img/landing/Facebook-Icon.png"></a>
                        <a href="https://twitter.com/simetricoffee?lang=en"><img src="img/landing/Twitter-Icon.png"></a>
                        <a href="#"><img src="img/landing/Email-Icon.png"></a>
                    </div>
                    <p class="power">Powered by <b>Creatheavity</b> for <b>Simetri Coffee Roasters©</b></p>
                </div>
            </div>
        </div>
    </div>
<script>
</script>
<?php 
include("backend/doform/connect.php");
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $get_email = "select * from landing where email='$email'";
        $run_email = mysqli_query($connection,$get_email);
        $count_email = mysqli_num_rows($run_email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Email not valid!')</script>";
        }
        else if ($count_email == 1) {
            echo "<script>alert('Email already registered!')</script>";
        }
        else{
            $insert_email= mysqli_query($connection,"insert into landing values ('','$email')");
            echo "<script>alert('Email successfully registered!')</script>";
        }
        
    }
?>
</body>
</html>