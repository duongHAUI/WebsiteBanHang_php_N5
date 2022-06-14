<?php
    namespace Models;
?>
<?php
    include_once("../../models/index.php");
    include_once("../../db/connectdb.php");
    $arrQuery = array("where"=>"","order"=>"");
    if(!empty($_GET['categories'])){
        $str = str_replace(" ",",",trim($_GET['categories']));
        $arrQuery["where"] = "cat_id IN ($str) ";
    }
    if(!empty($_GET['brands'])){
        $str = str_replace(" ",",",trim($_GET['brands']));
        if($arrQuery["where"] != ""){
            $arrQuery["where"] .= " and brand_id IN ($str) ";
        }else{
            $arrQuery["where"] = " brand_id IN ($str) ";
        }
    }
    if(!empty($_GET['maxPrice']) && !empty($_GET['minPrice'])){
        $min = $_GET['minPrice'];
        $max = $_GET['maxPrice'];

        if($arrQuery["where"] != ""){
            $arrQuery["where"] .= " and (product_price - product_price* product_discount*0.01) BETWEEN $min and $max ";
        }else{
            $arrQuery["where"] = " (product_price - product_price* product_discount*0.01) BETWEEN $min and $max ";
        }
    }
    if(!empty($_GET['sortPrice'])){
        $sort = $_GET['sortPrice'];
        if($_GET['sortPrice'] != "ALL"){
            $arrQuery["order"] = "(product_price - product_price* product_discount*0.01) $sort" ;
        }else{
            $arrQuery["order"] = "";
        }
    }
    if($arrQuery['order'] == ""){
        unset($arrQuery['order']);
    }
    if($arrQuery['where'] == ""){
        unset($arrQuery['where']);
    }
    $products = Product::find_all($con,$arrQuery);
    show($products);

    function show($products){
        global $con;
        foreach ($products as $key => $value) {
            ?>
                <div class="col-4 col-md-6 col-sm-12 cards">
                            <div class="product-card">
                                <div class="product-discount">-<?= $value->discount?>%</div>
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