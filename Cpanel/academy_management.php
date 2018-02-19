<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");

if(!isset($_SESSION['role'])){
    header("location:../index.php");
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
    <title>Academy Management - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-academy-management">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> academy Management </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="academy-management-content-container">
            <div class="academy-management-content-box">
                <div class="management-content-header">
                    <img src="img/Academy-Icon.png">
                    <p class="management-content-header-title">academy</p>
                    <p class="management-content-header-subtitle">management</p>
                    <div class="management-content-sort-container">
                        <div class="management-content-sort">
                            <span>Sort by</span>
                            <select id="sort" name="sort">
                                <option value="">Choose One</option>
                                <option value="academy_time" <?php if(isset($_GET['sort'])){if($_GET['sort']=="academy_time"){ echo"selected"; }else{} } ?>>Date</option>
                                <option value="academy_price" <?php if(isset($_GET['sort'])){if($_GET['sort']=="academy_price"){ echo"selected"; }else{} } ?>>Price</option>
                                <option value="academy_name" <?php if(isset($_GET['sort'])){if($_GET['sort']=="academy_name"){ echo"selected"; }else{} } ?>>Name</option>
                                <option value="academy_stock" <?php if(isset($_GET['sort'])){if($_GET['sort']=="academy_stock"){ echo"selected"; }else{} } ?>>Capacity</option>
                            </select>
                        </div>
                    </div>
                    <div class="management-content-search-container">
                        <?php if(isset($_GET['sort'])){?>
                        <div class="management-content-search-panel">
                            <form action="academy_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="text" name="sort" value="<?php echo $_GET['sort'];?>" style="display:none;">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } else{?>
                        <div class="management-content-search-panel">
                            <form action="academy_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <a href="academy_management_addnew.php" style="color:#4CCC86;text-decoration:none;"><div class="management-content-button add-new" style="right:170px;">
                   add new
                </div></a>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if($_SESSION['role']=="superadmin" or $_SESSION['role']=="admin"){ ?>
                <div class="management-content-button">
                    <input type="submit" name="delete" value="delete selected" class="deleted" disabled>
                </div>
                    <?php } ?>
                <div class="academy-management-content-table">
                    <table class="academy-management-table-1"border="0 ">
                        <tr style="height:40px;">
                            <th style="width:50px;"></th>
                            <th>date</th>
                            <th>academy name</th>
                            <th>time</th>
                            <th>price</th>
                            <th>capacity</th>
                            <th style="width:100px;"></th>
                        </tr>
                        <?php 
                       $cari = "";
                        $get_academy="select * from academy";
                        if(isset($_GET['src']) and isset($_GET['sort'])){
                            $cari = $_GET['src'];
                            $sort = $_GET['sort'];
                            $get_academy =$get_academy." where $sort like '%$cari%' order by $sort asc";
                        }
                        else if(isset($_GET['sort'])){
                            $sort = $_GET['sort'];
                            if($_GET['sort']==""){
                                $get_academy = $get_academy." order by academy_time asc";
                            }
                            else{
                            $get_academy =$get_academy." order by $sort asc";
                            }
                        }
                        else if(isset($_GET['src']))
                        {				
                            $cari = $_GET['src'];
                            $get_academy =$get_academy." where academy_name like '%$cari%'";
                        }
                        else{
                            $get_academy = $get_academy." order by academy_time asc";
                        }
                        $run_academy=mysqli_query($connection,$get_academy) or die(mysql_error());
                        $brew_show = mysqli_query($connection,"select * from brew_type"); while($academy_baris=mysqli_fetch_array($run_academy)){
                        
                        ?>
                        <tr>
                            <td style="background-color:white;"><input type="checkbox" class="table-checkbox"name="checkbox[]" value="<?php echo $academy_baris['academy_id']?>"></td>
                            
                            <td style="width:200px">
                            <?php echo $academy_baris['academy_time'];
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:250px"><?php echo $academy_baris['academy_name']; ?></td>                           
                            <td style="width:200px;">
                            <?php 
                            echo $academy_baris['time_start'];
                            echo " - ";
                            echo $academy_baris['time_end'];
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:200px">idr <?php echo number_format($academy_baris['academy_price'],"0",",",".");?></td>
                            
                            <td style="width:200px">
                                <?php 
                                    if($academy_baris['academy_stock']== 0){
                                        echo "Out of stock";
                                    }
                                    else if($academy_baris['academy_stock']== 1){
                                        echo $academy_baris['academy_stock']." Person"; 
                                    }
                                    else{
                                        echo $academy_baris['academy_stock']." Persons"; 
                                    }
                                ?> 
                                
                            </td>
                            
                            <td style="background-color:white;">
                                <a href="academy_management_detail.php?academy=<?php echo $academy_baris['academy_id'];?>">edit</a>
                            </td>
                        </tr>
                        <tr><td colspan="8" style="background-color:white;height:3px;"> </td></tr>
                        <?php } 
					?>
                    </table>
                    <?php 
                    $get_academy = "select count(*) from academy where academy_name like '%$cari%'";
					$rs = mysqli_query($connection,$get_academy);
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
    window.location = "academy_management.php?src=<?php echo $_GET['src']; ?>&sort=" + $(this).val();
});
    <?php }else{?>
$('#sort').change(function() {
    window.location = "academy_management.php?sort=" + $(this).val();
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
<?php
if(isset($_POST['delete'])){
$delete = $_POST['checkbox'];
    if(isset($delete)){
        foreach ($delete as $id) {
        $queryde="DELETE FROM academy WHERE academy_id = '$id'";
        $result= mysqli_query($connection, $queryde);
        header("Refresh:0");
        }
    }
}
?>