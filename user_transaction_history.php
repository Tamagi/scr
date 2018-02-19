<!DOCTYPE html>

<?php
include("backend/doform/connect.php");
session_start();
if(!isset($_SESSION['username']))
header("location:http://localhost/simetri/");
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
    <script src="http://localhost/simetri/libs/js/menu.js" type="text/javascript"></script>
    <title>Simetri Coffee - Best Ground Coffee In Indonesia</title>
<style>
    body{
        overflow: auto;
    }
    .login-full{
        position: fixed;    
    }
    .menu-content a{
        color: white;
    }
    .content-th-single-header .active{
        opacity: 1; 
    }
    </style>
</head>
<body>
    <div class="container-transaction-history">
        <?php 
            include("menus/headerblack.php");
            include("menus/fullmenu.php");
        ?>    
        <div class="content-transaction-history">
            <p class="homepage-th-title">transaction history</p>
            <div class="content-th-container">
                <div class="content-th-single">
                    <div class="content-th-single-header">
                        <p>sort by date</p>
                        <p <?php if(!isset($_GET['sort'])){?>class="active"<?php } ?>><a href="http://localhost/simetri/user_transaction_history" style="color:black;text-decoration:none;">newest order</a></p>
                        <p <?php if(isset($_GET['sort'])){?>class="active"<?php } ?>><a href="http://localhost/simetri/user_transaction_history.php?page=-1&sort=oldest" style="color:black;text-decoration:none;">oldest order</a></p>
                    </div>
                    <?php
                    $rec_limit = 4;
                     /* Get total number of records */
                     $sql = "SELECT count(id) FROM order_item";
                     $retval = mysqli_query($connection,$sql);
                     $row = mysqli_fetch_array($retval);
                     $rec_count = $row[0];

                     if( isset($_GET{'page'} ) ) {
                        $page = $_GET{'page'} + 1;
                        $offset = $rec_limit * $page ;
                     }else {
                        $page = 0;
                        $offset = 0;
                     }

                     $left_rec = $rec_count - ($page * $rec_limit);
                     $sql = "SELECT * FROM order_item LIMIT $offset,$rec_limit";

                     $retval = mysqli_query($connection,$sql);
                        /*-------sort------*/
                        $username=$_SESSION['username'];
                        if(isset($_GET['sort'])=="oldest"){
                        $get_history="select * from checkout where username='$username' order by created asc limit $offset,$rec_limit";
                        }
                        else{
                        $get_history="select * from checkout where username='$username' order by created desc limit $offset,$rec_limit";
                        }
                        $run_history=mysqli_query($connection,$get_history);
                        while($history_baris = mysqli_fetch_array($run_history)){
                            $invoice=$history_baris['invoice_complete'];
                            $invoice_number=$history_baris['invoice_number'];
                            $date =$history_baris['created'];
                            $statuscheckout=$history_baris['status'];
                            $timestamp= strtotime($date);
                            
                            $get_order="select * from order_item where username='$username' and invoice_number='$invoice_number' limit 1";
                            $run_order=mysqli_query($connection,$get_order);
                            while($order_baris=mysqli_fetch_array($run_order)){
                            $status=$order_baris['status'];
                            $count_history=mysqli_num_rows($run_history);
                                if($count_history==0){
                                    echo "no Transaction yet.";
                                }
                    ?>
                    <div class="content-th-single-container">
                        <div class="content-th-single-invc">
                            <a href="http://localhost/simetri/user_transaction_details/<?php echo $invoice_number;?>" style="color:black;text-decoration:none"><p><?php echo $invoice;?></p></a>
                            <p class="content-th-single-date"><?php echo date("l",$timestamp);?>, <?php echo date('d-m-Y',$timestamp); ?></p>
                        </div>
                        <div class="content-th-single-status">
                            <p><?php echo $statuscheckout; ?></p>
                        </div>
                        <div class="content-th-single-price">
                            <p><span class="content-th-single-price-r">RP </span><?php echo $history_baris['checkout_grandtotal'];?>,-</p></div>
                        <div class="content-th-single-button">
                            <?php
                                if($statuscheckout=="unpaid"){
                            ?>
                            <a href="http://localhost/simetri/confirmation/<?php echo $invoice_number; ?>">confirm</a>
                            <?php
                                }
                                else if($statuscheckout=="paid"){
                            ?>
                            <a href="http://localhost/simetri/user_transaction_details/<?php echo $invoice_number;?>">waiting<br>confirm</a>
                            <?php
                                }
                                else{
                                    echo "";
                                }
                            ?>
                        </div>
                    </div>
                        <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="content-th-page-container">
                <?php
                if( $page > 0 ) {
                    $last = $page-2;
                    if(isset($_GET['sort'])){
                    echo "<div class='content-th-page-prev'><a href = http://localhost/simetri/user_transaction_history.php?page=$last&sort=oldest><span class='glyphicon glyphicon-menu-left'></span></a></div>";
                    echo "<div class='content-th-page-next'><a href = http://localhost/simetri/user_transaction_history.php?page=$page&sort=oldest><span class='glyphicon glyphicon-menu-right'></span></a></div>";
                    }
                    else{
                    echo "<div class='content-th-page-prev'><a href = http://localhost/simetri/user_transaction_history.php?page=$last><span class='glyphicon glyphicon-menu-left'></span></a>
                    </div>";
                    echo "<div class='content-th-page-next'><a href = http://localhost/simetri/user_transaction_history.php?page=$page><span class='glyphicon glyphicon-menu-right'></span></a></div>";
                    }
                 }else if( $page == 0 ) {
                    if(isset($_GET['sort'])){
                    echo "<div class='content-th-page-next'><a href = http://localhost/simetri/user_transaction_history.php?page=$page&sort=oldest><span class='glyphicon glyphicon-menu-right'></span></a></div>";
                    }
                    else{
                    echo "<div class='content-th-page-next'><a href = http://localhost/simetri/user_transaction_history.php?page=$page><span class='glyphicon glyphicon-menu-right'></span></a></div>";
                    }
                 }else if( $left_rec < $rec_limit ) {
                    $last = $page - 2;
                    if(isset($_GET['sort'])){
                    echo "<div class='content-th-page-prev'><a href = http://localhost/simetri/user_transaction_history.php?page=$last&sort=oldest><span class='glyphicon glyphicon-menu-left'></span></a>
                    </div>";
                    }
                    else{
                    echo "<div class='content-th-page-prev'><a href = http://localhost/simetri/user_transaction_history.php?page=$last><span class='glyphicon glyphicon-menu-left'></span></a></div>";
                    }
                 }
                ?>
            </div>
        </div>
    </div>
<script>
    //menu left and menu bottom
    var side = document.getElementById('mySidenav');
    $('#menu-left-closer').click(function(){
        side.style.width="0%";
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
         function openNavbottom() {
        document.getElementById("mySidenav-bottom").style.height = "100%";
        document.getElementById("mySidenav-bottom").style.paddingTop = "60px";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }

    function closeNavbottom() {
        document.getElementById("mySidenav-bottom").style.height= "0";
        document.getElementById("mySidenav-bottom").style.paddingTop = "0px";
        document.body.style.backgroundColor = "white";
    }
    //end of menu
</script>
</body>
</html>