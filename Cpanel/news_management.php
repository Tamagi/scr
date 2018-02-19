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
        $queryde="DELETE FROM news WHERE id = '$id'";
        $result= mysqli_query($connection, $queryde) or die("Invalid query");
        header("location:news_management.php?success=Delete success");
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
    <title>news Management - Creatheavity panel.</title>
<style>
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-news-management">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span> News Management </span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-management-content-container">
            <div class="news-management-content-box">
                <div class="management-content-header">
                    <img src="img/Academy-Icon.png">
                    <p class="management-content-header-title">news</p>
                    <p class="management-content-header-subtitle">management</p>
                    <div class="management-content-sort-container">
                        <div class="management-content-sort">
                            <span>Sort by</span>
                            <select id="sort" name="sort">
                                <option value="">Choose One</option>
                                <option value="news_date" <?php if(isset($_GET['sort'])){if($_GET['sort']=="news_date"){ echo"selected"; }else{} }?>>Date</option>
                                <option value="news_title" <?php if(isset($_GET['sort'])){if($_GET['sort']=="news_title"){ echo"selected"; }else{} } ?>>Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="management-content-search-container">
                        <?php if(isset($_GET['sort'])){?>
                        <div class="management-content-search-panel">
                            <form action="news_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="text" name="sort" value="<?php echo $_GET['sort'];?>" style="display:none;">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } else{?>
                        <div class="management-content-search-panel">
                            <form action="news_management.php" method="get" enctype="multipart/form-data">
                            <span>search</span>
                            <input type="text" name="src">
                            <input type="submit" value="src">
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <a href="news_management_addnew.php" style="color:#4CCC86;text-decoration:none;"><div class="management-content-button add-new" style="right:170px;">
                   add new
                </div></a>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if($_SESSION['role']=="superadmin" or $_SESSION['role']=="admin"){ ?>
                <div class="management-content-button">
                    <input type="submit" name="delete" value="delete selected" class="deleted" disabled onclick="return confirm('Are you sure you want to delete this item?');">
                </div>
                    <?php } ?>
                <div class="news-management-content-table">
                    <table class="news-management-table-1"border="0 ">
                        <tr style="height:40px;">
                            <th style="width:50px;"></th>
                            <th>news date</th>
                            <th>news name</th>
                            <th style="width:100px;"></th>
                        </tr>
                        <?php 
                       $cari = "";
                        $get_news="select * from news";
                        if(isset($_GET['src']) and isset($_GET['sort'])){
                            $cari = $_GET['src'];
                            $sort = $_GET['sort'];
                            $get_news =$get_news." where $sort like '%$cari%' order by $sort asc";
                        }
                        else if(isset($_GET['sort'])){
                            if($_GET['sort']==""){
                            $get_news = $get_news." order by news_date asc";
                            }else
                            {
                            $sort = $_GET['sort'];
                            $get_news =$get_news." order by $sort asc";
                            }
                        }
                        else if(isset($_GET['src']))
                        {				
                            $cari = $_GET['src'];
                            $get_news =$get_news." where news_title like '%$cari%'";
                        }
                        else{
                            $get_news = $get_news." order by news_date asc";
                        }
                        $run_news=mysqli_query($connection,$get_news) or die(mysql_error());
                        $brew_show = mysqli_query($connection,"select * from brew_type"); 
                        while($news_baris=mysqli_fetch_array($run_news)){
                        
                        ?>
                        <tr>
                            <td style="background-color:white;"><input type="checkbox" class="table-checkbox"name="checkbox[]" value="<?php echo $news_baris['0']?>"></td>
                            
                            <td style="width:200px">
                            <?php echo $news_baris['news_date'];
                            ?>
                            </td>
                            
                            <td style="background-color:#F7F7F7;width:450px"><?php echo $news_baris['news_title']; ?></td>                           
                            <td style="background-color:white;">
                                <a href="news_management_detail.php?news=<?php echo $news_baris['id'];?>">edit</a>
                            </td>
                        </tr>
                        <tr><td colspan="8" style="background-color:white;height:3px;"> </td></tr>
                        <?php } 
					?>
                    </table>
                    <?php 
                    $get_news = "select count(*) from news where news_title like '%$cari%'";
					$rs = mysqli_query($connection,$get_news);
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
    window.location = "news_management.php?src=<?php echo $_GET['src']; ?>&sort=" + $(this).val();
});
    <?php }else{?>
$('#sort').change(function() {
    window.location = "news_management.php?sort=" + $(this).val();
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