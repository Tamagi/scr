<?php
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('Y-m-d H:i:s');
include("connect.php");
$username = $_SESSION['username'];
$id = $_GET['invc'];
$accnumber = $_POST['number'];
$bank = $_POST['bank'];
$accname= $_POST['bname'];


/*----------upload image---------*/
        $product_image = $_FILES['image']['name'];
        $target_dir = "../../img/confirmation-images/";
        $target_file = $target_dir . basename($product_image);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check file size
        if ($_FILES["image"]["size"] > 600000) {
            header("location:http://localhost/simetri/confirmation/$id/Sorry File too large");
            $uploadOk = 0;
        }
        else if(empty($product_image)){
            header("location:http://localhost/simetri/confirmation/$id/image must be uploaded!");
        }
        // Allow certain file formats
        else if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            header("location:http://localhost/simetri/confirmation/$id/Sorry File only contain JPG files");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        else if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
         //if everything is ok, try to upload file
        }
/*--------------------------------*/
else if ($accname=="") {
    header("location:http://localhost/simetri/confirmation.php/$id/Account Name must be filled");
  }
else if ($bank=="0") {
      header("location:http://localhost/simetri/confirmation.php/$id/Bank must be choosen.");
    }
else if ($accnumber=="") {
      header("location:http://localhost/simetri/confirmation.php/$id/Account number must be filled");
    }
else
{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $get_update = "insert into confirmation_form value('','$id','$accnumber','$accname','$product_image','$bank')";
    $query = mysqli_query($connection,$get_update);
    
    $update_status = mysqli_query($connection,"update checkout set status='userconfirm', bank_id='$bank' where invoice_number='$id'");
    header("location:http://localhost/simetri/user_transaction_details/$id");
}
?>