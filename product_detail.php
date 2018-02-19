<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/product.php");

    $pid= $_GET['pid'];
if(!isset($pid)){
    header("location:http://localhost/simetri/product.php");
}
    $size_show = mysqli_query($connection,"select * from coffee_bag_size")or die(mysqli_error($connection));
    $varietal_show = mysqli_query($connection,"select * from varietals")or die(mysqli_error($connection));
    $process_show = mysqli_query($connection,"select * from process_type")or die(mysqli_error($connection));
    $product_show = mysqli_query($connection,"select * from products where product_size='0' and product_id='$pid'")or die(mysqli_error($connection));
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
    <div class="container-product-detail">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-product-detail">
            <?php 
                while($product_baris = mysqli_fetch_assoc($product_show)){ 
            ?>
            <div class="product-detail-image-container">
                <img src="http://localhost/simetri/img/shop-image/<?php echo $product_baris['product_image']; ?>">
            </div>
            <div class="product-detail-content-right">
                <div class="product-detail-content-container">
                    <div class="product-detail-stock">
                        <p class="stock">in stock</p>
                    </div>
                    <div class="product-detail-subtitle">
                        <p class="product-subtitle"><?= $product_baris['origin']; ?></p>
                    </div>
                    <div class="product-detail-title">
                        <p class="product-title"><?= $product_baris['product_name']; ?></p>
                    </div>
                    <div class="product-detail-image-mobile">
                        <img src="http://localhost/simetri/img/shop-image/<?php echo $product_baris['product_image']; ?>">
                    </div>
                    <div class="product-detail-text">
                        <p class="product-text"><?= $product_baris['product_description']; ?></p>
                    </div>
                    <div class="product-detail-types">
                        <div>
                            <p class="product-detail-types-top-text">processing type</p>
                            <p class="product-detail-types-bot-text">
                                <?php 
                                    $process_id=$product_baris['product_process'];
                                    $process_show = mysqli_query($connection,"select * from process_type where process_id='$process_id'");
                                    while($process_baris = mysqli_fetch_assoc($process_show)){ 
                                        echo $process_baris['process_type'];
                                    } 
                                ?>
                        </div>
                        <div>
                            <p class="product-detail-types-top-text">varietal</p>
                            <p class="product-detail-types-bot-text">
                            <?php                                       echo $product_baris['product_varietals']; 
                            ?>
                            </p>
                        </div>
                        <div>
                            <p class="product-detail-types-top-text">roast type</p>
                            <p class="product-detail-types-bot-text">
                            <?php 
                                $roast_id=$product_baris['product_roast'];
                                $roast_show = mysqli_query($connection,"select * from roast_type where roast_id='$roast_id'");
                                    while($roast_baris = mysqli_fetch_assoc($roast_show)){
                                        echo $roast_baris['roast_type'];
                                    }
                            ?>
                            </p>
                        </div>
                        <div style="margin-bottom:30px;">
                            <p class="product-detail-types-top-text">roasted for</p>
                            <p class="product-detail-types-bot-text"><?php  $brew_id=$product_baris['product_brew'];
                                $brew_show = mysqli_query($connection,"select * from brew_type where brew_id='$brew_id'");
                                    while($brew_baris = mysqli_fetch_assoc($brew_show)){
                                        echo $brew_baris['brew_type'];
                                    }
                            ?></p>
                        </div>
                    </div>
                    <form action="http://localhost/simetri/backend/doform/doBuynow.php?pid=<?php echo $product_baris['product_id'];?>" method="post" enctype="multipart/form-data">
                    <div class="product-detail-size">
                        <div class="product-detail-size-left">
                            <select id="price" name="size" class="detail-size">
                                <option value="0">Choose size</option>
                                <?php
                                    $pid= $product_baris['product_id'];
                                    include("backend/doform/connect.php");
                                    $product1 = mysqli_query($connection,"select * from products where product_id='$pid'");
                                    while($row_product=mysqli_fetch_assoc($product1)){
                                        $price=$row_product['product_price'];
                                        $size_id = $row_product['product_size'];

                                        $get_size = "select * from coffee_bag_size where bag_id='$size_id'";
                                        $run_size = mysqli_query($connection, $get_size);
                                        $row_size = mysqli_fetch_assoc($run_size);
                                        $size_title = $row_size['bag_size'];
                                        
                                        if($price==0){
                                            
                                        }else{
                                        echo"<option value='$price'>$size_title</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="product-detail-size-right">
                            <input type="button" value='-' class="qtyminus">
                            <input type="text" id="quantity" name="quantity" class="qty" value="1">
                            <input type="button" value='+' class="qtyplus">
                        </div>
                    </div>
                    <div class="product-detail-price">
                        <div><p class="rp">RP&nbsp;</p><p class="price"><input class="price" id="total"type="text" value="0" readonly></p>
                        <p class="rp">,-</p>
                        </div>
                    </div>
                        <?php if(isset($_SESSION['username'])){ ?>
                    <div class="product-detail-button">
                        <input type="submit" class="addcart" name="addcart" value="add to cart">
                    </div>
                    <?php } ?>
                    </form>
                </div>
            </div>
            <?php } ?>
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
        if (!isNaN(currentVal)&& currentVal < 10) {
            qty.val(currentVal + 1);
        } else {
            qty.val(10);
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