<?php
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('l jS \of F Y h:i:s A');
include("connect.php");
$username = $_SESSION['username'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$dob = $_POST['days'];
$mob = $_POST['months'];
$yob = $_POST['years'];
$address = $_POST['address'];
$phone = $_POST['phone'];
//$city = $_POST['city'];
/*----------upload image---------*/
        $product_image = $_FILES['image']['name'];
        $target_dir = "../../img/profile/";
        $target_file = $target_dir . basename($product_image);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
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
if ($email=="") {
    header("location:http://localhost/simetri/edit_profile/E-Mail Must Be Filled");
  } 
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location:http://localhost/simetri/edit_profile/Invalid Email Format");
    }
else if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
      header("location:http://localhost/simetri/edit_profile/Name Can be only contain letters");
    }
else if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
      header("location:http://localhost/simetri/edit_profile/Name Can be only contain letters");
    }
else if (strlen($fname) > 15) {
    header("location:http://localhost/simetri/edit_profile/First name cannot exceed than 15 characters.");
  }
else if (strlen($lname) > 15) {
    header("location:http://localhost/simetri/edit_profile/Last name cannot exceed than 15 characters.");
  } 
else if (strlen($address) > 150) {
    header("location:http://localhost/simetri/edit_profile/Address cannot exceed than 150 characters.");
  }
else if (!preg_match("/^[0-9]*$/",$phone)) {
      header("location:http://localhost/simetri/edit_profile/Phone number can only contain numbers.");
    }
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    //echo "update user set user-image='$product_image' where username='$username'";
    //echo "update user set user-image='$product_image',name='$fname', lname='$lname',gender='$gender',dayofbirth='$dob',monthofbirth='$mob',yearofbirth='$yob',email='$email',address='$address',city='$city',phone_number='$phone' where username='$username'";
    if($product_image !== ""){
    $get_image = "update user set user_image='$product_image' where username='$username'";
    $image_query = mysqli_query($connection,$get_image);
    }
    $get_update = "update user set name='$fname', lname='$lname',gender='$gender',dayofbirth='$dob',monthofbirth='$mob',yearofbirth='$yob',email='$email',city='$city',address='$address',phone_number='$phone' where username='$username'";
    $query = mysqli_query($connection,$get_update);
    
    header("location:http://localhost/simetri/edit_profile/'$fname' profile has been successfully updated.");
}
?>