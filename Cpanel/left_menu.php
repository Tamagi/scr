<div class="menu-left-container">
    <div class="menu-left-content-container">
        <div class="menu-left-content-image-container">
            <img src="img/Logo-Putih.png">
        </div>
        <div class="menu-left-content-header">
            <p class="menu-left-content-title">
            hello&#46;
            </p>
            <p class="menu-left-content-welcome">Welcome to Creatheavity Panel</p>
            <?php if(isset($_SESSION['username'])&&isset($_SESSION['role'])){ ?>
            <p class="menu-left-content-user-text">
            — Simetri Coffee Roasters
            </p>
            <?php 
        }
        ?>
        </div>
        <?php if(isset($_SESSION['username'])&&isset($_SESSION['role'])){ ?>
        <div class="menu-left-content-panel">
            <p><a href="index.php">Admin Panel</a></p>
            <p><a>Account Settings</a></p>
            <p><a href="contactadmin.php">Help</a></p>
        </div>
        <p class="menu-left-logout"><a href="doform/doCpLogout.php">Logout</a></p>
        <?php 
        }
        ?>
        <div class="menu-left-content-footer">
            <a><p>Privacy</p></a>
            <p><a>Terms & Condition</a></p>
            <p style="margin-top:40px;">©<?php echo date("Y");?> COPYRIGHT CREATHEAVITY</p>
        </div>
    </div>
</div>