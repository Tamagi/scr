<?php
if(isset($_POST['save'])){
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('j F Y h:i:s A');
include("connect.php");
$name= $_POST['name'];
$origin= $_POST['origin'];
$desc= $_POST['desc'];
$brew= $_POST['brew'];
$process= $_POST['process'];
$roast= $_POST['roast'];
$varietal= $_POST['varietal'];
    
$size=$_POST['size'];
$price= $_POST['price'];
$stock= $_POST['stock'];
    
$keyword=mysqli_query($connection,"select product_id from products order by product_id desc limit 1 ");
$run_keyword=mysqli_fetch_array($keyword);
$product_keywords=$run_keyword['product_id']+1;
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
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
         //if everything is ok, try to upload file
        }
/*----------upload re-image---------*/   

/*--------------------------------*/
if ($name=="") {
    header("location:../shop_management_addnew.php?errors=shop Name Must Be Filled");
  }
else if (!preg_match("/^[a-zA-Z\s]*$/",$name)) {
      header("location:../shop_management_addnew.php?errors=product Name Can be only contain letters");
    }
else if (strlen($name) > 30) {
    header("location:../shop_management_addnew.php?errors=product name cannot exceed than 30 characters.");
  }
else if ($origin=="") {
      header("location:../shop_management_addnew.php?errors=origin Must be Filled");
    }
else if ($price==0) {
      header("location:../shop_management_addnew.php?errors=price Must be Filled");
    }
else if($brew==0){
    header("location:../shop_management_addnew.php?errors=Brew Must be selected");
}
else if($process==0){
    header("location:../shop_management_addnew.php?errors=process Must be selected");
}
else if($roast==0){
    header("location:../shop_management_addnew.php?errors=roast Must be selected");
}
else if($varietal==""){
    header("location:../shop_management_addnew.php?errors=varietal Must be Filled");
}
else if (strlen($desc) > 200) {
    header("location:../shop_management_addnew.php?errors=Detail cannot exceed than 200 characters.");
  }
else if(!isset($size)){
    header("location:../shop_management_addnew.php?errors=Size must be choosen.");
}
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $insert_product0 = "insert into products values('','$product_keywords','coffee','$name','$product_image','$product_image','For Default Image','','$origin','$date','$date','1','$brew','$process','$roast','$varietal','0')";
    $insert_pro = mysqli_query($connection, $insert_product0);
    $n= sizeof($size);
    /*----------------------------image upload-------------------*/
    for($u=0;$u<$n;$u++){
          //Get the temp file path
            $tmpFilePath = $_FILES['imagesize']['tmp_name'][$u];
            $shortname = $_FILES['imagesize']['name'][$u];
            $filePath = "../../img/shop-image/".$_FILES['imagesize']['name'][$u];
        move_uploaded_file($tmpFilePath, $filePath);
        $insert_product = "insert into products values('','$product_keywords','coffee','$name'  ,'$shortname','$product_image','$desc','$price[$u]','$origin','$date','$date','$stock[$u]','$brew','$process','$roast','$varietal','$size[$u]')";
        $insert_pro = mysqli_query($connection, $insert_product);
        //--------------------------------------------------------------  
        }
    header("location:../shop_management_addnew.php?success= '$name' product has been successfully updated.");
}
}
?>