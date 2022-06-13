<?php
    namespace Models;
?>
<?php
    include_once("../../models/index.php");
    include_once("../../db/connectdb.php");
    if(isset($_GET['sort-price']) && $_GET['sort-price'] == "ASC" ){
        $products = Product::find_all($con,array("limit"=>8,"order" => "product_price ASC"));
        show($products);
    }else if(isset($_GET['sort-price']) && $_GET['sort-price'] == "DESC"){
        $products = Product::find_all($con,array("limit"=>8,"order" => "product_price DESC"));
        show($products);
    }else{
        $products = Product::find_all($con);
        show($products);
    }
    function show($products){
        global $con;
        foreach ($products as $key => $value) {
            ?>
                <div class="col-3 col-md-6 col-sm-12 cards">
                            <div class="product-discount">-<?= $value->discount?>%</div>
                            <div class="product-card">
                                <a href="product-detail?pro_id=<?=$value->id?>">
                                    <div class="product-card-img">
                                        <img src="images/<?=$value->get_images($con)[0]->link ?>" alt="">
                                        <img src="images/<?=$value->get_images($con)[0]->link ?>" alt="">
                                    </div>
                                </a>
                                <div class="product-card-info">
                                    <div class="product-btn">
                                        <a href="products" class="btn-flat btn-hover btn-shop-now">Mua ngay</a>
                                        <button class="btn-flat btn-hover btn-cart-add">
                                            <i class='bx bxs-cart-add'></i>
                                        </button>
                                    </div>
                                    <a href="product-detail?pro_id=<?=$value->id?>" class="product-card-name">
                                        <?= $value->title?>
                                    </a>
                                    <div class="product-card-price">
                                        <span><del>$<?= $value->price?></del></span>
                                        <span class="curr-price">$<?= $value->priceDiscount()?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
        }
    }
    mysqli_close($con);
?>