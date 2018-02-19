<?php
if(isset($_POST['save'])){
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('l jS \of F Y h:i:s A');
include("connect.php");
$id = $_GET['news'];
$date = $_POST['date'];
$name = $_POST['aname'];
$creator = $_SESSION['username'];
$fl = $_POST['fl'];
$detail = $_POST['details'];
$content = $_POST['contents'];
/*----------upload image---------*/
        $product_image = $_FILES['image']['name'];
        $target_dir = "../../img/news-image/";
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
    header("location:../news_management_detail.php?news=$id & errors=news Name Must Be Filled");
  }
else if (!preg_match("/^[a-zA-Z\s]*$/",$name)) {
      header("location:../news_management_detail.php?news=$id & errors=news Name Can be only contain letters");
    }
else if (strlen($name) > 50) {
    header("location:../news_management_detail.php?news=$id & errors=news name cannot exceed than 50 characters.");
  }
else if (strlen($fl) > 1) {
    header("location:../news_management_detail.php?news=$id & errors=news first letter cannot exceed than 1 character.");
  }
else if (strlen($detail) > 300) {
    header("location:../news_management_detail.php?news=$id & errors=Detail cannot exceed than 300 characters.");
  }
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $get_update = "insert into news values('','$product_image','$name','$creator','$detail','$fl','$content','$date')";
    $query = mysqli_query($connection,$get_update);
    
    header("location:../news_management_addnew.php?success= '$name' news has been successfully added.");
}
}
?>