<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
$username=$_SESSION['username'];
$get_invoice=mysqli_query($connection,"select * from checkout where username='$username' and status='unpaid' order by checkout_id desc limit 1");
$data_invoice = mysqli_fetch_assoc($get_invoice);

$invoice= $data_invoice['invoice_complete'];

$redirect_invoice=mysqli_query($connection,"select * from checkout where username='$username' and 
status='unpaid' order by checkout_id desc limit 1");
$redirect_data_invoice = mysqli_num_rows($redirect_invoice);
if($redirect_data_invoice==0){
    header("location:http://localhost/simetri/cart");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    </style>
</head>
<body>
    <div class="container-thanks-page">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="thanks-page-container">
            <div class="thanks-mid-container">
                <p class="homepage-thanks-title">thank you</p>
                <p class="homepage-thanks-subtitle">Your purchase is being process. Please click the link below to confirm.</p>
                <p class="homepage-thanks-text"><?php echo $invoice ?></p>
                <a href="confirmation.php?invc=<?php echo $data_invoice['invoice_number']; ?>"><p class="homepage-thanks-button">confirmation</p></a>
            </div>
        </div>
    </div>
<script>
    
    $('#quantity').on('change',function(){
    var tot = $('#price').val() * this.value;
    $('#total').val(tot);
});
    $('#price').on('change',function(){
    var tot = $('#quantity').val() * this.value;
    $('#total').val(tot);
});
    $('.qtyplus').click(function(e){
        e.preventDefault();
        var qty= $('#quantity');
        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal)&& currentVal < 20) {
            qty.val(currentVal + 1);
        } else {
            qty.val(20);
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