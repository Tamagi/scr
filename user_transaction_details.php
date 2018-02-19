<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
$utdid=$_GET['utdid'];
if(!isset($utdid)){ header("location:http://localhost/simetri/user_transaction_history.php");}
$get_details=mysqli_query($connection,"select * from checkout where invoice_number='$utdid'");
$detail_baris=mysqli_fetch_array($get_details);
$user1= $detail_baris['username'];
$date =$detail_baris['created'];
$date2 = $detail_baris['modified'];
$timestamp= strtotime($date);
$time = strtotime($date2);
if($_SESSION['username']!=$user1){ header("location:http://localhost/simetri/user_transaction_history.php");
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
    <div class="container-checkout">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-checkout">
            <div class="content-checkout-header">
                <p class="homepage-th-title">transaction history</p>
                <div class="content-td-invc">
                    <p class="content-td-date"><?php echo date("l",$timestamp);?>, <?php echo date('d-m-Y',$timestamp); ?></p>
                    <p><?php echo $detail_baris['invoice_complete']; ?></p>
                </div>
                <div class="content-td-status">
                    <p><?php echo $detail_baris['status']; ?></p>
                </div>
                <?php 
                    if($detail_baris['status']=="unpaid"){
                ?>
                <div class="content-td-wait">
                    <p>You haven't do your payment yet. Please do your payment <a href="http://localhost/simetri/confirmation/<?php echo $utdid; ?>">here</a>.</p>
                </div>
                <?php 
                    }
                    if($detail_baris['status']=="userconfirm"){
                ?>
                <div class="content-td-wait">
                    <p>Please wait while we verified your payment.</p>
                </div>
                <?php 
                    }
                    if($detail_baris['status']=="paid"){
                ?>
                <div class="content-td-wait-confirm">
                    <p>We have confirm your order payment on</p>
                    <h1><?php echo date("l",$time);?>, <?php echo date('d-m-Y',$time); ?></h1>
                    <p>Your order is currently on process, please wait.</p>
                </div>
                <?php
                    }
                    if($detail_baris['status']=="shipping"){
                ?>
                <div class="content-td-finish-confirm">
                    <p>Your order have been shipped on </p>
                    <h1><?php echo date("l",$time);?>, <?php echo date('d-m-Y',$time); ?></h1>
                    <p>Your delivery invoice is</p>
                    <h1><?php echo $detail_baris['shipping_invoice'];?></h1>
                </div>
                <?php } ?>
            </div>
            <div class="content-checkout-container">
<!-----------------------------------------------product code---------------------------------------->
                <?php
                $tax =0;
                    $total =0;
                    $total_product =0;
                    $totalqty=0;
                    $i=1;
                    $order_detail=mysqli_query($connection,"select * from order_item where username='$username' and invoice_number='$utdid'");
                    while($order_baris=mysqli_fetch_array($order_detail)){
                        $order_id = $order_baris['id'];
                        $pro_id = $order_baris['product_id'];
                        $pro_info= $order_baris['product_info'];
                        $qty = $order_baris['quantity'];
                        $size= $order_baris['bag_size'];
                        $totalqty += $order_baris['quantity'];
                            $order_baris="select * from products where product_id='$pro_id' and product_size='$size' and product_info='$pro_info'";         $run_order_price=mysqli_query($connection, $order_baris);
                            while ($pp_price = mysqli_fetch_array($run_order_price)){
                            $product_name = $pp_price['product_name'];
                            $product_image = $pp_price['product_image'];
                            $single_price = $pp_price['product_price'];
                            $sumprice = ($single_price * $qty);
                            $sum = array($sumprice);
                            $values = array_sum($sum);
                            $total_product +=$values;
                ?>
                <div class="content-checkout-single">
                    <div class="content-checkout-single-right">
                        <div class="content-checkout-single-left-box">
                            <p class="content-checkout-origin"><?php echo $pp_price['origin']; ?></p>
                            <p class="content-checkout-title"><?php echo $product_name; ?></p>
                        </div>
                        <div class="content-checkout-single-middle-box">
                            <div class="content-checkout-single-right-split-size">
                            <p class="content-checkout-size-text">Size</p><p class="content-checkout-size"><?php 
                                    $size_show = mysqli_query($connection,"select * from coffee_bag_size where bag_id='$size'");
                                    while($size_baris = mysqli_fetch_assoc($size_show)){ 
                                    echo $size_baris['bag_size'];
                                    }
                                ?></p>
                            </div>
                            <div class="content-checkout-single-right-split-qty">
                            <p class="content-checkout-qty-text">Qty</p><p class="content-checkout-qty"><?php echo $qty; ?></p>
                            </div>
                        </div>
                        <div class="content-checkout-single-right-box">
                            <p class="content-checkout-price"><?php echo number_format($sumprice,"0",",","."); ?>,-</p><span class="content-checkout-price-text">RP</span>
                        </div>
                    </div>
                </div>
                <?php $i++;
                            }
                    }
                ?>
<!-----------------------------------------------academy code---------------------------------------->
               <?php
                        $total_academy =0;
                    $username =  $_SESSION['username'];
                    $sell_price="select * from order_item where username='$username' and invoice_number='$utdid'";
                    $run_price= mysqli_query($connection, $sell_price);
                    while($academy_query = mysqli_fetch_array($run_price)){
                        $cart_id = $academy_query['id'];
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
                <div class="content-checkout-single">
                    <div class="content-checkout-single-right">
                        <div class="content-checkout-single-left-box">
                            <p class="content-checkout-origin"><?php echo $cart_academy_info;
                                        ?></p>
                            <p class="content-checkout-title"><?php echo $academy_name; ?></p>
                        </div>
                        <div class="content-checkout-single-middle-box">
                            <div class="content-checkout-single-right-split-size">
                            <p class="content-checkout-size-text-academy"><?php $date =$academy_baris['academy_time'];
                                                $timestamp= strtotime($academy_time);
                                                echo date("D",$timestamp);?>,&nbsp;<?php echo $academy_time?></p>
                            </div>
                            <div class="content-checkout-single-right-split-qty">
                            <p class="content-checkout-qty-text">Qty</p><p class="content-checkout-qty"><?php echo $cart_academy_qty; ?></p>
                            </div>
                        </div>
                        <div class="content-checkout-single-right-box">
                            <p class="content-checkout-price"><?php echo number_format($academy_sumprice,"0",",","."); ?>,-</p><span class="content-checkout-price-text">RP</span>
                        </div>
                    </div>
                </div>
                <?php   
                    $i++;
                    }
                }
                $ship=9000;
                $total_all_item = $total_academy + $total_product;
                $tax = 0.10 * $total_all_item;
                $total = $total_all_item;
                ?>
<!---------------------------------------- code---------------------------------------->
            </div>
            <?php
                            $user_detail= mysqli_query($connection,"select * from user where username='$username'");
                            while($user_baris = mysqli_fetch_assoc($user_detail)){
                            $destination=$user_baris['city'];
                            $ship=$user_baris['ship'];
                            $ship_detail_query= mysqli_query($connection,"select * from shipping_detail where s_detail_destination='$destination' and s_id='$ship'");
                                $ship_query=mysqli_query($connection,"select * from shipping where s_id='$ship'");
                                $ship_baris= mysqli_fetch_assoc($ship_query);
                                $ship_name=$ship_baris['s_name'];
                                $ship_id=$ship_baris['s_id'];
                                    while($ship_detail_baris = mysqli_fetch_assoc($ship_detail_query)){ 
                                        $ship_detail_id = $ship_detail_baris['s_detail_id'];
                                        $ship_detail_dest = $ship_detail_baris['s_detail_destination'];
                                        $ship_detail_price = $ship_detail_baris['s_detail_price'];
                                        $subtotal=0;
                                        $subtotal= $total + $ship_detail_price;
                                    }
                                    }?>
            <div class="content-checkout-summary-container">
                <div class="content-checkout-summary-split">
                    <div class="content-checkout-summary-split-left">
                        <p class="content-checkout-subtotal-text">Sub Total</p>
                        <p class="content-checkout-subtotal-text">Shipping price</p>
                    </div>
                    <div class="content-checkout-summary-split-right">
                        <p class="content-checkout-subtotal"><span class="content-checkout-subtotal-text-r">RP </span><?php  echo number_format($total_all_item,"0",",",".");?>,-</p>
                        <p class="content-checkout-subtotal"><span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($ship_detail_price,"0",",",".");?>,-</p>
                    </div>
                </div>    
                <hr style="border:3px solid black;border-radius:30px;">
                <p class="content-checkout-subtotal-text" style="float:left">Grand Total</p>
                <p class="content-checkout-subtotal"><span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($subtotal,"0",",","."); ?>,-</p>
            </div>
        </div>
    </div>
</body>
</html>