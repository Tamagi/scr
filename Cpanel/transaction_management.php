<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(isset($_POST['delete'])){
    $delete = $_POST['checkbox'];
        if(isset($delete)){
            foreach ($delete as $id) {
            $queryde="DELETE FROM products WHERE id = '$id'";
            $result= mysqli_query($connection, $queryde) or die("Invalid query");
            header("location:transaction_management.php");
            }
        }
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
    <title>transaction Management - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-transaction-management">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> transaction Management </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-management-content-container">
            <div class="transaction-management-content-box">
                <div class="management-content-header">
                    <img src="img/Transcation-Icon.png">
                    <p class="management-content-header-title">transaction</p>
                    <p class="management-content-header-subtitle">management</p>
                    <div class="management-content-sort-container">
                        <label class="login-success" style="color:green">
                        <?php 
                            if(isset($_REQUEST['success']))
                                {
                                    echo $_REQUEST['success'];
                                }
                        ?>
                    </label>
                        <div class="management-content-sort">
                            <span>Sort by</span>
                            <select id="sort" name="sort">
                                <option value="">Choose One</option>
                                <option value="invoice_complete" <?php if(isset($_GET['sort'])){if($_GET['sort']=="invoice_complete"){ echo"selected"; }else{} }?>>Invoice</option>
                                <option value="username" <?php if(isset($_GET['sort'])){if($_GET['sort']=="username"){ echo"selected"; }else{} } ?>>Username</option>
                                <option value="status" <?php if(isset($_GET['sort'])){if($_GET['sort']=="status"){ echo"selected"; }else{} } ?>>Status</option>
                            </select>
                        </div>
                    </div>
                    <div class="management-content-search-container">
                        <?php if(isset($_GET['sort'])){?>
                        <div class="management-content-search-panel">
                            <form action="transaction_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="text" name="sort" value="<?php echo $_GET['sort'];?>" style="display:none;">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } else{?>
                        <div class="management-content-search-panel">
                            <form action="transaction_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if($_SESSION['role']=="superadmin"){ ?>
                <div class="management-content-button">
                    <input type="submit" name="delete" value="delete selected" class="deleted" disabled>
                </div>
                    <?php } ?>
                <div class="transaction-management-content-table">
                    <table class="transaction-management-table-1"border="0 ">
                        <tr style="height:40px;">
                            <th style="width:50px;"></th>
                            <th>invoice number</th>
                            <th>username</th>
                            <th>bank</th>
                            <th>grandtotal</th>
                            <th>status</th>
                            <th style="width:100px;"></th>
                        </tr>
                        <?php 
                       $cari = "";
                        $get_transaction="select * from checkout";
                        if(isset($_GET['src']) and isset($_GET['sort'])){
                            $cari = $_GET['src'];
                            $sort = $_GET['sort'];
                            $get_transaction =$get_transaction." where $sort like '%$cari%' order by $sort desc";
                        }
                        else if(isset($_GET['sort'])){
                            if($_GET['sort']==""){
                            $get_transaction = $get_transaction." order by status desc";
                            }else
                            {
                            $sort = $_GET['sort'];
                            $get_transaction =$get_transaction." order by $sort desc";
                            }
                        }
                        else if(isset($_GET['src']))
                        {				
                            $cari = $_GET['src'];
                            $get_transaction =$get_transaction." where invoice_complete like '%$cari%'";
                        }
                        else{
                            $get_transaction =$get_transaction." order by status desc, invoice_number asc";
                        }
                        $run_transaction=mysqli_query($connection,$get_transaction) or die(mysql_error());
                        while($transaction_baris=mysqli_fetch_array($run_transaction)){
                        
                        ?>
                        <tr><?php if($_SESSION['role']=="superadmin"){ ?>
                            <td style="background-color:white;"><input type="checkbox" class="table-checkbox"name="checkbox[]" value="<?php echo $transaction_baris['0']?>"></td>
                            <?php } 
                            else{
                            ?>
                            <td style="background-color:white;"></td>
                            <?php } ?>
                            <td style="width:260px">
                            <?php echo $transaction_baris['invoice_complete']; ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:200px"><?php echo $transaction_baris['username']; ?></td>                           
                            <td style="width:150px;">
                            <?php echo $transaction_baris['bank_id'];
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:220px">idr <?php echo number_format($transaction_baris['checkout_grandtotal'],"0",",",".");?></td>
                            
                            <td style="width:180px">
                                <?php 
                                    echo $transaction_baris['status'];
                                ?> 
                                
                            </td>
                            
                            <td style="background-color:white;">
                                <a href="transaction_management_detail.php?transaction=<?php echo $transaction_baris['checkout_id'];?>">edit</a>
                            </td>
                        </tr>
                        <tr><td colspan="8" style="background-color:white;height:3px;"> </td></tr>
                        <?php } 
					?>
                    </table>
                    <?php 
                    $get_transaction = "select count(*) from checkout where status='$cari'";
					$rs = mysqli_query($connection,$get_transaction);
					$data = mysqli_fetch_array($rs);
                    ?>
                </div>
                </form>
            </div>
            <p style="margin-top:40px;margin-bottom:40px;opacity:0;height:10px;"> </p>
        </div>
    </div>
<script>
    <?php if(isset($_GET['src'])){?>
$('#sort').change(function() {
    window.location = "transaction_management.php?src=<?php echo $_GET['src']; ?>&sort=" + $(this).val();
});
    <?php }else{?>
$('#sort').change(function() {
    window.location = "transaction_management.php?sort=" + $(this).val();
});
    <?php }?>
$('.table-checkbox').on('change',function(e) {
   if ($(this).prop('checked')) {
        $('.deleted').css('opacity', '1');
        $('.deleted').removeAttr("disabled");
    } else {
        $('.deleted').css('opacity', '0.5');
        $('.deleted').attr("disabled","disabled");
    };
});
</script>
</body>
</html>