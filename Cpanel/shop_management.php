<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(isset($_POST['delete'])){
    $delete = $_POST['checkbox'];
        if(isset($delete)){
            foreach ($delete as $id) {
            $queryde="DELETE FROM products WHERE id = '$id'";
            $result= mysqli_query($connection, $queryde);
            header("location:index.php");
            }
        }
    }
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
    <title>Shop Management - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-shop-management">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> Shop Management </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-management-content-container">
            <div class="shop-management-content-box">
                <div class="management-content-header">
                    <img src="img/Shop-Icon.png">
                    <p class="management-content-header-title">shop</p>
                    <p class="management-content-header-subtitle">management</p>
                    <div class="management-content-sort-container">
                        <div class="management-content-sort">
                            <span>Sort by</span>
                            <select id="sort" name="sort">
                                <option value="">Choose One</option>
                                <option value="product_name" <?php if(isset($_GET['sort'])){if($_GET['sort']=="product_name"){ echo"selected"; }else{} } ?>>Name</option>
                                <option value="product_size" <?php if(isset($_GET['sort'])){if($_GET['sort']=="product_size"){ echo"selected"; }else{} } ?>>Size</option>
                                <option value="product_price" <?php if(isset($_GET['sort'])){if($_GET['sort']=="product_price"){ echo"selected"; }else{} } ?>>Price</option>
                            </select>
                        </div>
                    </div>
                    <div class="management-content-search-container">
                        <?php if(isset($_GET['sort'])){?>
                        <div class="management-content-search-panel">
                            <form action="shop_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="text" name="sort" value="<?php echo $_GET['sort'];?>" style="display:none;">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } else{?>
                        <div class="management-content-search-panel">
                            <form action="shop_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <a href="shop_management_addnew.php" style="color:#4CCC86;text-decoration:none;"><div class="management-content-button add-new" style="right:170px;">
                   add new
                </div></a>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if($_SESSION['role']=="superadmin" or $_SESSION['role']=="admin"){ ?>
                <div class="management-content-button">
                    <input type="submit" name="delete" value="delete selected" class="deleted" disabled>
                </div>
                    <?php } ?>
                <div class="shop-management-content-table">
                    <table class="shop-management-table-1"border="0 ">
                        <tr style="height:40px;">
                            <th style="width:50px;"></th>
                            <th>item type</th>
                            <th>item name</th>
                            <th>size</th>
                            <th>price</th>
                            <th>stock</th>
                            <th style="width:100px;"></th>
                        </tr>
                        <?php 
                       $cari = "";
                        $get_shop="select * from products";
                        if(isset($_GET['src']) and isset($_GET['sort'])){
                            $cari = $_GET['src'];
                            $sort = $_GET['sort'];
                            if($_GET['sort']=="product_size" and $_GET['src']=="100" or $_GET['src']=="100gr"){
                                $get_shop =$get_shop." where product_size=1 order by product_name asc";
                            }
                            else if($_GET['sort']=="product_size" and $_GET['src']=="250" or $_GET['src']=="250gr"){
                                $get_shop =$get_shop." where product_size=2 order by product_name asc";
                            }
                            else if($_GET['sort']=="product_size" and $_GET['src']=="500" or $_GET['src']=="500gr"){
                                $get_shop =$get_shop." where product_size=3 order by product_name asc";
                            }
                            else if($_GET['sort']=="product_size" and $_GET['src']=="1000" or $_GET['src']=="1000gr"){
                                $get_shop =$get_shop." where product_size=4 order by product_name asc";
                            }
                            else{
                                $get_shop =$get_shop." where $sort like '%$cari%' order by $sort asc";
                            }
                        }
                        else if(isset($_GET['sort'])){
                           if($_GET['sort']==""){
                            $get_shop =$get_shop." order by product_name, product_size asc";
                            }else
                            {
                            $sort = $_GET['sort'];
                            $get_shop =$get_shop." order by $sort asc";
                            }
                        }
                        else if(isset($_GET['src']))
                        {				
                            $cari = $_GET['src'];
                            $get_shop =$get_shop." where product_name like '%$cari%' order by product_name, product_size asc";
                        }
                        else{
                            $get_shop =$get_shop." order by product_name, product_size asc";
                        }
                        $run_shop=mysqli_query($connection,$get_shop) or die(mysql_error());
                        while($shop_baris=mysqli_fetch_array($run_shop)){
                            if($_SESSION['role']!="superadmin" and $shop_baris['product_size']==0){
                                echo "";
                            }
                            else{
                        
                        ?>
                        <tr>
                            <td style="background-color:white;"><input type="checkbox" class="table-checkbox"name="checkbox[]" value="<?php echo $shop_baris['0']?>"></td>
                            
                            <td style="width:200px">
                            <?php                       $brew_id=$shop_baris['product_brew'];
                                $brew_show = mysqli_query($connection,"select * from brew_type where brew_id='$brew_id'");
                                while($brew_baris = mysqli_fetch_assoc($brew_show)){
                                    echo $brew_baris['brew_type']; 
                                }
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:200px"><?php echo $shop_baris['product_name']; ?></td>                           
                            <td style="width:200px;">
                            <?php                       $size_id=$shop_baris['product_size'];
                                $size_show = mysqli_query($connection,"select * from coffee_bag_size where bag_id='$size_id'");
                                while($size_baris = mysqli_fetch_assoc($size_show)){
                                    echo $size_baris['bag_size']; 
                                }
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:200px">idr <?php echo number_format($shop_baris['product_price'],"0",",",".");?></td>
                            
                            <td style="width:165px">
                                <?php 
                                    if($shop_baris['stock']== 0){
                                        echo "Out of stock";
                                    }
                                    else if($shop_baris['stock']== 1){
                                        echo $shop_baris['stock']." Pc"; 
                                    }
                                    else{
                                        echo $shop_baris['stock']." Pcs"; 
                                    }
                                ?> 
                                
                            </td>
                            
                            <td style="background-color:white;">
                                <a href="shop_management_detail.php?shop=<?php echo $shop_baris['id'];?>">edit</a>
                            </td>
                        </tr>
                        <tr><td colspan="8" style="background-color:white;height:3px;"> </td></tr>
                        <?php } }
					?>
                    </table>
                    <?php 
                    $get_shop = "select count(*) from products where product_name like '%$cari%'";
					$rs = mysqli_query($connection,$get_shop);
					$data = mysqli_fetch_array($rs);
                    ?>
                </div>
                </form>
            </div>
            <p style="margin-top:40px;margin-bottom:40px;opacity:0;height:10px;"> </p>
        </div>
    </div>
<script>
    <?php if(isset($_GET['src'])){?>
$('#sort').change(function() {
    window.location = "shop_management.php?src=<?php echo $_GET['src']; ?>&sort=" + $(this).val();
});
    <?php }else{?>
$('#sort').change(function() {
    window.location = "shop_management.php?sort=" + $(this).val();
});
    <?php }?>
$('.table-checkbox').on('change',function(e) {
   if ($(this).prop('checked')) {
        $('.deleted').css('opacity', '1');
        $('.deleted').removeAttr("disabled");
    } else {
        $('.deleted').css('opacity', '0.5');
        $('.deleted').attr("disabled","disabled");
    };
});
</script>
</body>
</html>