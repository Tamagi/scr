<?php
session_start();
include("connect.php");
date_default_timezone_set("Asia/Bangkok"); 
$date=date('Y-m-d H:i:s');
    $id=$_GET['transaction'];
        $get_invoice=mysqli_query($connection, "select * from checkout where checkout_id='$id'");
        $run=mysqli_fetch_array($get_invoice);
        $invoice=$run['invoice_complete'];
    if(isset($_POST['waiting'])){
        $update_status = "update checkout set status='paid',modified='$date' where checkout_id='$id'";
        $run_status = mysqli_query($connection, $update_status);
        $update_order = "update order_item set status='paid',modified='$date' where checkout_id='$id'";
        $run_oreder= mysqli_query($connection, $update_order);
        echo $id;
        header("location:../transaction_management.php?success='$invoice' status has changed to paid.");
    }
    if(isset($_POST['paid'])){
        $dinvoice=$_POST['dinvoice'];
        $ddate=$_POST['ddate'];
        if($dinvoice==""){
            header("location:../transaction_management_detail.php?transaction=$id & errors=Deliver Invoice must be filled.");
        }
        else if (!preg_match("/^[0-9]*$/",$dinvoice)) {
            header("location:../transaction_management_detail.php?transaction=$id & errors=Deliver Invoice can only contain numbers.");
        }
        else if ($ddate=="") {
            header("location:../transaction_management_detail.php?transaction=$id & errors=Date Invoice must be filled.");
        }
        else{
        $update_status = "update checkout set status='shipping',modified='$date',shipping_invoice='$dinvoice',shipping_date='$ddate' where checkout_id='$id'";
        $run_status = mysqli_query($connection, $update_status);
        $update_order = "update order_item set status='shipping',modified='$date' where checkout_id='$id'";
        $run_order= mysqli_query($connection, $update_order);
        header("location:../transaction_management.php?success='$invoice' status has changed to shipping.");
        }
    }
    if(isset($_POST['progress'])){
        $update_status = "update checkout set status='finished',modified='$date' where checkout_id='$id'";
        $run_status = mysqli_query($connection, $update_status);
        $update_order = "update order_item set status='finished',modified='$date' where checkout_id='$id'";
        $run_oreder= mysqli_query($connection, $update_order);
        //product code---------------------------------//
        $checkout_detail=mysqli_query($connection,"select * from checkout where checkout_id='$id'");
        $checkout_baris= mysqli_fetch_array($checkout_detail);
        $invoice=$checkout_baris['invoice_complete'];
        $invoicedate=$checkout_baris['modified'];
        $di=$checkout_baris['shipping_invoice'];
        $username=$checkout_baris['username'];
        
        $user_detail=mysqli_query($connection,"select * from user where username='$username'");
        $user_baris=mysqli_fetch_array($user_detail);
        $name=$user_baris['name'];
        $address=$user_baris['address'];
        $destination=$user_baris['city'];
        $email=$user_baris['email'];
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
                                    }
        
        
        //product code---------------------------------//
        
        //Email container------------------------------//
            
        $to = "rob@rnwood.co.uk"; // this is your Email address
            $from = $email; // this is the sender's Email address
            $subject = "Contact Us Submission";
            $message ='<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
  </head>
  <body bgcolor="#FFFFFF" text="#000000">
    <meta charset="UTF-8">
    <table style="border-collapse:collapse;" height="100%"
      bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0"
      width="100%">
      <tbody>
        <tr>
          <td align="center" valign="top">
            <center style="width: 100%;">
              <!-- Visually Hidden Preheader Text : BEGIN -->
              <div style="display: none; font-size: 1px; line-height:
                1px; max-height: 0px; max-width: 0px; opacity: 0;
                overflow: hidden; mso-hide:all; font-family:
                sans-serif;"> Thank you for your purchase in Simetri Coffee Roasters.</div>
              <!-- Visually Hidden Preheader Text : END -->
              <div style="max-width: 600px;">
                <!--[if (gte mso 9)|(IE)]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->
                <!-- Email Header : BEGIN -->
                <table style="max-width: 600px;" align="center"
                  border="0" cellpadding="0" cellspacing="0"
                  width="100%">
                  <tbody>
                    <tr>
                      <td style="padding-left: 0px; padding-top: 30px;
                        padding-bottom: 0px; padding-right: 30px;
                        text-align: center" bgcolor="#ffffff"> <img src="http://www.simetricoffee.com/img/Logo-Simetri-black.png" height="80px"alt="Simetri Coffee Roasters">
                        </td>
                    </tr>
                  </tbody>
                  </table>
                <hr>
                  <div style="max-width:600px" align="center">
                      <p style="margin:0;font-size:30px;font-family:arial">Simetri Invoice Form</p>
                      <hr>
                      <br>
                      <p style="margin:0;text-align:left;font-size: 20px;font-weight:bold;">Dear Mr/Mrs.'.$name.'</p>
                      <br>
                      <p style="margin:0;text-align:left;font-size:16px;font-weight:400">Thank you for your purchase on Simetri Coffee Roasters. We are sending you this mail to remind you that your purchase is complete.</p>
                      <br>
                      <hr style="border: 2px solid lightgrey; margin: 0px 50px 0px 50px;">
                      <br>
                      <div style="max-width:500px;margin-bottom: 40px;" align="center">
                          <p style="margin:0;font-size:
                                    20px;font-family:arial;font-weight: bold;text-align: left;color:#4f4f4f"><u>Invoice Summary</u></p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 150px;color:#4f4f4f">Invoice Number</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 350px;color:#4f4f4f">: '.$invoice.'</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 150px;color:#4f4f4f">Name</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 350px;color:#4f4f4f">: '.$name.'</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 150px;color:#4f4f4f">Delivery Invoice</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 350px;color:#4f4f4f">: '.$di.'</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 150px;color:#4f4f4f">Invoice Finish Date</p>
                          <p style="margin:0;padding-top: 10px;font-size:
                                    16px;font-family:arial;font-weight:500;text-align: left;float: left;width: 350px;color:#4f4f4f">: ' .$invoicedate.'</p>
                      </div>
                      <br>
                      <hr style="border: 2px solid lightgrey; margin: 0px 50px 0px 50px;">
                      <table style="width:500px;" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding:20px 0;font-size: 20px; font-family:arial;font-weight: bold;text-align: left;color:#4f4f4f" align="left"><u>Order Summary</u></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 0">
                                <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse">
                                    <tr>
                                        <th style="padding:10px 0;border-bottom:2px solid #dddddd" align="left" width="250">Item Name</th>
                                        <th style="padding:10px 0;border-bottom:2px solid #dddddd" align="right" width="100">Quantity</th>
                                        <th style="padding:10px 0;border-bottom:2px solid #dddddd" align="right" width="150">Price</th>
                                    </tr>';
        $total =0;
        $total_product =0;
        $totalqty=0;
        $i=1;
        $order_detail=mysqli_query($connection,"select * from order_item where checkout_id='$id'");
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
                    $i++;
                        $message .='<tbody style="vertical-align:top;line-height:1.6em">
                                        <tr>
                                        <td style="padding:10px 0;border-bottom:2px solid #dddddd" align="left" width="250">'.$product_name.'</td>
                                        <td style="padding:10px 0;border-bottom:2px solid #dddddd" align="right" width="100">'.$qty.'</td>
                                        <td style="padding:10px 0;border-bottom:2px solid #dddddd" align="right" width="150">'.number_format($single_price,"0",",",".").'</td>
                                        </tr>
                                    </tbody>';
                }
        }
        $total_all_item = $total_academy + $total_product;               $total = $total_all_item;
        $subtotal=0;
        $subtotal= $total + $ship_detail_price;
                    $message .='</table>  
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 0 15px">
                                 <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse">
                                    <tr>
                                        <td align="right" width="350" style="padding: 5px 0">
                                        Total
                                        </td>
                                        <td align="right" width="150" style="padding: 5px 0">Rp '.number_format($total_all_item,"0",",",".").'</td>
                                    </tr>
                                    <tr>
                                        <td align="right" width="350" style="padding: 5px 0">
                                        Shipping
                                        </td>
                                        <td align="right" width="150" style="padding: 5px 0">Rp '.number_format($ship_detail_price,"0",",",".").'</td>
                                    </tr>
                                    <tr>
                                        <td align="right" width="350" style="padding: 5px 0; font-weight: bold;">
                                        Grand Total
                                        </td>
                                        <td align="right" width="150" style="padding: 5px 0; font-weight: bold;">Rp '.number_format($subtotal,"0",",",".").'</td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px;background-color:#f1f1f1">
                                 <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse; width: 100%;max-width:500px;">
                                    <tr>
                                        <td align="left" >
                                        <span style="font-weight: bold">Tujuan Pengiriman</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" >
                                        '.$destination.',<br>
                                        '.$address.'
                                        </td>
                                    </tr>
                                </table> 
                            </td>
                        </tr>
                      </table>
                      <hr style="border: 2px solid lightgrey; margin: 0px 50px 0px 50px;">
                      <br>
                      <p>If you needed help, please feel free to contact us from our <a style="color:green" href="http://localhost/simetri/home#homepage_contact">contact page</a></p>
                      <p style="margin:0;text-align:left;">Thank you,</p>
                      <p style="margin:0;text-align:left;">Simetri Coffee Roasters team</p>
                  </div>
                  <hr>
                </div>
              </center>
            </td>
          </tr>
        </tbody>
      </table>
<style>
html, body {
	margin: 0 !important;
	padding: 0 !important;
	height: 100% !important;
	width: 100% !important;
}
/* What it does: Stops email clients resizing small text. */
* {
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%;
}
/* What it does: Forces Outlook.com to display emails full width. */
.ExternalClass {
	width: 100%;
}
/* What is does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
	margin: 0 !important;
}
/* What it does: Stops Outlook from adding extra spacing to tables. */
table, td {
	mso-table-lspace: 0pt !important;
	mso-table-rspace: 0pt !important;
}
/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
table {
	border-spacing: 0 !important;
	border-collapse: collapse !important;
	table-layout: fixed !important;
	margin: 0 auto !important;
}
table table table {
	table-layout: auto;
}
/* What it does: Uses a better rendering method when resizing images in IE. */
img {
	-ms-interpolation-mode: bicubic;
}
/* What it does: Overrides styles added when Yahoo"s auto-senses a link. */
.yshortcuts a {
	border-bottom: none !important;
}
/* What it does: Another work-around for iOS meddling in triggered links. */
a[x-apple-data-detectors] {
	color: inherit !important;
}
a {
	text-decoration: none !important;
}
</style>
    <link
href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700"
      rel="stylesheet" type="text/css">
    <link
      href="https://fonts.googleapis.com/css?family=Arimo:400,600,700"
      rel="stylesheet" type="text/css">
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet" type="text/css">
  </body>
</html>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$message,$headers);
        
        //end of Email Container------------------------------//
        header("location:../transaction_management.php?success='$invoice' status has changed to finished.");
    }
?>