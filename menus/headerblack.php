        <div class="header" id="header">
            <div class="header-black-opacity" id="header-opacity"></div>
            <div class="menu-bar">
                <div class="menu-content" id="menu-content" onclick="openmenu(this)">
                    <div class="bar1" style="background-color:black"></div>
                    <div class="bar2" style="background-color:black"></div>
                    <div class="bar3" style="background-color:black"></div>
                </div>
                <div class="menu-title" align="center">
                    <a href="http://localhost/simetri"><img src="http://localhost/simetri/img/default-image/Simetri-Logo-Black.png"></a>
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
                        <?php 
                            $totalqty1 = 0;
                        $username =  $_SESSION['username'];
                        $sell_price1="select * from order_item where username='$username' and status='cart pending'";
                        $run_price1= mysqli_query($connection, $sell_price1);
                        while($pro_price1 = mysqli_fetch_assoc($run_price1)){
                        $totalqty1 += $pro_price1['quantity'];
                        }
                        ?>
                        <span class="cart-qty"><?php echo $totalqty1; ?></span>
                    </div>
                    <?php  
                        $username=$_SESSION['username'];
                        $user_image=mysqli_query($connection,"select * from user where username='$username'");
                        $imagess=mysqli_fetch_assoc($user_image);
                        $name=$imagess['name'];
                    ?>
                    <div class="menu-user" id="menu-user">
                        <img src="http://localhost/simetri/img/profile/<?php echo $imagess['user_image']; ?>" width="40"height="40">
                        <a href="javascript:void(0)" class="userdropbtn" style="text-decoration:none;color:black"></a>
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