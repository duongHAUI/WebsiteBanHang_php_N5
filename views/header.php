   <!-- header -->
   <header>
        <!-- mobile menu -->
        <div class="mobile-menu bg-second">
            <a href="./" class="mb-logo">ATShop</a>
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
                    <Script>
                        function showProductSearch() {
                                var str = document.getElementById("search").value;
                                var xmlhttp=new XMLHttpRequest();
                                xmlhttp.onreadystatechange=function() {
                                    if (this.readyState==4 && this.status==200) {
                                        document.getElementById("products").innerHTML=this.responseText;
                                    }
                                }
                                xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product.php?search="+str,true);
                                xmlhttp.send();
                                
                        }
                    </Script>
                    <div class="search">
                        <input type="text" id="search" placeholder="Search" oninput="showProductSearch()">
                        <i class='bx bx-search-alt' ></i>
                    </div>
                    <ul class="user-menu">
                        <li class="auth-user">
                            <?php  echo (isset($user) == true?"<span>(Nguễn Văn Dương)</span>":"") ?>
                            <a class="auth-user-1"><i class='bx bx-user-circle'></i>
                                <ul class="auth-user-2">
                                    <li>đăng nhập</li>
                                    <li>đăng ký</li>
                                </ul>
                            </a>
                        </li>
                        <li><a href="cart"><i class='bx bx-cart'></i></a></li>
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

