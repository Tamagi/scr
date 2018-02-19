<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
$username =  $_SESSION['username'];
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
$totalqty = 0;
$sell_price="select * from order_item where username='$username' and status='cart pending'";
$run_price= mysqli_query($connection, $sell_price);
while($pro_price = mysqli_fetch_assoc($run_price)){
$totalqty += $pro_price['quantity'];
}
if($totalqty==0){
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
    body{
        overflow: auto;
    }
    .login-full{
        position: fixed;    
    }
    .menu-content a{
        color: white;
    }
    .content-checkout-shipping-split-right a:hover{
        background-color: aqua;
        cursor: pointer;
        transition: all .5s;
    }
    .content-checkout-button input[type=submit]:hover{
        background-color: aqua;
        cursor: pointer;
        transition: all .5s;
    }
    </style>
<script>
if($("#kurir2").change){
    $(document).ready(function(){
        $("#kurir2").change(function(){
             var kurir= $('#kurir2 option:selected').val();
            $.ajax({
                type:"POST",
                url:"http://localhost/simetri/AJAXshipping.php",
                data:{selected:kurir},
                success: function(data) {
                   location.reload();
                  },
                  error: function(data) {
                    alert("failed");
                  }
            });
        });
    });
}
if($("#editaddress").click()){
$(document).ready(function(){
    $("#editaddress").click(function(){
        if(confirm("Are you sure you want to proceed?")==true){
            var addresss= $('#ediaddress').val();
            $.ajax({
                type:"POST",
                url:"http://localhost/simetri/editaddressfast.php",
                data: {address:addresss},
                success: function(data) {
                    location.reload();
                    alert("Success change password");
                  },
                  error: function(data) {
                    alert("failed to change please try again.");
                  }
            });
        }
        else{
            location.reload();
        }
    });
});
}
</script>
</head>
<body>
    <div class="container-checkout">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>     
        <div class="content-checkout">
            <div class="content-checkout-header">
                <p class="homepage-cart-title">checkout</p>
                <?php $totalqty=0;
                        include("backend/doform/connect.php");
                        $username =  $_SESSION['username'];
                        $sell_price="select * from order_item where username='$username' and status='cart pending'";
                        $run_price= mysqli_query($connection, $sell_price);
                        while($pro_price = mysqli_fetch_assoc($run_price)){
                             $totalqty += $pro_price['quantity'];
                        }
                ?>
                <p class="homepage-cart-subtitle">You have bought <b><?php echo $totalqty; ?></b> items, please complete your payment below.</p>
                <img src="http://localhost/simetri/img/transaction/Checkout-Notification-Bar.png" align="center">
                <div class="content-checkout-header-text">
                    <p style="text-align:center" align="left">cart</p>
                    <p style="text-align:center" align="center">checkout</p>
                    <p style="text-align:center" align="right">confirm</p>
                </div>
            </div>
            <p class="homepage-checkout-title">your order</p>
            <div class="content-checkout-container">
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
                        $cart_id = $pro_price['id'];
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
                <div class="content-checkout-single">
                    <div class="content-checkout-single-right">
                        <div class="content-checkout-single-left-box">
                            <p class="content-checkout-origin"><?php echo $pp_price['origin']; ?></p>
                            <p class="content-checkout-title"><?php echo $product_name; ?></p>
                        </div>
                        <div class="content-checkout-single-middle-box">
                            <div class="content-checkout-single-right-split-size">
                            <p class="content-checkout-size-text">Size</p><p class="content-checkout-size">
                                <?php 
                                    $size_show = mysqli_query($connection,"select * from coffee_bag_size where bag_id='$size'");
                                    while($size_baris = mysqli_fetch_assoc($size_show)){ 
                                    echo $size_baris['bag_size'];
                                    }
                                ?>
                                </p>
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
                <?php   
                    $i++;
                    }
                }
                ?>
<!-----------------------------------------------product code---------------------------------------->
<!-----------------------------------------------academy code---------------------------------------->
               <?php
                        $total_academy =0;
                    $username =  $_SESSION['username'];
                    $sell_price="select * from order_item where username='$username' and status='cart pending'";
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
                $total = $total_all_item;
                ?>
<!-----------------------------------------------academy code---------------------------------------->
            </div>
            <div class="content-checkout-shipping-container">
                <p class="homepage-checkout-title">shipping</p>
                <div class="content-checkout-shipping-split">
                    <div class="content-checkout-shipping-split-left">
                        <select class="content-checkout-courier" >
                            <option>JNE</option>
                        </select>
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
                        <select class="content-checkout-package" name="kurir2" id="kurir2">
                            <option value="0" disabled selected><?php echo $ship_name;?></option>
                            <option value="1">Reguler</option>
                            <option value="2">YES</option>
                        </select>
                        <p class="content-checkout-courier-price"><span style='float:left;padding-right:50px;'>
                            <?php if($destination==""){
                            
                            ?>
                            <a href="http://localhost/simetri/edit_profile" style="color:black;text-decoration:none;">Edit Destination</a>
                            <?php
                            }
                            else if($ship==0){
                                
                            }
                            else{
                                echo $ship_detail_dest;
                                } ?>
                            </span>
                            <?php
                            if($destination==""){
                            }
                            else if($ship==0){
                                
                            }
                            else{?>
                            <span class="content-checkout-subtotal-text-r">RP </span>
                            <?php
                                echo number_format($ship_detail_price,'0',',','.');
                            
                            ?>
                            ,-
                            <?php }?>
                        </p>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="Are You Sure to change address?">
                    <div class="content-checkout-shipping-split-right">
                        <textarea class="content-checkout-shipping-address" name="address" id="ediaddress"><?php
                                $user_address=mysqli_query($connection,"select * from user where username='$username'");
                                $address=mysqli_fetch_assoc($user_address);
                                echo $address['address'];
                            ?></textarea>
                        <br><p id="editaddress"><a>edit address</a></p>
                    </div>
                    </form>
                </div>
            </div>
            <div class="content-checkout-summary-container">
                <p class="homepage-checkout-title">summary</p>
                <div class="content-checkout-summary-split">
                    <div class="content-checkout-summary-split-left">
                        <p class="content-checkout-subtotal-text">Sub Total</p>
                        <p class="content-checkout-subtotal-text">Shipping price</p>
                    </div>
                    <div class="content-checkout-summary-split-right">
                        <p class="content-checkout-subtotal"><span class="content-checkout-subtotal-text-r">RP </span><?php  echo number_format($total_all_item,"0",",",".");?>,-</p>
                        <p class="content-checkout-subtotal">
                            <?php 
                                if($destination==""){
                             echo" 0,-";
                            }
                            else if($ship==0){
                                echo" 0,-";
                            }
                            else{
                            ?>
                            <span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($ship_detail_price,"0",",",".");?>,-</p><?php }?>
                    </div>
                </div>    
                <hr style="border:3px solid black;border-radius:30px;">
                <p class="content-checkout-subtotal-text" style="float:left">Grand Total</p>
                <p class="content-checkout-subtotal">
                    <?php 
                            if($destination==""){
                                ?>
                    <span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($total,"0",",","."); ?>,-
                        <?php
                            }else if($ship==0){
                                ?>
                    <span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($total,"0",",","."); ?>,-
                        <?php
                            }
                            else{
                            ?><span class="content-checkout-subtotal-text-r">RP </span><?php echo number_format($subtotal,"0",",","."); ?>,-</p><?php } ?>
            </div>
            <div class="content-checkout-payment">
                <p class="homepage-checkout-title">payment method</p>
                <p class="homepage-checkout-subtitle">Please complete your order by Transfering to the BCA account below, Thank you.</p>
                <img src="http://localhost/simetri/img/transaction/bca.jpg">
                <p class="content-checkout-payment-pin">7002639128010893</p>
                <p class="content-checkout-payment-text">A/N simetri coffee roasters</p>
            </div>
            <form action="http://localhost/simetri/backend/doform/doCheckout.php" enctype="multipart/form-data" method="post" onsubmit="return confirm('Are you sure to Checkout?')">
            <input type="text" name="address" value="<?php echo $address['address'];?>"hidden>
            <input type="text" name="grandtotal" value="<?php echo $subtotal?>"hidden>
            <input type="text" name="shipname" value="<?php echo $ship_id?>"hidden>
            <input type="text" name="shipaddress" value="<?php echo $ship_detail_id?>"hidden>
            <div class="content-checkout-button">
                <?php if($destination==""){
                    
                ?>
                <p style="text-align:center"><input type="button" value="pay" onclick="alert('Please choose your destination')"></p>
                <?php 
                }
                   else{
                ?>
                <p style="text-align:center"><input type="submit" value="pay" name="pay"></p>
                    <?php } ?>
            </div>
            </form>
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
<?php 
if(isset($_POST['editaddress'])){
    $address = $_POST['address'];
    
    $query="update user set address=$address where username=$username";
    $result= mysqli_query($connection,$query);
    header("location:http://localhost/simetri/checkout");
}
?>