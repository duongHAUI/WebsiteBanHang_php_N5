<?php
    namespace Models;
?>
<?php
    include_once("../models/index.php");
    include_once("../db/connectdb.php");
    if(isset($_GET['cat_id'])){
        if($_GET['cat_id'] ==""){
            $products = Product::find_all($con);
            show($products);
        }
        else{
            $cat_id = $_GET['cat_id'];
            $products = Product::find_all($con, array("where" => "cat_id = '$cat_id'"));
            show($products);
        }
    }
    else if(isset($_GET['search'])){
        
        if($_GET['search'] ==""){
            $products = Product::find_all($con);
            show($products);
            
        }else{
            $search = $_GET['search'];
            $products = Product::find_all($con, array("where" => "product_title like '%$search%'"));
            show($products);
        }
    }else if(isset($_GET['latest-product'])){
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
                <div class="col-3 col-md-6 col-sm-12">
                            <div class="product-card">
                                <a href="product-detail?pro_id=<?=$value->id?>">
                                    <div class="product-card-img">
                                        <img src="images/<?=$value->get_images($con)[0]->link ?>" alt="">
                                        <img src="images/<?=$value->get_images($con)[0]->link ?>" alt="">
                                    </div>
                                </a>
                                <div class="product-card-info">
                                    <div class="product-btn">
                                        <a href="products" class="btn-flat btn-hover btn-shop-now">shop now</a>
                                        <button class="btn-flat btn-hover btn-cart-add">
                                            <i class='bx bxs-cart-add'></i>
                                        </button>
                                        <button class="btn-flat btn-hover btn-cart-add">
                                            <i class='bx bxs-heart'></i>
                                        </button>
                                    </div>
                                    <a href="product-detail?pro_id=<?=$value->id?>" class="product-card-name">
                                        <?= $value->title?>
                                    </a>
                                    <div class="product-card-price">
                                        <span><del><?= $value->price?></del></span>
                                        <span class="curr-price"><?= $value->priceDiscount()?></span>
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