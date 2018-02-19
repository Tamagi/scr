<?php
$name=$_POST['contactname'];
    $sub=$_POST['contactsubject'];
    $email=$_POST['contactemail'];
    $msg=$_POST['contactmessage'];

        $query="insert into contact values('','$name','$email','$sub','$msg')";
        $result= mysqli_query($connection,$query);
        
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
                                    sans-serif;">Someone Contacted you.-</div>
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
                                          <p style="margin:0;font-size:30px;font-family:arial">Simetri Contact Submission</p>
                                          <hr>
                                          <br>
                                          <p style="margin:0;text-align:left;">Dear Mr/Mrs.'.$name.' has contact you about '.$sub.'</p>
                                          <br>
                                          <p style="margin:0;text-align:left;font-size:12px">Email = <i>'.$email.'</i></p>
                                          <br>
                                          <p style="margin:0;text-align:left;">He/She needs help with : </p>
                                          <br>
                                          <p style="margin:0;text-align:left;">'.$msg.'</p>
                                          <br>
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
?>