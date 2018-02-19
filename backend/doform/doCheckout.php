<?php
session_start();
date_default_timezone_set("Asia/Bangkok"); 
$date=date('Y-m-d H:i:s');
$invdate=date('Ymd');
include("connect.php");

$username=$_SESSION['username'];
$address=$_POST['address'];
//$kode=$_POST['kode'];
$gt=$_POST['grandtotal'];
$ship_name=$_POST['shipname'];
$ship_address=$_POST['shipaddress'];
if($address==""){
    echo "<script>
    window.location.href='http://localhost/simetri/checkout';
alert('Please update your address.');
</script>";
}
else if($address=="default"){
    echo "<script>
    window.location.href='http://localhost/simetri/checkout';
alert('Please update your address.');
</script>";
}
else{
    $invoice_query="select invoice_number from checkout order by invoice_number desc limit 1";
    $invoice_result=mysqli_query($connection,$invoice_query);
    $invoice_data = mysqli_fetch_array($invoice_result);
    if($invoice_data){
        $invoice = $invoice_data[0]+1;
        if($invoice < 10){
            $invoice = "0000000".$invoice;
        }
        else if($invoice < 100){
            $invoice = "000000".$invoice;
        }
        else if($invoice < 1000){
            $invoice = "00000".$invoice;
        }
        else if($invoice < 10000){
            $invoice = "0000".$invoice;
        }
        else if($invoice < 100000){
            $invoice = "000".$invoice;
        }
        else if($invoice < 1000000){
            $invoice = "00".$invoice;
        }
        else if($invoice < 10000000){
            $invoice = "0".$invoice;
        }
        else{
            $invoice = $invoice;
        }
    }
$query_insert="insert into checkout values('','$username','','$address','','$gt','$ship_name',
'$ship_address','$date','$date','unpaid','$invoice','INVC/$invdate/$invoice','','')";
    
$cart_delete="delete from cart_items where username='$username'";
$delete=mysqli_query($connection,$cart_delete);
    
$result=mysqli_query($connection,$query_insert);

$select_order="select * from checkout where username='$username' order by checkout_id desc limit 1";
$select=mysqli_query($connection,$select_order);
$select_baris=mysqli_fetch_array($select);
$checkout_id= $select_baris['checkout_id'];
$update_order="update order_item set status='waiting payment',checkout_id='$checkout_id',invoice_number='$invoice' where username='$username'and status='cart pending'";
$update=mysqli_query($connection,$update_order);
echo "<script>
window.location.href='http://localhost/simetri/thankyou.php';
alert('Checkout success. please check payment detail in your profile to do payment thank you.');
</script>";
}
?>