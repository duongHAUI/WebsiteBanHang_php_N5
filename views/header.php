<?php
    namespace Models;
?>
<?php
    include_once("models/index.php");
    if(isset($_SESSION['c_user'] ) && $_SESSION['c_user']){
        $user = $_SESSION['c_user'];
    }
?>
   <header>
        <!-- mobile menu -->
        <div class="mobile-menu bg-second">
            <a href="/" class="mb-logo">ATShop</a>
            <span class="mb-menu-toggle" id="mb-menu-toggle">
                <i class='bx bx-menu'></i>
            </span>
        </div>
        <!-- end mobile menu -->
        <!-- main header -->
        <div class="header-wrapper" id="header-wrapper">
            <!-- end top header -->
            <!-- mid header -->
            <div class="bg-main">
                <div class="mid-header container">
                    <a href="#" class="logo">ATShop</a>
                    <div class="search">
                        <input type="text" id="search" placeholder="Search" >
                        <i class='bx bx-search-alt' ></i>
                    </div>
                    <ul class="user-menu">
                        <li class="user-cart">
                            <?php
                                $count =0;
                                if(isset($user)){
                                    $carts = Cart::find_all($con);
                                    
                                    foreach ($carts as $key => $value) {
                                        $count += $value->qty;
                                    }
                                }
                            ?>
                            <a href="cart"><i class='bx bx-cart'></i><span class="count-cart"><?=$count?></span></a>
                        </li>
                        <!-- when not login -->
                        <!-- <li class="auth-user">
                            <a href="login" class="auth-user-1"><i class='bx bx-user-circle'></i></a>
                        </li> -->
                        <!-- when login -->
                        <li class="auth-user">
                            <div class="auth-user-1">
                                <p>
                                    <?php
                                        if(isset($user)){
                                            ?>
                                            <span style='font-size: 14px;'><?=$user['name']?></span>
                                            <?php
                                        }else{
                                            ?>
                                            <span><a href="login">Login</a></span>
                                            <?php
                                        }
                                        
                                    ?>
                                </p>
                                <ul class="auth-user-2">
                                    <?php
                                        if(isset($user)){
                                            echo "<li>Settings</li>";
                                            echo "<li><a href='./controllers/auth/logout.php'>Logout</a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end mid header -->
            <!-- bottom header -->
            <div class="bg-second">
                <div class="bottom-header container">
                    <ul class="main-menu">
                        <li><a href="./">home</a></li>
                        <!-- mega menu -->
                        <li >
                            <a href="products">Shop</a>
                        </li>
                        <!-- end mega menu -->
                        <li><a href="#">blog</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- end bottom header -->
        </div>
        <!-- end main header -->
    </header>
    <!-- end header -->

