<?php
    namespace Models;
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
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
    
    if(!isset($_GET['pro_id'])){
        
    }else{
        include_once("models/index.php");
        include_once("header.php");
        include_once("./db/connectdb.php");
        $product      = Product::find_by_pk($con,$_GET['pro_id']);
    ?>

    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="/">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="products">all products</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./product-detail.html"><?=$product->title?></a>
                </div>
            </div>
            <div class="row product-row">
                <div class="col-5 col-md-12">
                    <div class="product-img" id="product-img">
                        <img src="images/<?=$product->get_images($con)[0]->link?>" alt="">
                    </div>
                    <div class="box">
                        <div class="product-img-list">
                            <div class="product-img-item">
                                <img src="images/<?=$product->get_images($con)[0]->link?>" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="images/<?=$product->get_images($con)[1]->link?>" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="images/<?=$product->get_images($con)[1]->link?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-md-12">
                    <div class="product-info">
                        <h1>
                            <?=$product->title?>
                        </h1>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Category:</span>
                            <a href="#"><?=Category::find_by_pk($con,$product->cat_id)->title?></a>
                        </div>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Brand:</span>
                            <a href="#"><?=Brand::find_by_pk($con,$product->brand_id)->title?></a>
                        </div>
                        <div class="product-info-detail">
                            <span class="product-info-detail-title">Rated:</span>
                            <span class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </span>
                        </div>
                        <p class="product-description">
                            <?= $product->desc?>
                        </p>
                        <div class="product-info-price"><?=$product->priceDiscount()?></div>
                        <div class="product-quantity-wrapper">
                            <span class="product-quantity-btn">
                                <i class='bx bx-minus'></i>
                            </span>
                            <span class="product-quantity">1</span>
                            <span class="product-quantity-btn">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div>
                        <div>
                            <button class="btn-flat btn-hover">add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    description
                </div>
                <div class="product-detail-description">
                    <button class="btn-flat btn-hover btn-view-description" id="view-all-description">
                        view all
                    </button>
                    <div class="product-detail-description-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit laudantium obcaecati odit dolorem, doloremque accusamus esse neque ipsa dignissimos saepe quisquam tempore perferendis deserunt sapiente! Recusandae illum totam earum ratione.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam incidunt maxime rerum reprehenderit voluptas asperiores ipsam quas consequuntur maiores, at odit obcaecati vero sunt! Reiciendis aperiam perferendis consequuntur odio quas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut quaerat eum veniam doloremque nihil repudiandae odio ratione culpa libero tempora. Expedita, quo molestias. Minus illo quis dignissimos aliquid sapiente error!
                        </p>
                        <img src="./images/JBL_Quantum_400_Product Image_Hero 02.png" alt="">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis accusantium officia, quae fuga in exercitationem aliquam labore ex doloribus repellendus beatae facilis ipsam. Veritatis vero obcaecati iste atque aspernatur ducimus.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat quam praesentium id sit amet magnam ad, dolorum, cumque iste optio itaque expedita eius similique, ab adipisci dicta. Quod, quibusdam quas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, in corrupti ipsam sint error possimus commodi incidunt suscipit sit voluptatum quibusdam enim eligendi animi deserunt recusandae earum natus voluptas blanditiis?
                        </p>
                        <img src="./images/kisspng-beats-electronics-headphones-apple-beats-studio-red-headphones.png" alt="">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi ullam quam fugit veniam ipsum recusandae incidunt, ex ratione, magnam labore ad tenetur officia! In, totam. Molestias sapiente deserunt animi porro?
                        </p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    review
                </div>
                <div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="./images/tuat.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">tuat tran anh</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="./images/tuat.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">tuat tran anh</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="./images/tuat.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">tuat tran anh</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="./images/tuat.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">tuat tran anh</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="./images/tuat.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">tuat tran anh</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="box">
                        <ul class="pagination">
                            <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    related products
                </div>
                <div class="row" id="related-products"></div>
            </div>
        </div>
    </div>
    <!-- end product-detail content -->

    <?php
        include("footer.php");
    }
    ?>

    <!-- app js -->
    <script src="./js/app.js"></script>
    <script src="./js/product-detail.js"></script>
</body>

</html>