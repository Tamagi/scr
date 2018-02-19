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
        $queryde="DELETE FROM user WHERE user_id = '$id'";
        $result= mysqli_query($connection, $queryde) or die("Invalid query");
        header("Refresh:0");
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
    <title>User Management - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-user-management">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> User Management </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-management-content-container">
            <div class="user-management-content-box">
                <div class="management-content-header">
                    <img src="img/User-Icon.png">
                    <p class="management-content-header-title">user</p>
                    <p class="management-content-header-subtitle">management</p>
                    <div class="management-content-sort-container">
                        <div class="management-content-sort">
                            <span>Sort by</span>
                            <select id="sort" name="sort">
                                <option value="">Choose One</option>
                                <option value="name" <?php if(isset($_GET['sort'])){if($_GET['sort']=="name"){ echo"selected"; }else{} } ?>>Name</option>
                                <option value="city" <?php if(isset($_GET['sort'])){if($_GET['sort']=="city"){ echo"selected"; }else{} } ?>>City</option>
                            </select>
                        </div>
                    </div>
                    <div class="management-content-search-container">
                        <?php if(isset($_GET['sort'])){?>
                        <div class="management-content-search-panel">
                            <form action="user_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="text" name="sort" value="<?php echo $_GET['sort'];?>" style="display:none;">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } else{?>
                        <div class="management-content-search-panel">
                            <form action="user_management.php" method="get" enctype="multipart/form-data">
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
                <div class="user-management-content-table">
                    <table class="user-management-table-1"border="0 ">
                        <tr style="height:40px;">
                            <th style="width:50px;"></th>
                            <th>image</th>
                            <th>full name</th>
                            <th>email</th>
                            <th>city</th>
                            <th>birthdate</th>
                            <th>phone</th>
                            <th style="width:100px;"></th>
                        </tr>
                        <?php 
                       $cari = "";
                        $get_user="select * from user";
                        if(isset($_GET['src']) and isset($_GET['sort'])){
                            $get_user =$get_user." where $sort='$cari' order by $sort asc";
                        }
                        
                        if(isset($_GET['sort'])){
                            if($_GET['sort']==""){
                            $get_user = $get_user." order by name, city asc";
                            }else
                            {
                            $sort = $_GET['sort'];
                            $get_user =$get_user." order by $sort asc";
                            }
                        }
                        else if(isset($_GET['src']))
                        {				
                            $cari = $_GET['src'];
                            $get_user =$get_user." where city='$cari'";
                        }
                        else{
                            $get_user = $get_user." order by name, city asc";
                        }
                        $run_user=mysqli_query($connection,$get_user) or die(mysql_error());
                        while($user_baris=mysqli_fetch_array($run_user)){
                        
                        ?>
                        <tr>
                            <td style="background-color:white;"><input type="checkbox" class="table-checkbox"name="checkbox[]" value="<?php echo $user_baris['0']?>"></td>
                            <td style="width:85px"><img src="../img/profile/<?php echo $user_baris['user_image'];?>" width="60" height="60"></td>
                            
                            <td style="background-color:#F7F7F7;width:200px"><?php echo $user_baris['name']; ?> <?php echo $user_baris['lname']; ?></td>                           
                            <td style="width:250px;"><?php echo $user_baris['email']; ?></td>
                            
                            <td style="background-color:#F7F7F7;width:130px"><?php echo $user_baris['city']; ?></td>
                            
                            <td style="width:165px"><?php echo $user_baris['dayofbirth']; ?>-<?php echo $user_baris['monthofbirth']; ?>-<?php echo $user_baris['yearofbirth']; ?></td>
                            
                            <td style="background-color:#F7F7F7;width:170px;"><?php echo $user_baris['phone_number']; ?></td>
                            
                            <td style="background-color:white;">
                                <a href="user_management_detail.php?user=<?php echo $user_baris['user_id'];?>">edit</a>
                            </td>
                        </tr>
                        <tr><td colspan="8" style="background-color:white;height:3px;"> </td></tr>
                        <?php } 
					?>
                    </table>
                    <?php 
                    $get_user = "select count(*) from user where city='$cari'";
					$rs = mysqli_query($connection,$get_user);
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
    window.location = "user_management.php?src=<?php echo $_GET['src']; ?>&sort=" + $(this).val();
});
    <?php }else{?>
$('#sort').change(function() {
    window.location = "user_management.php?sort=" + $(this).val();
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