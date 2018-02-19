<?php
if(isset($_POST['save'])){
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('l jS \of F Y h:i:s A');
include("connect.php");
$id = $_GET['shop'];
$name= $_POST['name'];
$origin= $_POST['origin'];
    $price= $_POST['price'];
    $stock= $_POST['stock'];
    $desc= $_POST['desc'];
/*----------upload image---------*/
        $product_image = $_FILES['image']['name'];
        $target_dir = "../../img/shop-image/";
        $target_file = $target_dir . basename($product_image);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check file size
        if ($_FILES["image"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
         //if everything is ok, try to upload file
        }
/*--------------------------------*/
if ($name=="") {
    header("location:../shop_management_detail.php?shop=$id & shop=$id & errors=shop Name Must Be Filled");
  }
else if (!preg_match("/^[a-zA-Z\s]*$/",$name)) {
      header("location:../shop_management_detail.php?shop=$id & errors=product Name Can be only contain letters");
    }
else if (strlen($name) > 30) {
    header("location:../shop_management_detail.php?shop=$id & errors=product name cannot exceed than 30 characters.");
  }
else if ($origin=="") {
      header("location:../shop_management_detail.php?shop=$id & errors=origin Must be Filled");
    }
else if (strlen($desc) > 200) {
    header("location:../shop_management_detail.php?shop=$id & errors=Detail cannot exceed than 200 characters.");
  }
else if (!preg_match("/^[0-9]*$/",$price)) {
      header("location:../shop_management_detail.php?shop=$id & errors=Price can only contain numbers.");
    }
else if (!preg_match("/^[0-9]*$/",$stock)) {
      header("location:../shop_management_detail.php?shop=$id & errors=Capacity can only contain numbers.");
    }
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    if($product_image !== ""){
    $get_image = "update products set product_image='$product_image' where id='$id'";
    $image_query = mysqli_query($connection,$get_image);
    }
    $get_update = "update products set product_name='$name', product_description='$desc',product_price='$price',stock='$stock',origin='$origin' where id='$id'";
    $query = mysqli_query($connection,$get_update);
    
    header("location:../shop_management_detail.php?shop=$id & success= '$name' product has been successfully updated.");
}
}
?>