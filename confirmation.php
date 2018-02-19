<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/home");
$idi=$_GET['invc'];
$get_invoice=mysqli_query($connection,"select * from checkout where invoice_number='$idi'");
$data_invoice = mysqli_fetch_assoc($get_invoice);
$statusnya=$data_invoice['status'];
$invoice= $data_invoice['invoice_complete'];
if(!isset($idi)){
    header("location:http://localhost/simetri/user_transaction_history");
}
if($statusnya !="unpaid"){
    header("location:http://localhost/simetri/user_transaction_history");
}
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
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
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
    input[type=submit]{
        font-family: Proxima Nova;
        font-size: 24px;
        letter-spacing: 10px;
        text-transform: uppercase;
        text-align: center;
        color: black;
        background-color: transparent;
        border: 3px solid black;
        padding: 0px 7px 0px 18px;
        margin-bottom: 20px;
        margin: 0;
    }
    @media only screen and (max-width: 479px){
        .homepage-cart-title {
            font-size: 32px;
            line-height: 40px;
            margin-bottom: 10px;
        }
    }
    </style>
</head>
<body>
    <div class="container-confirmation">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-confirmation">
            <div class="content-cart-header">
                <p class="homepage-cart-title">confirmation</p>
                <p class="homepage-cart-subtitle">Please fill the form below to confirm your order payment <b><?php echo $invoice; ?></b></p>
                <img src="http://localhost/simetri/img/transaction/Confirm-Notification-Bar.png" align="center">
                <div class="content-cart-header-text">
                    <p style="text-align:center" align="left">cart</p>
                    <p style="text-align:center" align="center">checkout</p>
                    <p style="text-align:center" align="right">confirm</p>
                </div>
            </div>
            <div class="content-confirmation-container">
                <form method="post" enctype="multipart/form-data" action="http://localhost/simetri/backend/doform/doSendConfirmation.php?invc=<?php echo $idi; ?>">
                <input type="text" placeholder="Account Number" class="confirmation-number" align="center" name="number">
                <br>
                <select class="confirmation-bank" name="bank">
                    <option value="0">Bank</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="CIMB Niaga">CIMB Niaga</option>
                </select>
                <br>
                <input type="text" placeholder="Bank Account Name" class="confirmation-name" name="bname">
                <br>
                <p class="confirmation-text">please upload transfer receipt below</p>
                <div class="confirmation-image-upload-container">
                    <div class="confirmation-image-upload-box"id="uploadForm">
                        <input type="file" name="image" id="file" accept="image/jpeg,.jpeg,.jpg"class="confirmation-image-upload">
                    </div>
                </div>
                <p class="confirmation-image-upload-text">max. 600kb</p>
                    <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
                        }
                        ?>
                    </label><br>
                <input type="submit" value="confirmation" name="confirm">
                </form>
            </div>
        </div>
    </div>
<script>
    function myfun(){
        alert("Thankyou");
    }
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadForm + img').remove();
                $('#uploadForm').after('<img src="'+e.target.result+'" width="162" height="162"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function () {
        filePreview(this);
    });
    //menu left and menu bottom
    var side = document.getElementById('mySidenav');
    $('#menu-left-closer').click(function(){
        side.style.width="0%";
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
         function openNavbottom() {
        document.getElementById("mySidenav-bottom").style.height = "100%";
        document.getElementById("mySidenav-bottom").style.paddingTop = "60px";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNavbottom() {
        document.getElementById("mySidenav-bottom").style.height= "0";
        document.getElementById("mySidenav-bottom").style.paddingTop = "0px";
        document.body.style.backgroundColor = "white";
    }
    //end of menu
</script>
</body>
</html>