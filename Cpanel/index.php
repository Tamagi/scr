<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:cpanel_login.php");
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
    <title>Login Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-index">
        <?php include("left_menu.php");?>
        <div class="index-content-container">
            <div class="index-content-box-container">
                <a href="shop_management.php"><div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="57.4px" height="47.8px" viewBox="0 0 57.4 47.8" style="enable-background:new 0 0 57.4 47.8;"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <g id="XMLID_2_">
                                    <g id="XMLID_3_">
                                        <path id="XMLID_9_" d="M57.4,20.7v-2.7c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0,0,0-0.1,0-0.1c0,0,0,0,0,0
                                            c0,0,0-0.1,0-0.1c0,0,0,0,0,0L51.9,5.7V1.2c0-0.7-0.5-1.2-1.2-1.2h-44C6,0,5.5,0.5,5.5,1.2v4.5L0.1,17.4c0,0,0,0,0,0
                                            c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,0,0,0.1,0,0.1v2.7c0,3.3,2.4,6,5.5,6.6
                                            v18.2H1.2C0.5,45.4,0,46,0,46.6c0,0.7,0.5,1.2,1.2,1.2h5.5h4.8H21h29.6h5.5c0.7,0,1.2-0.5,1.2-1.2c0-0.7-0.5-1.2-1.2-1.2h-4.3
                                            V27.3C55,26.7,57.4,24,57.4,20.7z M54.3,16.7h-8.2l-2.6-9.6h6.5L54.3,16.7z M35.4,17.8l-1-10.6H41l2.6,9.6h-4.5
                                            c-0.7,0-1.2,0.5-1.2,1.2c0,0.7,0.5,1.2,1.2,1.2H44v1.6c0,2.4-1.9,4.3-4.3,4.3s-4.3-1.9-4.3-4.3v-2.7
                                            C35.4,17.9,35.4,17.9,35.4,17.8z M7.9,2.4h41.6v2.4H7.9V2.4z M28.8,16.7h-4.3l0.9-9.6H32L33,18v2.7c0,2.4-1.9,4.3-4.3,4.3
                                            s-4.3-1.9-4.3-4.3v-1.6h4.5c0.7,0,1.2-0.5,1.2-1.2C30,17.3,29.5,16.7,28.8,16.7z M21.2,19.1H22v1.6c0,2.4-1.9,4.3-4.3,4.3
                                            s-4.3-1.9-4.3-4.3v-2.6l3-10.9H23l-0.9,9.6h-0.9c-0.7,0-1.2,0.5-1.2,1.2C20,18.6,20.6,19.1,21.2,19.1z M2.4,20.7v-1.6h3.2
                                            c0.7,0,1.2-0.5,1.2-1.2c0-0.7-0.5-1.2-1.2-1.2H3.1l4.4-9.6h6.5L11,17.6c0,0.1,0,0.2,0,0.3v2.7C11,23,9.1,25,6.7,25
                                            C4.3,25,2.4,23,2.4,20.7z M19.8,37.6h-1.2c-0.7,0-1.2,0.5-1.2,1.2c0,0.7,0.5,1.2,1.2,1.2h1.2v5.4h-7.2V32.3h7.2V37.6z M49.5,45.4
                                            H22.2V31.1c0-0.7-0.5-1.2-1.2-1.2h-9.6c-0.7,0-1.2,0.5-1.2,1.2v14.3H7.9V27.3c1.8-0.3,3.3-1.3,4.3-2.8c1.2,1.7,3.2,2.9,5.5,2.9
                                            s4.3-1.1,5.5-2.9c1.2,1.7,3.2,2.9,5.5,2.9s4.3-1.1,5.5-2.9c1.2,1.7,3.2,2.9,5.5,2.9s4.3-1.1,5.5-2.9c1,1.4,2.5,2.5,4.3,2.8V45.4z
                                             M50.7,25c-2.4,0-4.3-1.9-4.3-4.3v-1.6H55v1.6C55,23,53,25,50.7,25z"/>
                                        <path id="XMLID_5_" d="M45.9,29.9H25.8c-0.7,0-1.2,0.5-1.2,1.2v10.8c0,0.7,0.5,1.2,1.2,1.2h20.1c0.7,0,1.2-0.5,1.2-1.2V31.1
                                            c0,0,0-0.1,0-0.1c0,0,0,0,0,0c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0,0,0,0,0-0.1c0,0,0,0,0,0c0,0,0,0,0-0.1
                                            c0,0,0,0,0,0c0,0,0,0,0-0.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0-0.1-0.1-0.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0-0.1-0.1c0,0,0,0,0,0
                                            c0,0,0,0,0,0c0,0,0,0-0.1,0c0,0,0,0,0,0c0,0,0,0-0.1,0c0,0,0,0-0.1,0c0,0,0,0-0.1,0c0,0,0,0-0.1,0c0,0,0,0-0.1,0c0,0,0,0-0.1,0
                                            c0,0,0,0-0.1,0c0,0,0,0-0.1,0C46,29.9,45.9,29.9,45.9,29.9z M27,40.6v-8.4h0h9.2l-0.5,0.5c-0.5,0.5-0.5,1.2,0,1.7
                                            c0.2,0.2,0.5,0.4,0.8,0.4c0.3,0,0.6-0.1,0.8-0.4l2.2-2.2H43l-8.4,8.4H27z M44.7,40.6H38l6.7-6.7V40.6z"/>
                                        <path id="XMLID_4_" d="M33,35.6l-0.5,0.5c-0.5,0.5-0.5,1.2,0,1.7c0.2,0.2,0.5,0.4,0.8,0.4c0.3,0,0.6-0.1,0.8-0.4l0.5-0.5
                                            c0.5-0.5,0.5-1.2,0-1.7C34.2,35.1,33.4,35.1,33,35.6z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <p class="index-single-box-title">Shop</p>
                            <p class="index-single-box-subtitle">management</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="event_management.php"><div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="49.1px" height="49.1px" viewBox="0 0 49.1 49.1" style="enable-background:new 0 0 49.1 49.1;"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <g id="XMLID_2_">
                                    <g id="XMLID_3_">
                                        <path id="XMLID_31_" d="M44,4.1h-4.1v-1c0-1.7-1.4-3.1-3.1-3.1c-1.7,0-3.1,1.4-3.1,3.1v1H15.3v-1C15.3,1.4,14,0,12.3,0
                                            c-1.7,0-3.1,1.4-3.1,3.1v1H5.1C2.3,4.1,0,6.4,0,9.2v38.9c0,0.6,0.5,1,1,1h47c0.6,0,1-0.5,1-1V9.2C49.1,6.4,46.8,4.1,44,4.1z
                                             M35.8,3.1c0-0.6,0.5-1,1-1c0.6,0,1,0.5,1,1v4.1c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1V3.1z M11.2,3.1c0-0.6,0.5-1,1-1s1,0.5,1,1v4.1
                                            c0,0.6-0.5,1-1,1h0c-0.6,0-1-0.5-1-1L11.2,3.1z M47,47H2V14.3h38.6c0.6,0,1-0.5,1-1c0-0.6-0.5-1-1-1H2V9.2c0-1.7,1.4-3.1,3.1-3.1
                                            h4.1v1c0,1.7,1.4,3.1,3.1,3.1s3.1-1.4,3.1-3.1v-1h18.4v1c0,1.7,1.4,3.1,3.1,3.1c1.7,0,3.1-1.4,3.1-3.1v-1H44
                                            c1.7,0,3.1,1.4,3.1,3.1L47,47L47,47z"/>
                                        <path id="XMLID_30_" d="M44.5,12.3h-0.6c-0.6,0-1,0.5-1,1s0.5,1,1,1h0.6c0.6,0,1-0.5,1-1S45,12.3,44.5,12.3z"/>
                                        <path id="XMLID_5_" d="M42.9,17.4H6.1c-0.6,0-1,0.5-1,1v18.4c0,0.6,0.5,1,1,1h5.1v4.1H9.7c-0.6,0-1,0.5-1,1c0,0.6,0.5,1,1,1h33.2
                                            c0.6,0,1-0.5,1-1V18.4C44,17.8,43.5,17.4,42.9,17.4z M25.6,19.4h4.1v4.1h-4.1V19.4z M25.6,31.7h4.1v4.1h-4.1V31.7z M11.2,35.8
                                            H7.2v-4.1h4.1V35.8z M11.2,29.7H7.2v-4.1h4.1V29.7z M11.2,23.5H7.2v-4.1h4.1V23.5z M17.4,41.9h-4.1v-4.1h4.1L17.4,41.9L17.4,41.9
                                            z M17.4,35.8h-4.1v-4.1h4.1L17.4,35.8L17.4,35.8z M17.4,29.7h-4.1v-4.1h4.1L17.4,29.7L17.4,29.7z M17.4,23.5h-4.1v-4.1h4.1
                                            L17.4,23.5L17.4,23.5z M23.5,41.9h-4.1v-4.1h4.1V41.9z M23.5,35.8h-4.1v-4.1h4.1V35.8z M23.5,29.7h-4.1v-4.1h4.1V29.7z
                                             M23.5,23.5h-4.1v-4.1h4.1V23.5z M29.7,41.9h-4.1v-4.1h4.1V41.9z M29.7,29.7h-4.1v-4.1h4.1V29.7z M35.8,41.9h-4.1v-4.1h4.1V41.9z
                                             M35.8,35.8h-4.1v-4.1h4.1V35.8z M35.8,29.7h-4.1v-4.1h4.1V29.7z M35.8,23.5h-4.1v-4.1h4.1V23.5z M41.9,41.9h-4.1v-4.1h4.1V41.9z
                                             M41.9,35.8h-4.1v-4.1h4.1V35.8z M41.9,29.7h-4.1v-4.1h4.1V29.7z M41.9,23.5L41.9,23.5h-4.1v-4.1h4.1V23.5z"/>
                                        <path id="XMLID_4_" d="M6.6,41.9H6.1c-0.6,0-1,0.5-1,1s0.5,1,1,1h0.4c0.6,0,1-0.5,1-1S7.1,41.9,6.6,41.9z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <p class="index-single-box-title">Event</p>
                            <p class="index-single-box-subtitle">management</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="news_management.php"><div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="45px" height="54px" viewBox="0 0 45 54" style="enable-background:new 0 0 45 54;" xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <g id="XMLID_2_">
                                    <g id="XMLID_3_">
                                        <path id="XMLID_11_" d="M6.5,9.3H5.8c-0.6,0-1.1,0.5-1.1,1.1c0,0.6,0.5,1.1,1.1,1.1h0.7c0.6,0,1.1-0.5,1.1-1.1S7.1,9.3,6.5,9.3z"
                                            />
                                        <path id="XMLID_6_" d="M45,29.7V10.5c0,0,0,0,0,0V1.1C45,0.5,44.5,0,43.9,0H1.1C0.5,0,0,0.5,0,1.1v9.3v19.3
                                            c0,0.6,0.5,1.1,1.1,1.1h6L1.4,51.8H1.1c-0.6,0-1.1,0.5-1.1,1.1C0,53.5,0.5,54,1.1,54h1.1h2.3h3.7c0.6,0,1.1-0.5,1.1-1.1
                                            c0-0.6-0.5-1.1-1.1-1.1H6.3l9.8-20.9h12.9l9.8,20.9l-4.5,0c-0.6,0-1.1,0.5-1.1,1.1c0,0.6,0.5,1.1,1.1,1.1l9.7,0
                                            c0.6,0,1.1-0.5,1.1-1.1c0-0.6-0.5-1.1-1.1-1.1h-0.3l-5.7-20.9h6C44.5,30.9,45,30.4,45,29.7z M3.8,51.8L3.8,51.8l5.6-20.9h4.1
                                            L3.8,51.8z M41.3,51.8L41.3,51.8l-9.9-20.9h4.1L41.3,51.8z M42.8,24.1h-5.4c-0.6,0-1.1,0.5-1.1,1.1s0.5,1.1,1.1,1.1h5.4v2.3h-6.3
                                            l0,0h-6.8H15.3H8.6H2.3V10.5V2.3h40.5v7.1l0,2.3L42.8,24.1L42.8,24.1z"/>
                                        <path id="XMLID_5_" d="M32.6,26.4h0.7c0.6,0,1.1-0.5,1.1-1.1c0-0.6-0.5-1.1-1.1-1.1h-0.7c-0.6,0-1.1,0.5-1.1,1.1
                                            C31.5,25.9,32,26.4,32.6,26.4z"/>
                                        <path id="XMLID_4_" d="M30.8,51.8h-0.6c-0.6,0-1.1,0.5-1.1,1.1c0,0.6,0.5,1.1,1.1,1.1h0.6c0.6,0,1.1-0.5,1.1-1.1
                                            C31.9,52.3,31.4,51.8,30.8,51.8z"/>
                                        <g>
                                            <path d="M15.2,18.7l-0.6-1.5h-3.7l-0.6,1.5H8.7l3.2-8.1h1.8l3.2,8.1H15.2z M12.7,12.1l-1.5,3.8h2.9L12.7,12.1z"/>
                                            <path d="M20.1,18.7v-8.1h4c1.5,0,2.3,0.9,2.3,2.1c0,1-0.7,1.7-1.4,1.9c0.9,0.1,1.6,1,1.6,2c0,1.2-0.8,2.2-2.3,2.2H20.1z
                                                 M24.9,12.9c0-0.6-0.4-1.1-1.1-1.1h-2.3V14h2.3C24.5,14,24.9,13.5,24.9,12.9z M25,16.3c0-0.6-0.4-1.1-1.2-1.1h-2.3v2.2h2.3
                                                C24.6,17.5,25,17,25,16.3z"/>
                                            <path d="M30,14.7c0-2.5,1.9-4.2,4.2-4.2c1.6,0,2.6,0.8,3.2,1.8l-1.2,0.6c-0.4-0.7-1.2-1.2-2-1.2c-1.6,0-2.8,1.2-2.8,2.9
                                                c0,1.7,1.2,2.9,2.8,2.9c0.9,0,1.6-0.5,2-1.2l1.2,0.6c-0.6,1-1.6,1.8-3.2,1.8C31.8,18.9,30,17.2,30,14.7z"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <p class="index-single-box-title">News</p>
                            <p class="index-single-box-subtitle">management</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="transaction_management.php">
                <div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="40.6px" height="48.7px" viewBox="0 0 40.6 48.7" style="enable-background:new 0 0 40.6 48.7;"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <g id="XMLID_2_">
                                    <g id="XMLID_3_">
                                        <path id="XMLID_22_" d="M39.6,0H1C0.5,0,0,0.5,0,1v46.7c0,0.6,0.5,1,1,1h38.5c0.6,0,1-0.5,1-1V1C40.6,0.5,40.1,0,39.6,0z
                                             M38.5,46.7H2V2h36.5V46.7z"/>
                                        <path id="XMLID_18_" d="M5.1,16.2h30.4c0.6,0,1-0.5,1-1V5.1c0-0.6-0.5-1-1-1H5.1c-0.6,0-1,0.5-1,1v10.1
                                            C4.1,15.8,4.5,16.2,5.1,16.2z M34.5,6.1v8.1H23l8.1-8.1L34.5,6.1z M6.1,6.1h16.5l-1.2,1.2c-0.4,0.4-0.4,1,0,1.4
                                            C21.5,9,21.8,9.1,22,9.1c0.3,0,0.5-0.1,0.7-0.3l2.7-2.7h2.9l-8.1,8.1H6.1V6.1z"/>
                                        <path id="XMLID_11_" d="M35.5,18.3H25.4H15.2H5.1c-0.6,0-1,0.5-1,1v12.2v12.2c0,0.6,0.5,1,1,1h10.1h10.1h10.1c0.6,0,1-0.5,1-1
                                            V19.3C36.5,18.7,36.1,18.3,35.5,18.3z M14.2,42.6H6.1V32.5h8.1V42.6z M14.2,30.4H6.1V20.3h8.1V30.4z M24.3,42.6h-8.1V32.5h8.1
                                            V42.6z M24.3,30.4h-8.1V20.3h8.1V30.4z M34.5,42.6h-8.1V20.3h8.1V42.6z"/>
                                        <path id="XMLID_10_" d="M8.1,26.4h1v1c0,0.6,0.5,1,1,1c0.6,0,1-0.5,1-1v-1h1c0.6,0,1-0.5,1-1c0-0.6-0.5-1-1-1h-1v-1
                                            c0-0.6-0.5-1-1-1s-1,0.5-1,1v1h-1c-0.6,0-1,0.5-1,1C7.1,25.9,7.6,26.4,8.1,26.4z"/>
                                        <path id="XMLID_9_" d="M18.3,26.4h4.1c0.6,0,1-0.5,1-1c0-0.6-0.5-1-1-1h-4.1c-0.6,0-1,0.5-1,1C17.2,25.9,17.7,26.4,18.3,26.4z"/>
                                        <path id="XMLID_8_" d="M18.9,37.5l-0.7,0.7c-0.4,0.4-0.4,1,0,1.4c0.2,0.2,0.5,0.3,0.7,0.3c0.3,0,0.5-0.1,0.7-0.3l0.7-0.7l0.7,0.7
                                            c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4l-0.7-0.7l0.7-0.7c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0
                                            l-0.7,0.7l-0.7-0.7c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4L18.9,37.5z"/>
                                        <path id="XMLID_7_" d="M8.7,40c0.3,0,0.5-0.1,0.7-0.3l2.9-2.9c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L8,38.2
                                            c-0.4,0.4-0.4,1,0,1.4C8.2,39.9,8.4,40,8.7,40z"/>
                                        <path id="XMLID_6_" d="M28.4,30.4h4.1c0.6,0,1-0.5,1-1c0-0.6-0.5-1-1-1h-4.1c-0.6,0-1,0.5-1,1C27.4,30,27.8,30.4,28.4,30.4z"/>
                                        <path id="XMLID_5_" d="M28.4,34.5h4.1c0.6,0,1-0.5,1-1c0-0.6-0.5-1-1-1h-4.1c-0.6,0-1,0.5-1,1C27.4,34,27.8,34.5,28.4,34.5z"/>
                                        <path id="XMLID_4_" d="M20.6,10.9c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0l-0.4,0.4c-0.4,0.4-0.4,1,0,1.4
                                            c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3L20.6,10.9z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <p class="index-single-box-title">transaction</p>
                            <p class="index-single-box-subtitle">management</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="user_management.php">
                <div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="53.8px" height="53.8px" viewBox="0 0 53.8 53.8" style="enable-background:new 0 0 53.8 53.8;"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <g id="XMLID_2_">
                                    <g id="XMLID_3_">
                                        <path id="XMLID_14_" d="M13.5,35.4C13,35,12.3,35,11.9,35.5c-0.2,0.2-0.3,0.4-0.5,0.6c-0.4,0.5-0.3,1.2,0.2,1.6
                                            c0.2,0.2,0.4,0.2,0.7,0.2c0.3,0,0.7-0.1,0.9-0.4c0.1-0.2,0.3-0.3,0.4-0.5C14,36.5,14,35.8,13.5,35.4z"/>
                                        <path id="XMLID_13_" d="M34.2,13.4c0.2,0.2,0.5,0.3,0.7,0.3c0.3,0,0.6-0.1,0.8-0.4c0.2-0.2,0.3-0.4,0.4-0.5
                                            c0.4-0.5,0.2-1.2-0.3-1.6c-0.5-0.4-1.2-0.2-1.6,0.3c-0.1,0.1-0.2,0.2-0.3,0.4C33.7,12.3,33.7,13,34.2,13.4z"/>
                                        <path id="XMLID_6_" d="M52.7,47.1h-1.7c-0.2-4.1-1.4-8.1-3.6-11.6c-2.1-3.4-5.1-6.2-8.5-8.2c0.1-0.4,0.3-0.8,0.4-1.3h2.3
                                            c2.1,0,3.8-1.7,3.8-3.8v-3.5c0-2.1-1.7-3.8-3.8-3.8h-0.4c0.1-1.5,0-3-0.3-4.2c-1-3.3-2.8-6-5.3-7.8C33,1,30.1,0,26.9,0
                                            c-3.2,0-6.1,1-8.6,2.8c-2.5,1.9-4.4,4.6-5.3,7.8c-0.4,1.2-0.4,2.6-0.3,4.2h-0.4c-2.1,0-3.8,1.7-3.8,3.8v3.5
                                            c0,2.1,1.7,3.8,3.8,3.8h2.3c0.1,0.5,0.3,0.9,0.4,1.3c-3.5,2-6.4,4.8-8.5,8.2C4.3,38.9,3,42.9,2.8,47.1H1.1
                                            c-0.6,0-1.1,0.5-1.1,1.1c0,0.6,0.5,1.1,1.1,1.1h2.8h7.3l1.1,3.7c0.1,0.5,0.6,0.8,1.1,0.8h22c0,0,0,0,0,0c0,0,0,0,0,0h4.8
                                            c0.5,0,0.9-0.3,1.1-0.8l1.1-3.7h7.3h2.8c0.6,0,1.1-0.5,1.1-1.1C53.8,47.6,53.3,47.1,52.7,47.1z M40,22.2c0.1-0.4,0.1-0.8,0.3-1.4
                                            c0.2-1.1,0.5-2.4,0.7-3.8h0.6v0c0.9,0,1.6,0.7,1.6,1.6v3.5c0,0.9-0.7,1.6-1.6,1.6h-1.8C39.8,23.3,39.9,22.7,40,22.2z M12.2,23.7
                                            L12.2,23.7c-0.9,0-1.6-0.7-1.6-1.6v-3.5c0-0.9,0.7-1.6,1.6-1.6h0.6c0.2,1.4,0.4,2.7,0.7,3.8c0.1,0.5,0.2,1,0.3,1.4
                                            c0.1,0.6,0.2,1.1,0.3,1.5H12.2z M14.9,14.7c-0.1-1.3,0-2.5,0.2-3.4c1.7-5.6,6.2-9.1,11.8-9.1c5.6,0,10.1,3.5,11.8,9.1
                                            c0.3,1.1,0.3,2.7,0.1,4.4c0,0.1,0,0.2,0,0.3c0,0,0,0,0,0c-0.2,1.6-0.5,3.2-0.7,4.5c-0.1,0.6-0.2,1-0.3,1.4
                                            c-0.2,0.9-0.3,1.7-0.5,2.4c-0.1,0.6,0,0.9-1.4,3.5c-0.5,0.7-1.2,1.1-2.2,1.7c-0.4,0.3-0.9,0.6-1.4,0.9c-1.8,1-3.6,1.6-5.4,1.6
                                            c-1.8,0-3.6-0.5-5.4-1.6c-0.5-0.4-1-0.7-1.4-0.9c-2-1.3-2.8-1.8-3.5-4.8c0-0.1,0-0.2-0.1-0.2c-0.2-0.7-0.3-1.6-0.5-2.7
                                            c-0.1-0.4-0.2-0.9-0.3-1.4c-0.2-1-0.4-2.2-0.6-3.5c2.1-0.3,6.5-1,9.4-2.5l0.7,1.8c0.1,0.2,0.1,0.3,0.2,0.5
                                            c0.2,0.6,0.5,1.2,1.2,1.5c0.2,0.1,0.3,0.1,0.5,0.1c0.4,0,0.8-0.1,1.4-0.3c0.2-0.1,0.3-0.1,0.5-0.2c0.8-0.3,2.3-1,3.8-2
                                            c0.5-0.3,0.7-1,0.3-1.6c-0.3-0.5-1-0.7-1.6-0.3c-1.4,0.9-2.7,1.6-3.3,1.7c-0.2,0.1-0.4,0.1-0.6,0.2c-0.1,0-0.2,0.1-0.2,0.1
                                            c-0.1-0.1-0.1-0.3-0.2-0.5l-1.2-2.9c-0.1-0.3-0.4-0.5-0.7-0.6c-0.3-0.1-0.7,0-0.9,0.1C22.1,13.5,17.1,14.4,14.9,14.7z M40.6,47.8
                                            C40.6,47.8,40.6,47.8,40.6,47.8l-1.1,3.7H37l0.5-1.7c0.2-0.6-0.2-1.2-0.8-1.4c-0.6-0.2-1.2,0.2-1.4,0.8l-0.6,2.3H14.3l-1.1-3.7
                                            c0,0,0,0,0,0l-1.6-5.3h2.5l0.6,2.3c0.1,0.5,0.6,0.8,1.1,0.8c0.1,0,0.2,0,0.3,0c0.6-0.2,1-0.8,0.8-1.4l-0.5-1.7h25.8L40.6,47.8z
                                             M43.2,47.1l1.6-5.3c0.1-0.3,0-0.7-0.2-1c-0.2-0.3-0.5-0.5-0.9-0.5H10.1c-0.4,0-0.7,0.2-0.9,0.5c-0.2,0.3-0.3,0.7-0.2,1l1.6,5.3
                                            H5.1c0.4-7.5,4.5-14.1,11-17.9c0.5,0.6,1.1,1.1,1.8,1.6c-1.1,0.6-2.1,1.2-3.1,2c-0.5,0.4-0.6,1.1-0.2,1.6
                                            c0.2,0.3,0.5,0.4,0.9,0.4c0.2,0,0.5-0.1,0.7-0.2c0.9-0.7,1.8-1.3,2.8-1.8l1-0.5c0.1,0,0.1,0.1,0.2,0.1l0.1,0
                                            c2.2,1.2,4.4,1.9,6.6,1.9h0c2.2,0,4.4-0.6,6.6-1.9l0.1,0c0.5-0.3,1-0.6,1.4-0.9c1.2-0.8,2.1-1.4,2.8-2.2
                                            c6.5,3.7,10.6,10.4,11,17.9L43.2,47.1L43.2,47.1z"/>
                                        <path id="XMLID_5_" d="M16.4,46.9c-0.6,0.2-1,0.8-0.8,1.4l0.1,0.5c0.1,0.5,0.6,0.8,1.1,0.8c0.1,0,0.2,0,0.3,0
                                            c0.6-0.2,1-0.8,0.8-1.4l-0.1-0.5C17.6,47.1,17,46.8,16.4,46.9z"/>
                                        <path id="XMLID_4_" d="M37,47.2c0.1,0,0.2,0,0.3,0c0.5,0,0.9-0.3,1.1-0.8l0.1-0.5c0.2-0.6-0.2-1.2-0.8-1.4
                                            c-0.6-0.2-1.2,0.2-1.4,0.8l-0.1,0.5C36,46.4,36.4,47,37,47.2z"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            <p class="index-single-box-title">user</p>
                            <p class="index-single-box-subtitle">management</p>
                        </div>
                    </div>
                </div>
                </a>
                <a href="contactadmin.php">
                <div class="index-content-single-box">
                    <div class="index-content-single-box-container">
                        <div class="index-content-single-box-isi">
                            <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In  -->
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="48.1px" height="48.1px" viewBox="0 0 48.1 48.1" style="enable-background:new 0 0 48.1 48.1;"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <g id="XMLID_1_">
                                <path id="XMLID_9_" d="M24.1,48.1c-6.4,0-12.5-2.5-17-7c-4.5-4.5-7-10.6-7-17S2.5,11.6,7,7c4.5-4.5,10.6-7,17-7
                                    c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1c-5.8,0-11.3,2.3-15.5,6.4c-8.5,8.5-8.5,22.4,0,30.9c4.1,4.1,9.6,6.4,15.5,6.4
                                    s11.3-2.3,15.5-6.4C48,31,48,17.1,39.5,8.6c-1.7-1.7-3.5-3-5.6-4c-0.3-0.1-0.5-0.4-0.6-0.6c-0.1-0.3-0.1-0.6,0.1-0.8
                                    c0.2-0.4,0.6-0.6,1-0.6c0.2,0,0.3,0,0.5,0.1c2.2,1.1,4.3,2.6,6.1,4.5c4.5,4.5,7,10.6,7,17s-2.5,12.5-7,17
                                    C36.5,45.6,30.5,48.1,24.1,48.1z"/>
                                <path id="XMLID_8_" d="M41,7.1c-1.8-1.8-3.9-3.3-6.1-4.4c-0.5-0.2-1.1,0-1.3,0.4c-0.2,0.5,0,1.1,0.4,1.3c2,1,3.9,2.4,5.6,4.1
                                    c8.6,8.6,8.6,22.5,0,31.1s-22.5,8.6-31.1,0s-8.6-22.5,0-31.1c4.2-4.2,9.7-6.4,15.5-6.4c0.5,0,1-0.4,1-1s-0.4-1-1-1
                                    c-6.4,0-12.4,2.5-16.9,7c-9.3,9.3-9.3,24.5,0,33.8c4.7,4.7,10.8,7,16.9,7s12.3-2.3,16.9-7C50.3,31.7,50.3,16.5,41,7.1z"/>
                                <path id="XMLID_7_" d="M24.1,39.7c-0.6,0-1.1-0.5-1.1-1.1v-29c0-0.6,0.5-1.1,1.1-1.1s1.1,0.5,1.1,1.1v29
                                    C25.2,39.2,24.7,39.7,24.1,39.7z"/>
                                <path id="XMLID_6_" d="M24.1,8.6c-0.5,0-1,0.4-1,1v29c0,0.5,0.4,1,1,1s1-0.4,1-1v-29C25,9,24.6,8.6,24.1,8.6z"/>
                                <path id="XMLID_5_" d="M27.9,25.2c-0.6,0-1.1-0.5-1.1-1.1s0.5-1.1,1.1-1.1h10.6c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1H27.9z"/>
                                <path id="XMLID_4_" d="M27.9,25h10.6c0.5,0,1-0.4,1-1s-0.4-1-1-1H27.9c-0.5,0-1,0.4-1,1S27.4,25,27.9,25z"/>
                                <path id="XMLID_3_" d="M9.5,25.2c-0.6,0-1.1-0.5-1.1-1.1S8.9,23,9.5,23h10.3c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1H9.5z"/>
                                <path id="XMLID_2_" d="M9.5,23.1c-0.5,0-1,0.4-1,1s0.4,1,1,1h10.3c0.5,0,1-0.4,1-1s-0.4-1-1-1H9.5z"/>
                            </g>
                            </svg>
                            <p class="index-single-box-title">add</p>
                            <p class="index-single-box-subtitle">more panel</p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
<script>
</script>
</body>
</html>