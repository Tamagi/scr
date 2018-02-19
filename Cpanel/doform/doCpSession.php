<?php
if(isset($_SESSION['username'])){
    if((time() - $_SESSION['last_login_timestamp']) > 900)
    {
        header("location:doform/doCpLogout.php");
    }
    else{
        $_SESSION['last_login_timestamp'] = time();
    }
}
else{
    header("location:cpanel_login.php");
}
?>