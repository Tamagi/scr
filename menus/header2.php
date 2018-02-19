        <div class="header-2nd">
            <div class="menu-bar-2nd">
                <div class="menu-content"><p> </p>
                    <!--<img src="img/login/Back-Icon.png"> <a href="index.php">back</a>-->
                </div>
                <div class="menu-title" align="center">
                    <a href="http://localhost/simetri/"><img src="http://localhost/simetri/img/default-image/Simetri-Logo-Black.png"></a>
                </div>
                <div class="menu-bar-kanan" align="right">
                    <?php if(!isset($_SESSION['username'])){
                        ?>
                    <div class="menu-login"id="menu-login">
                        <ul>
                            <li class="login-image" id="menuLogin" onclick="full">
                                <a class="login-toggle" href="http://localhost/simetri/login" id="navLogin" onclick="full()"><img src="http://localhost/simetri/img/default-image/Profil-Icon-Black.png"></a>
                            </li>
                        </ul>
                    </div>
                    <?php
                       }
                        else{
                    ?>
                    <div class="menu-cart" id="menu-cart">
                        <a href="http://localhost/simetri/cart"><img src="http://localhost/simetri/img/default-image/Cart-Icon-Black.png" width="40"height="40"></a>
                    </div>
                    <?php  
                        $username=$_SESSION['username'];
                        $user_image=mysqli_query($connection,"select * from user where username='$username'");
                        $imagess=mysqli_fetch_assoc($user_image);
                        $name=$imagess['name'];
                    ?>
                    <div class="menu-user" id="menu-user">
                        <img src="http://localhost/simetri/img/profile/<?php echo $imagess['user_image']; ?>" width="40"height="40">
                        <a href="javascript:void(0)" class="userdropbtn" style="text-decoration:none;"><span>&nbsp;<?php echo $name; ?></span></a>
                        <div class="user-dropdown-content">
                            <div class="user-dropdown-myprofile">
                            <span>My Profile</span>
                            <a href="http://localhost/simetri/user_profile"><?php echo $name; ?></a>
                            </div>
                            <hr class="user-dropdown-lining">
                            <a href='http://localhost/simetri/user_transaction_history'>Trasaction history</a>
                            <hr class="user-dropdown-lining">
                            <a href='http://localhost/simetri/backend/doform/doLogout.php'>logout</a>
                        </div>
                    </div>
                        <?php
                            }
                    ?>                    
                </div>
            </div>
        </div> 