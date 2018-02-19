<?php
session_start();
session_destroy();
header("Location:../cpanel_login.php");
?>