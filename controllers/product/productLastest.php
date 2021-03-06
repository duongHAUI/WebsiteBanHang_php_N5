<?php
    namespace Models;
?>
<?php
    include_once("../../models/index.php");
    include_once("../../db/connectdb.php");
    include_once "../formatCurrency.php";
    if(isset($_GET['latest-product'])){
        if($_GET['latest-product'] == "false"){
            $products = Product::find_all($con,array("limit"=>4,"order" => "createdAt DESC"));
            show($products);
        }else{
            $latest_product = intval($_GET['latest-product'])*4;
            $products = Product::find_all($con,array("limit"=>$latest_product,"order" => "createdAt DESC"));
            show($products);
        }
    }
    else{
        $products = Product::find_all($con);
        show($products);
    }
    function show($products){
        global $con;
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
                                        <button class="btn-flat btn-hover btn-cart-add"  onclick = "addToCart(<?=$value->id?>,<?=$value->quantity?>)">
                                            <i class='bx bxs-cart-add'></i>
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
            <?php
        }
    }
    mysqli_close($con);
?>
</body>
</html>