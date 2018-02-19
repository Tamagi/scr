<!DOCTYPE html>

<?php
include("doform/connect.php");
session_start();
include("doform/doCpSession.php");
if(!isset($_SESSION['role'])){
    header("location:../index.php");
}
if(!isset($_GET['event']))
    header("location:event_management.php");
$eventname=$_GET['event'];
$get_event=mysqli_query($connection,"select * from event where id='$eventname'");
$run_event=mysqli_fetch_assoc($get_event);
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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    
  <script>
tinymce.init({
  selector: '#area',
  menubar: false,
    height: 400,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});</script>
    
    <title>event Management Detail - Creatheavity panel.</title>
<style>
    .management-content-box-left{
        width: 400px;
    }
    .management-content-box-right{
        width: 800px;
    }
    .management-content-box-panel-right{
        width: auto;
    }
    .management-content-box-panel-right input[type=text]{
        width: 500px;
    }
    .management-content-box-panel-right input[type=date]{
        width: 500px;
    }
    .management-content-box-panel-right textarea{
        width: 500px;
        border: 2px solid black;
        height: 130px;
        padding: 10px;
    }
</style>
</head>
<body>
    <?php include("CpResponsive.php"); ?>
    <div class="container-event-management-detail">
        <?php include("left_menu.php");?>
        <div class="header-menu">
            <div class="header-container">
                <div class="header-left">
                    <div class="header-left-content">
                        <p><a href="index.php">Admin Panel</a> / <span><a href="event_management.php"> event Management  </a></span></p>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-right-content">
                        <p><a href="index.php" style="color:black; text-decoration:none;">back to admin panel</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-management-detail-content-container">
            <div class="event-management-detail-content-box">
                <div class="management-content-header">
                    <img src="img/Event-Icon.png">
                    <p class="management-content-header-title">event</p>
                    <p class="management-content-header-subtitle">management</p>
                </div>
                <label class="login-error"style="color:red">
                        <?php if(isset($_REQUEST['errors']))
                        {
                            echo $_REQUEST['errors'];
                        }
                        ?>
                    </label>
                    <label class="login-success"style="color:green">
                        <?php 
                            if(isset($_REQUEST['success']))
                                {
                                    echo $_REQUEST['success'];
                                }
                        ?>
                    </label>
                <form action="doform/doCpEditEvent.php?event=<?php echo $eventname; ?>" method="post" enctype="multipart/form-data">
                <div class="management-content-box-split">
                    <div class="management-content-box-left">
                        <div class="management-content-box-title">
                            <p>Upload <br>Image.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left" style="width:auto">
                                    <div class="management-content-box-panel-right">
                                    <div class="management-content-box-image-split">
                                        <div class="management-content-box-image-left">
                                            <div class="management-content-box-image-container" id="uploadForm">
                                                <img src="../img/event-image/<?php echo $run_event['event_image'];?>" class="edite">
                                            </div> 
                                        </div>
                                        <div class="management-content-box-image-right">
                                            <div class="management-content-box-image-button">
                                                <p>Upload Image</p>
                                                <input type="file" name="image" id="file" accept="image/jpeg,.jpeg,.jpg" class="confirmation-image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="management-content-box-image-big">
                                        <div class="management-content-box-image-big-container" id="uploadForm">
                                            <img src="img/Upload-Image.jpg">
                                        </div> 
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="management-content-box-right">
                        <div class="management-content-box-title">
                            <p>Basic <br>Info.</p>
                        </div>
                        <div class="management-content-box-panel">
                            <div class="management-content-box-panel-split">
                                <div class="management-content-box-panel-left" style="width:30%">
                                    <p>event Date</p>
                                    <p>event name</p>
                                    <p style="margin-bottom:130px;">details</p>
                                    <p>first letter</p>
                                    <p>content</p>
                                </div>
                                <div class="management-content-box-panel-right" style="width:70%">
                                    <input type="date" name="date" value="<?php echo $run_event['event_date'];?>">
                                    <input type="text" name="aname" value="<?php echo $run_event['event_name'];?>" palceholder="event Name">
                                    <textarea name="details" placeholder="Details (max 165 characters)"maxlength="165"><?php echo $run_event['event_detail'];?></textarea>
                                    <input type="text" name="fl" value="<?php echo $run_event['first_letter'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="management-content-box-bottom">
                        <textarea id="area" name="contents"><?php echo $run_event['event_content']; ?></textarea>
                    </div>
                    <div class="management-content-box-footer">
                        <input type="submit" name="save" value="save">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#uploadForm img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function(){
        readURL(this);
    });
</script>
</body>
</html>