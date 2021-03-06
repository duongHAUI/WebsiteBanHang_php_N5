<?php
    namespace Models;
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
    <?php
        include_once("models/index.php");
        include_once("./db/connectdb.php");
        include_once("header.php");
        include_once "./controllers/formatCurrency.php";
        $slides = Slider::find_all($con);
    ?>
    <!-- hero section -->
    <div class="hero">
        <div class="slider">
            <div class="container">
                <!-- slide item -->
                <!-- end slide item -->
                <?php for ($i=0; $i < sizeof($slides); $i++) { ?>
                <!-- slide item -->
                    <div class="slide <?php echo ($i==0) ? "active" : "" ?>">
                        <div class="info">
                            <div class="info-content">
                                <h3 class="top-down">
                                    <?=$slides[$i]->name?>
                                </h3>
                                <h2 class="top-down trans-delay-0-2">
                                    <?=$slides[$i]->good?>
                                </h2>
                                <p class="top-down trans-delay-0-4">
                                    <?=$slides[$i]->desc?>
                                </p>
                                <div class="top-down trans-delay-0-6">
                                    <button class="btn-flat btn-hover">
                                        <span>Mua ngay</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="img right-left">
                            <img src="admin_panel/slides_images/<?=$slides[$i]->image?>" alt="">
                        </div>
                    </div>
                <?php } ?>
                <!-- end slide item -->
                <!-- slide item -->
                <!-- end slide item -->
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <!-- end slider controller -->
        </div>
    </div>
    <!-- end hero section -->
    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Tai nghe cao c???p</h3>
                        <button class="btn-flat btn-hover"><span>B??? s??u t???p</span></button>
                    </div>
                    <img src="./images/JBLHorizon_001_dvHAMaster.png" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Tai nghe JBL</h3>
                        <button class="btn-flat btn-hover"><span>B??? s??u t???p</span></button>
                    </div>
                    <img src="./images/kisspng-beats-electronics-headphones-apple-beats-studio-red-headphones.png" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Tai nghe kh??ng d??y</h3>
                        <button class="btn-flat btn-hover"><span>B??? s??u t???p</span></button>
                    </div>
                    <img src="./images/JBL_TUNE220TWS_ProductImage_Pink_ChargingCaseOpen.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- end promotion section -->

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>S???n ph???m m???i nh???t</h2>
            </div>
            
            <div class="row" id="latest-product">
                
            </div>
            <div class="section-footer" index="1" id="view-more-latest-product" onclick ="showProductLatest(true)" style="cursor: pointer;">
                <a  class="btn-flat btn-hover" >Xem th??m</a>
            </div>
        </div>
    </div>
    <!-- end product list -->
    <!-- special product -->
    <div class="bg-second">
        <div class="section container">
            <div class="row">
                <div class="col-4 col-md-4">
                    <div class="sp-item-img">
                        <img src="admin_panel/slides_images/<?=$slides[0]->image?>" alt="">
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="sp-item-info">
                        <div class="sp-item-name"><?=$slides[0]->name?></div>
                        <p class="sp-item-description">
                            <?=$slides[0]->desc?>
                        </p>
                        <button class="btn-flat btn-hover">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end special product -->

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>B??N CH???Y NH???T</h2>
            </div>
            <?php

            ?>
            <div class="row">
                <?php  
                    $products = Product::find_all($con,array("limit"=>4,"order"=>"product_sold DESC"));
                    foreach ($products as $key => $value) {
                ?>
                        <div class="col-3 col-md-6 col-sm-12 cards">
                            <div class="product-card">
                                <div class="product-discount">-<?= $value->getDiscount() ?>%</div>
                                <a href="product-detail?pro_id=<?=$value->id?>">
                                    <div class="product-card-img">
                                        <img src="images/<?=$value->get_images($con)[0]->link ?>" alt="">
                                        <img src="images/<?=$value->get_images($con)[1]->link ?>" alt="">
                                    </div>
                                </a>
                                <div class="product-card-info">
                                    <div class="product-btn">
                                        <a href="product-detail?pro_id=<?=$value->id?>" class="btn-flat btn-hover btn-shop-now">Mua ngay</a>
                                        <button class="btn-flat btn-hover btn-cart-add">
                                            <i class='bx bxs-cart-add' value="<?=$value->id?>"></i>
                                        </button>
                                    </div>
                                    <a href="product-detail?pro_id=<?=$value->id?>" class="product-card-name">
                                        <?= $value->title?>
                                    </a>
                                    <div class="product-card-price">
                                        <span><del><?= currency_format($value->price)?></del></span>
                                        <span class="curr-price"><?= currency_format($value->priceDiscount())?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
            <div class="section-footer">
                <a href="./products" class="btn-flat btn-hover">Xem t???t c???</a>
            </div>
        </div>
    </div>
    <!-- end product list -->

    <!-- blogs -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>b??i vi???t m???i nh???t</h2>
            </div>
            <div class="blog">
                <div class="blog-img">
                    <img src="./images/JBL_Quantum400_Lifestyle1.png" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Tai nghe JBL Ultra 360
                    </div>
                    <div class="blog-preview">
                    Thay v?? s??? d???ng d??y n???i nh?? d??ng tai nghe truy???n th???ng, thi???t b??? ??m thanh n??y ???? ??em ?????n cho ng?????i d??ng nh???ng tr???i nghi???m ho??n to??n m???i ngay t??? ???ngo???i h??nh??? ???n t????ng,
                    ti???n ??ch c???a n??. Kh??ng c??n nh???ng chi???c d??y n???i r???c r???i, ph???c t???p. Gi??? ????y, b???n s??? ???????c t???n h?????ng nh???ng c??ng ngh??? ??m thanh ch???t l?????ng, hi???n ?????i v???i s??? t???i ??u ho??n to??n trong thi???t k???. 
                    Ngo??i ra, c??c ph??m ch???c n??ng ?????u ???????c t??ch h???p ?????y ????? gi??p ng?????i d??ng d??? d??ng thao t??c khi d??ng.
                    </div>
                    <button class="btn-flat btn-hover">Xem th??m</button>
                </div>
            </div>
            <div class="blog row-revere">
                <div class="blog-img">
                    <img src="./images/JBL_TUNE220TWS_Lifestyle_black.png" alt="">
                </div>
                <div class="blog-info">
                    <div class="blog-title">
                        Tai nghe kh??ng d??y Samsung 2022
                    </div>
                    <div class="blog-preview">
                        Thay v?? s??? d???ng d??y n???i nh?? d??ng tai nghe truy???n th???ng, thi???t b??? ??m thanh n??y ???? ??em ?????n cho ng?????i d??ng nh???ng tr???i nghi???m ho??n to??n m???i ngay t??? ???ngo???i h??nh??? ???n t????ng,
                        ti???n ??ch c???a n??. Kh??ng c??n nh???ng chi???c d??y n???i r???c r???i, ph???c t???p. Gi??? ????y, b???n s??? ???????c t???n h?????ng nh???ng c??ng ngh??? ??m thanh ch???t l?????ng, hi???n ?????i v???i s??? t???i ??u ho??n to??n trong thi???t k???. 
                        Ngo??i ra, c??c ph??m ch???c n??ng ?????u ???????c t??ch h???p ?????y ????? gi??p ng?????i d??ng d??? d??ng thao t??c khi d??ng.
                    </div>
                    <button class="btn-flat btn-hover">Xem th??m</button>
                </div>
            </div>
            <div class="section-footer">
                <a href="#" class="btn-flat btn-hover">Xem t???t c???</a>
            </div>
        </div>
    </div>
    <!-- end blogs -->

    <?php
        include("footer.php");
    ?>
    <!-- app js -->
    <!-- <script src="./js/app.js"></script> -->
    <script src="./js/lastestProduct.js"></script>
    <script src="./js/addCartHeader.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./admin_panel/js/notify.min.js"></script>
</body>
</html>
