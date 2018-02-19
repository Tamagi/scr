<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
$id="";
$id=$_GET['email'];
if(!isset($id))
    header("location:http://localhost/simetri/forgotpassword");
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
    <title>Forgot Password - Simetri Coffee Roasters</title>
<style>
    .footer{
        position: absolute;
    }
    .container-cf-forgot-password{
        position: absolute;
        width: 100%;
        height: 100%;
        min-height: 600px;
    }
    .content-cf-forgot-password{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 550px;
    }
    .icon-box{
        margin: auto;
    }
    .icon-text{
        padding-left: 0;
        width: 500px;
        text-align: center;
    }
    .icon-text input[type=text] {
        border: none;
        font-family: Proxima Novabold;
        font-size: 20px;
        width: 500px;
        padding-left: 0px;
        text-align: center;
        margin-bottom: 40px;
    }
    .fgcontinue{
        margin-top: 0;
    }
    @media only screen and (max-width:479px){
        .content-cf-forgot-password{
            top: auto;
            left: 0%;
            transform: translate(0%,0%);
            width: 300px;
            margin: auto;
            position: relative; 
        }
        .cancel-button{
            margin-top: 40px;
        }
        .icon-text{
            width: 300px;
        }
        .icon-text input[type=text] {
        width: 300px;
        margin-bottom: 20px;
        }
        .cffgpassword-text{
            font-size: 20px;
            margin-bottom: 20px;
        }
        .fgcontinue{
            width: 300px;
            font-size: 20px;
            letter-spacing: 6px;
        }
    }
    </style>
</head>
<body>
    <div class="container-cf-forgot-password">
        <div class="login-back">
            <img src="http://localhost/simetri/img/login/Back-Icon.png"> <a href="http://localhost/simetri/login">Back to login</a>
        </div>
        <div class="content-cf-forgot-password">
            <div class="header-logo" align="center">
                <img src="http://localhost/simetri/img/login/Simetri-Full-Icon.png">
            </div>
            <div class="login-form">
                <form method="post" action="" enctype="multipart/form-data">
                <h1 class="forgot-title">recovery password.</h1>
                <p class="forgot-text">We have sent your recovery password to </p>
                <div class="icon-box">
                    <div class="icon-text">
                        <input type="text" name="email" placeholder="Email" value="<?php echo $id;?>"readonly>
                    </div>
                </div>
                <p class="cffgpassword-text">Please check your email and <a href="login.php">login</a> again.</p>
                <p class="cffgpassword-text">If you didn't receive the email from us,<br> please click the link below.</p>
                <div class="continue-button" align="center">
                    <input type="submit" class="fgcontinue" name="submite" value="resend password">
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
</script>
<?php
    if(isset($_POST["submite"])) {
        $email=$id;
        $get_email = "select * from user where email='$email'";
        $run_email = mysqli_query($connection,$get_email);
        $email_baris = mysqli_fetch_array($run_email);
        $name = $email_baris['name'];
        
            function createRandomPassword() {
                $chars = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
                $i = 0;
                $pass = '' ;

                while ($i <=5) {
                    $num = mt_rand(0,61);
                    $tmp = substr($chars, $num, 1);
                    $pass = $pass . $tmp;
                    $i++;
                }
                return $pass;
            }
            $pw = createRandomPassword();
            $reset_pass= "update user set password='$pw' where email='$email'";
            $query_reset=mysqli_query($connection,$reset_pass);
            $to = $email; // this is your Email address
            $from ="rihco@creatheavity.com"; // this is the sender's Email address
            $subject = "Contact us Submission";
            $subject2 = "Copy of your Frachise submission";
            //$message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
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
                                    sans-serif;"> Please pay this invoice immediately – this
                                    is an important email for you and make sure to
                                    understand the content of the email. </div>
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
                                          <p style="margin:0;font-size:30px;font-family:arial">Simetri Account Password Recovery</p>
                                          <hr>
                                          <br>
                                          <p style="margin:0;text-align:left;">Dear Mr/Mrs.'.$name.'</p>
                                          <br>
                                          <p style="margin:0;text-align:left;font-size:12px">We received a request to change your password on Simetri Coffee website.</p>
                                          <br>
                                          <p style="margin:0;text-align:left;">We have change your password to:</p>
                                          <br>
                                          <p style="margin:0;text-align:left;">'.$pw.'</p>
                                          <br>
                                          <p style="margin:0;text-align:left;">Please change your password immediately to prevent any futher security issues.</p>
                                          <br>
                                          <br>
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
            //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
            header("Location:http://localhost/simetri/cfforgotpassword.php?email=$email");
    }
?>
</body>
</html>