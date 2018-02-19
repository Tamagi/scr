<!DOCTYPE html>
<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
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
    <div class="container-cart">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-cart">
            <div class="content-cart-header">
                <p class="homepage-cart-title">My cart</p>
                <?php $totalqty=0;
                        include("backend/doform/connect.php");
                        $username =  $_SESSION['username'];
                        $sell_price="select * from order_item where username='$username' and status='cart pending'";
                        $run_price= mysqli_query($connection, $sell_price);
                        while($pro_price = mysqli_fetch_assoc($run_price)){
                             $totalqty += $pro_price['quantity'];
                        }
                ?>
                <p class="homepage-cart-subtitle">You have <b><?php echo $totalqty; ?></b> items in your cart</p>
                <img src="http://localhost/simetri/img/transaction/Cart-Notification-Bar.png" align="center">
                <div class="content-cart-header-text">
                    <p style="text-align:center" align="left">cart</p>
                    <p style="text-align:center" align="center">checkout</p>
                    <p style="text-align:center" align="right">confirm</p>
                </div>
            </div>
            <?php 
                include("backend/doform/connect.php");
                $sell_price="select * from order_item where username='$username' and status='cart pending'";
                $run_price= mysqli_query($connection, $sell_price);
                $cart_count=mysqli_fetch_row($run_price);
                    if($cart_count==0){
                        ?>
                    <p class="homepage-cart-subtitle" align="center">Cart is empty</p>
                    <?php
                    }
                    else{
                    ?>
            <div class="content-cart-container">
<!-----------------------------------------------product code---------------------------------------->
                <?php
                    $tax =0;
                    $total =0;
                    $total_product =0;
                    $totalqty=0;
                    $i=1;
                    include("backend/doform/connect.php");
                    $username =  $_SESSION['username'];
                    $sell_price="select * from order_item where username='$username' and status='cart pending'";
                    $run_price= mysqli_query($connection, $sell_price);
                    while($pro_price = mysqli_fetch_array($run_price)){
                        $id = $pro_price['id'];
                        $pro_id = $pro_price['product_id'];
                        $pro_info= $pro_price['product_info'];
                        $qty = $pro_price['quantity'];
                        $size= $pro_price['bag_size'];
                        $totalqty += $pro_price['quantity'];
                        $pro_price="select * from products where product_id='$pro_id' and product_size='$size' and product_info='$pro_info'";
                        $run_product_price = mysqli_query($connection, $pro_price);
                        while ($pp_price = mysqli_fetch_array($run_product_price)){
                        $product_name = $pp_price['product_name'];
                        $product_image = $pp_price['product_image'];
                        $single_price = $pp_price['product_price'];
                        $sumprice = ($single_price * $qty);
                        $sum = array($sumprice);
                        $values = array_sum($sum);
                        $total_product +=$values;
                ?>
                <div class="content-cart-single">
                    <div class="content-cart-single-left">
                        <img src="http://localhost/simetri/img/shop-image/<?php echo $product_image; ?>">
                    </div>
                    <div class="content-cart-single-right">
                        <p class="content-cart-stock">in stock</p>
                        <p class="content-cart-origin"><?php echo $pp_price['origin']; ?></p>
                        <p class="content-cart-title"><?php echo $product_name; ?></p>
                        <div class="content-cart-single-right-split">
                            <div class="content-cart-single-right-split-size">
                            <p class="content-cart-size-text">Size</p><p class="content-cart-size">
                                <?php 
                                    $size_show = mysqli_query($connection,"select * from coffee_bag_size where bag_id='$size'");
                                    while($size_baris = mysqli_fetch_assoc($size_show)){ 
                                    echo $size_baris['bag_size'];
                                    }
                                ?></p>
                            </div>
                            <div class="content-cart-single-right-split-qty">
                            <p class="content-cart-qty-text">Qty</p><p class="content-cart-qty"><?php echo $qty; ?></p>
                            </div>
                        </div>
                        <span class="content-cart-price-text">RP</span><p class="content-cart-price"><?php echo number_format($sumprice,"0",",","."); ?>,-</p>
                    </div>
                    <div class="content-cart-single-delete">
                        <a href="http://localhost/simetri/backend/doform/doDeleteItem.php?id=<?php echo $pro_id;?>&&cart=<?php echo $id ?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
                    </div>
                </div>
                <?php   
                    $i++;
                    }
                }
                ?>
<!-----------------------------------------------product code---------------------------------------->
<!----------------------------------------------academy code----------------------------------------->
                <?php
                        $total_academy =0;
                    $username =  $_SESSION['username'];
                    $sell_price="select * from order_item where username='$username' and status='cart pending'";
                    $run_price= mysqli_query($connection, $sell_price);
                    while($academy_query = mysqli_fetch_array($run_price)){
                        $id = $academy_query['id'];
                        $cart_academy_id = $academy_query['product_id'];
                        $cart_academy_info= $academy_query['product_info'];
                        $cart_academy_qty = $academy_query['quantity'];
                        $totalqty += $academy_query['quantity'];
                        $academy_query="select * from academy where academy_id='$cart_academy_id' and product_info='$cart_academy_info'";
                        $run_academy_query= mysqli_query($connection,$academy_query);
                            while($academy_baris=mysqli_fetch_array($run_academy_query)){
                                $academy_name=$academy_baris['academy_name'];
                                $academy_image=$academy_baris['academy_image'];
                                $academy_price=$academy_baris['academy_price'];
                                $academy_time=$academy_baris['academy_time'];
                                $academy_time_start=$academy_baris['time_start'];
                                $academy_time_end=$academy_baris['time_end'];
                                $academy_sumprice = $academy_price * $cart_academy_qty;
                                $academy_sum = array($academy_sumprice);
                                $academy_values = array_sum($academy_sum);
                                $total_academy += $academy_values;
                ?>
                <div class="content-cart-single">
                    <div class="content-cart-single-left">
                        <img src="http://localhost/simetri/img/academy-image/<?php echo $academy_image; ?>"class="cart-academy-image">
                    </div>
                    <div class="content-cart-single-right">
                        <p class="content-cart-stock">in stock</p>
                        <p class="content-cart-origin"><?php echo $cart_academy_info;
                                        ?></p>
                        <p class="content-cart-title"><?php echo $academy_name ?></p>
                        <div class="content-cart-single-right-split">
                            <div class="content-cart-single-right-split-size">
                            <p class="content-cart-size-text-academy"><?php $date =$academy_baris['academy_time'];
                                                $timestamp= strtotime($academy_time);
                                                echo date("D",$timestamp);?>,&nbsp;<?php echo $academy_time?></p>
                            </div>
                            <div class="content-cart-single-right-split-qty">
                            <p class="content-cart-qty-text">Qty</p><p class="content-cart-qty"><?php echo $cart_academy_qty; ?></p>
                            </div>
                        </div>
                        <span class="content-cart-price-text">RP</span><p class="content-cart-price"><?php echo number_format($academy_sumprice,"0",",","."); ?>,-</p>
                    </div>
                    <div class="content-cart-single-delete">
                        <a href="http://localhost/simetri/backend/doform/doDeleteItem.php?id=<?php echo $pro_id;?>&&cart=<?php echo $id ?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
                    </div>
                </div>
                <?php   
                    $i++;
                    }
                }
                        $total_all_item = $total_academy + $total_product;
                ?>
<!----------------------------------------------academy code----------------------------------------->
            </div>
            <div class="content-cart-footer">
                <p class="content-cart-subtotal-text">sub total</p>
                <p class="content-cart-subtotal"><?php  echo number_format($total_all_item,"0",",",".");?></p><span class="content-cart-subtotal-text-r">RP</span>
            </div>
            <?php } ?>
            <div class="content-cart-button">
                <p><a href="http://localhost/simetri/product">continue shopping</a></p>
                <p><a href="http://localhost/simetri/checkout">checkout</a></p>
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