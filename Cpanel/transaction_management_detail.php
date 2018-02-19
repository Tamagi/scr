<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(!isset($_GET['transaction']))
    header("location:transaction_management.php");
$transactionname=$_GET['transaction'];
$get_transaction=mysqli_query($connection,"select * from checkout where checkout_id='$transactionname'");
$run_transaction=mysqli_fetch_assoc($get_transaction);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Cstyle.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <link rel="icon" href="img/favicon.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>transaction Management Detail - Creatheavity panel.</title>
<style>
    .management-content-box-panel-left p{
        margin-bottom: 20px;
    }
    .management-content-box-panel-right input[type=text]{
        margin-bottom: 20px;
    }
    .management-content-box-panel-right input[type=date]{
        height: 40px;
        margin-bottom: 20px;
        font-family: Proxima novasemi;
        font-size: 16px;
        letter-spacing: 4px;
        border: 0;
        border-bottom: 2px solid black;
        width: 300px;
        padding: 0px 0px 10px 10px;
        outline: none;
    }
    .management-content-box-panel-right textarea{
        margin-bottom: 20px;
    }
    .trasaction-management-content-box-panel-image{
        margin-bottom: 40px;
    }
    .transaction-content-box-status input[type=submit]{
        font-family: Montserrat;
        font-size: 12px;
        font-weight: 800;
        border: 3px solid #B5B5B5;
        border-radius: 50px;
        text-transform: uppercase;
        background-color: transparent;
        height: 30px;
        color: #B5B5B5;
        text-align: center;
        outline: none;
        padding: 0px 15px 0px 15px;
        width: 180px;
        cursor:pointer;
        margin-right: 25px;
    }
    .actived{
        color: red;
        border: 3px solid red;
    }
    .transaction-content-box-status-container{
        position: relative;
        float: left;
        margin-top: 40px;
    }
    
.lightbox-target {
top: -100%;
width: 100%;
background: rgba(0,0,0,.7);
width: 100%;
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:200px;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
    z-index: 1000;
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target:target img {
max-height: 100%;
max-width: 100%;
}

.lightbox-target:target a.lightbox-close {
top: 0px;
}
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-transaction-management-detail">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span><a href="transaction_management.php"> transaction Management  </a></span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-management-detail-content-container">
            <div class="transaction-management-detail-content-box">
                <div class="management-content-header">
                    <img src="img/Transcation-Icon.png">
                    <p class="management-content-header-title">transaction</p>
                    <p class="management-content-header-subtitle">management</p>
                </div>
                <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
                        }
                        ?>
                    </label>
                    <label class="login-success" style="color:green">
                        <?php 
                            if(isset($_REQUEST['success']))
                                {
                                    echo $_REQUEST['success'];
                                }
                        ?>
                    </label>
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure to delete transaction? If you confirm this message transaction will be lost forever.')">
                    <input type="submit" name="delete" style="font-family: Proxima Nova; font-weight: 700;font-size: 12px;letter-spacing: 2px;text-transform: uppercase; text-align: center;margin: 0;margin-top:20px;color: black;cursor:pointer;background-color: transparent;   border: 3px solid black;" value="Delete / Drop transaction">
                </form>
                <div class="management-content-box-split">
                    <div class="management-content-box-left">
                        <div class="management-content-box-title">
                            <p>Transaction <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left" style="width:37%">
                                    <p>Invoice no.</p>
                                    <p>username</p>
                                    <p>bank</p>
                                    <p>grand total</p>
                                    <p>shipping</p>
                                    <p style="margin-bottom: 80px;">address</p>
                                    <p>status</p>
                                </div>
                                <div class="management-content-box-panel-right" style="width:63%">
                                    <input type="text" name="invc" value="<?php echo $run_transaction['invoice_complete'];?>" readonly>
                                    <input type="text" name="aname" value="<?php echo $run_transaction['username'];?>" readonly>
                                    <input type="text" name="bank" value="<?php echo $run_transaction['bank_id']; ?>"readonly>
                                    <input type="text" name="gt" value="<?php echo number_format($run_transaction['checkout_grandtotal'],"0",",",".");?>"readonly>
                                    <span style="margin-left:-30px;font-family:Proxima novasemi;font-size:14px;">IDR</span>
                                    <input type="text" name="shipping" value="JNE <?php 
                                        $sid=$run_transaction['s_id'];
                                        $sdid=$run_transaction['s_detail_id'];
                                        $sid_query=mysqli_query($connection,"select * from shipping where s_id='$sid'");
                                        $sid_run=mysqli_fetch_array($sid_query);
                                        echo $sid_run['s_name'];                       $sdid_query=mysqli_query($connection,"select * from shipping_detail where s_detail_id='$sdid'");
                                        $sdid_run=mysqli_fetch_array($sdid_query);  
                                        echo "&nbsp;".$sdid_run['s_detail_destination'];
                                    ?>"readonly>
                                    <textarea readonly placeholder="Address"><?php echo $run_transaction['checkout_address'];?></textarea>
                                    <input type="text" name="status" value="<?php echo $run_transaction['status'];?>" palceholder="transaction Limit" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="doform/doCpChangeStatus.php?transaction=<?php echo $transactionname; ?>" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Are you sure to update?')">
                    <div class="management-content-box-right">
                        <div class="management-content-box-title">
                            <p>Confirmation <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="trasaction-management-content-box-panel-image">
                                    <a href="#bigimage"><img src="http://localhost/simetri/img/confirmation-images/<?php $invoice_number=$run_transaction['invoice_number']; $get_confirmation=mysqli_query($connection,"select * from confirmation_form where invoice_number='$invoice_number'"); $run_confirmation=mysqli_fetch_array($get_confirmation); echo $run_confirmation['confirmation_image'];?>" width="300" height="200">
                                    </a>
                                </div>
                                <div class="lightbox-target" id="bigimage">
                                    <img src="http://localhost/simetri/img/confirmation-images/<?php echo $run_confirmation['confirmation_image'];?>" width="500" height="800">
                                    <a class="lightbox-close" href=""></a>
                                </div>
                                <div class="management-content-box-panel-left">
                                    <p>account name</p>
                                    <p>account number</p>
                                    <p>delivery invoice</p>
                                    <p>delivery date</p>
                                </div>
                                <div class="management-content-box-panel-right">
                                    <input type="text" name="accountname" value="<?php echo $run_confirmation['account_name']; ?>" readonly placeholder="Bank Account Name">
                                    <input type="text" name="accountnumber"  placeholder="Bank Account Number" value="<?php echo $run_confirmation['account_bank']; ?>" readonly>
                                    <input type="text" name="dinvoice" <?php if($run_transaction['status']=="shipping" or $run_transaction['status']=="finished"){echo 'value="'.$run_transaction['shipping_invoice'].'" readonly';}?> placeholder="Delivery Invoice" <?php if($run_transaction['status']=="unpaid" or $run_transaction['status']=="userconfirm"){echo "disabled";}?>>
                                    <input type="date" name="ddate" <?php if($run_transaction['status']=="shipping" or $run_transaction['status']=="finished"){echo 'value="'.$run_transaction['shipping_date'].'" readonly';}?> placeholder="Delivery Date"<?php if($run_transaction['status']=="unpaid" or $run_transaction['status']=="userconfirm"){echo "disabled";}?>>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transaction-content-box-status-container">
                        <div class="transaction-content-box-status">
                            <input type="submit" class="transaction-status" name="waiting" value="Unpaid/UserConfirm"<?php if($run_transaction['status']=="unpaid"or $run_transaction['status']=="userconfirm"){echo 'style="color:red;border:3px solid red;"';}else{echo 'style="color:green;border:3px solid green;cursor:no-drop;" disabled';}?>>
                            <input type="submit" class="transaction-status" name="paid" value="Paid"<?php if($run_transaction['status']=="paid"){echo 'style="color:red;border:3px solid red;"';}else if($run_transaction['status']=="unpaid"or $run_transaction['status']=="userconfirm"){echo 'style="cursor:no-drop;" disabled';}else{echo 'style="color:green;border:3px solid green;cursor:no-drop;" disabled';}?>>
                            <input type="submit" class="transaction-status" name="progress" value="Shipping"<?php if($run_transaction['status']=="shipping"){echo 'style="color:red;border:3px solid red;"';}else if($run_transaction['status']=="unpaid" or $run_transaction['status']=="paid" or $run_transaction['status']=="userconfirm"){echo 'style="cursor:no-drop;" disabled';}else{echo 'style="color:green;border:3px solid green;cursor:no-drop;" disabled';}?>>
                            <input type="submit" class="transaction-status" name="success" value="Shipped"<?php if($run_transaction['status']=="unpaid" or $run_transaction['status']=="paid" or $run_transaction['status']=="shipping" or $run_transaction['status']=="userconfirm"){echo 'style="cursor:no-drop;" disabled';}else{echo 'style="color:green;border:3px solid green;cursor:no-drop;" disabled';}?>>
                        </div>
                    </div>
                    <div class="management-content-box-footer">
                        <div class="transaction-management-content-detail-container">
                            <div class="management-content-box-title">
                            <p style="text-align:left;">Transaction <br>Details.</p>
                            </div>
                            <div class="transaction-management-content-details">
<!-----------------------------------------------product code---------------------------------------->
                <?php
                    $tax =0;
                    $total =0;
                    $total_product =0;
                    $totalqty=0;
                    $i=1;
                    $order_detail=mysqli_query($connection,"select * from order_item where checkout_id='$transactionname'");
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
                                <div class="transaction-management-content-checkout-single">
                                    <div class="transaction-management-content-checkout-single-right">
                                        <div class="transaction-management-content-checkout-single-left-box">
                                            <p class="transaction-management-content-checkout-origin"><?php echo $pp_price['origin']; ?></p>
                                            <p class="transaction-management-content-checkout-title"><?php echo $product_name; ?></p>
                                        </div>
                                        <div class="transaction-management-content-checkout-single-middle-box">
                                            <div class="transaction-management-content-checkout-single-right-split-size">
                                            <p class="transaction-management-content-checkout-size-text">Size</p><p class="content-checkout-size"><?php 
                                                    $size_show = mysqli_query($connection,"select * from coffee_bag_size where bag_id='$size'");
                                                    while($size_baris = mysqli_fetch_assoc($size_show)){ 
                                                    echo $size_baris['bag_size'];
                                                    }
                                                ?></p>
                                            </div>
                                            <div class="transaction-management-content-checkout-single-right-split-qty">
                                            <p class="transaction-management-content-checkout-qty-text">Qty</p><p class="transaction-management-content-checkout-qty"><?php echo $qty; ?></p>
                                            </div>
                                        </div>
                                        <div class="transaction-management-content-checkout-single-right-box">
                                            <p class="transaction-management-content-checkout-price"><?php echo number_format($sumprice,"0",",","."); ?>,-</p><span class="transaction-management-content-checkout-price-text">RP</span>
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
                    $sell_price="select * from order_item where checkout_id='$transactionname'";
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
                                <div class="transaction-management-content-checkout-single">
                                    <div class="transaction-management-content-checkout-single-right">
                                        <div class="transaction-management-content-checkout-single-left-box">
                                            <p class="transaction-management-content-checkout-origin"><?php echo $cart_academy_info;
                                                        ?></p>
                                            <p class="transaction-management-content-checkout-title"><?php echo $academy_name; ?></p>
                                        </div>
                                        <div class="transaction-management-content-checkout-single-middle-box">
                                            <div class="transaction-management-content-checkout-single-right-split-size">
                                            <p class="transaction-management-content-checkout-size-text-academy"><?php $date =$academy_baris['academy_time'];
                                                                $timestamp= strtotime($academy_time);
                                                                echo date("D",$timestamp);?>,&nbsp;<?php echo $academy_time?></p>
                                            </div>
                                            <div class="transaction-management-content-checkout-single-right-split-qty">
                                            <p class="transaction-management-content-checkout-qty-text">Qty</p><p class="transaction-management-content-checkout-qty"><?php echo $cart_academy_qty; ?></p>
                                            </div>
                                        </div>
                                        <div class="transaction-management-content-checkout-single-right-box">
                                            <p class="transaction-management-content-checkout-price"><?php echo number_format($academy_sumprice,"0",",","."); ?>,-</p><span class="transaction-management-content-checkout-price-text">RP</span>
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
                            <div class="transaction-management-content-checkout-summary-container">
                                <div class="transaction-management-content-checkout-summary-split">
                                    <div class="transaction-management-content-checkout-summary-split-left">
                                        <p class="transaction-management-content-checkout-subtotal-text">Sub Total</p>
                                        <p class="transaction-management-content-checkout-subtotal-text">Shipping price</p>
                                    </div>
                                    <div class="transaction-management-content-checkout-summary-split-right">
                                        <p class="transaction-management-content-checkout-subtotal"><span class="transaction-management-content-checkout-subtotal-text-r">RP </span><?php  echo number_format($total_all_item,"0",",",".");?>,-</p>
                                        <p class="transaction-management-content-checkout-subtotal"><span class="transaction-management-content-checkout-subtotal-text-r">RP </span><?php echo number_format($ship_detail_price,"0",",",".");?>,-</p>
                                    </div>
                                </div>    
                                <hr style="border:3px solid black;border-radius:30px;">
                                <p class="transaction-management-content-checkout-subtotal-text" style="float:left">Grand Total</p>
                                <p class="transaction-management-content-checkout-subtotal"><span class="transaction-management-content-checkout-subtotal-text-r">RP </span><?php echo number_format($subtotal,"0",",","."); ?>,-</p>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadForm img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
    });
</script>
</body>
</html>
<?php 
    if(isset($_POST['delete'])){
        $delete_transaction=mysqli_query($connection,"delete from checkout where checkout_id='$transactionname'");
        $runs_transaction=mysqli_fetch_assoc($delete_transaction); header("location:http://localhost/simetri/cpanel/transaction_management.php");
    }
?>