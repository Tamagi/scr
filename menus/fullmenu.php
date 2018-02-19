        <div id="menu-full" class="menu-full">
            <div id="menu-full-closer"style="width:100%;height:100%;opacity:0.8;background-color:black;" onclick="closemenu()"></div>
            <div id="menu-full-dropdown-container" class="menu-full-dropdown-container">
                <div class="menu-full-dropdown-content">
                    <div class="menu-full-dropdown-content-header">
                        <?php if(!isset($_SESSION['username'])){
                            ?>
                        <div class="menu-full-login">
                            <ul>
                                <li class="login-image" id="menuLogin" onclick="full">
                                    <a class="login-toggle" href="http://localhost/simetri/login" ><img src="http://localhost/simetri/img/default-image/Profil-Icon-White.png"></a>
                                </li>
                            </ul>
                        </div>
                        <?php
                           }
                            else{
                        ?>
                        <div class="menu-full-cart">
                            <a href="http://localhost/simetri/cart"style="line-height:50px;cursor:pointer;text-align:right;padding-right:20px;"><img src="http://localhost/simetri/img/default-image/Cart-Icon-white.png"></a>
                            <?php 
                                $totalqty1 = 0;
                                $username =  $_SESSION['username'];
                                $sell_price1="select * from order_item where username='$username' and status='cart pending'";
                                $run_price1= mysqli_query($connection, $sell_price1);
                                while($pro_price1 = mysqli_fetch_assoc($run_price1)){
                                $totalqty1 += $pro_price1['quantity'];
                                }
                            ?>
                            <span class="menu-full-cart-qty"><?php echo $totalqty1; ?></span>
                        </div>
                        <?php  
                            $username=$_SESSION['username'];
                            $user_image=mysqli_query($connection,"select * from user where username='$username'");
                            $imagess=mysqli_fetch_assoc($user_image);
                            $name=$imagess['name'];
                        ?>
                        <div class="menu-full-user">
                            <a href="http://localhost/simetri/user_profile" style="line-height:50px;cursor:pointer;text-align:left;padding-left:20px;"><img src="http://localhost/simetri/img/profile/<?php echo $imagess['user_image']; ?>"></a>
                        </div>
                            <?php
                                }
                            ?>
                      </div>
                      <div class="menu-full-dropdown-content-home">
                          <a href="http://localhost/simetri/home">Home</a>
                      </div>
                    <div class="menu-full-dropdown-content-beans">
                        <a href="http://localhost/simetri/product">Shop</a>
                    </div>
                    <!--<div class="menu-full-dropdown-content-academy">
                        <a href="http://localhost/simetri/academy">Academy</a>
                    </div>-->
                    <div class="menu-full-dropdown-content-cafe">
                        <a href="http://localhost/simetri/cafe">Cafe</a>
                    </div>
                    <div class="menu-full-dropdown-content-event">
                        <a href="http://localhost/simetri/event">Event</a>
                    </div>
                    <div class="menu-full-dropdown-content-contact">
                        <a href="http://localhost/simetri/home#homepage_contact">Contact Us</a>
                    </div>
                    <div class="menu-full-dropdown-content-sosmed">
                    <div class="menu-full-dropdown-content-sosmed-container">
                        <a href="https://www.instagram.com/simetricoffeeroasters/?hl=en"><img src="http://localhost/simetri/img/index/Instagram-Logo.png" alt="IG"></a>
                        <a href="https://www.facebook.com/simetricoffee/"><img src="http://localhost/simetri/img/index/Facebook-Logo.png" alt="FB"></a>
                        <a href="https://twitter.com/simetricoffee?lang=en"><img src="http://localhost/simetri/img/index/Twitter-Logo.png" alt="TW"></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>