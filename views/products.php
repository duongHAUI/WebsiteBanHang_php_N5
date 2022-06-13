<?php
    namespace Models;
?>

<!DOCTYPE html>
<html lang="en">

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
    include_once("models/index.php");
    include_once("./db/connectdb.php");
    include_once("header.php");
    ?>

    <!-- products content -->
    <div class="bg-main">
        <div class="container">
            <div class="box row" >
                <div class="breadcumb">
                    <a href="./">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./products.php">all products</a>
                </div>
                <div>
                    <!-- <select name="sort-price" id="sort-product">
                        <option value="">Giá</option>
                        <option value="ASC">Giá : Thấp đến cao</option>
                        <option value="DESC">Giá : Cao đến thấp</option>
                    </select> -->
                </div>
            </div>
            <div class="box">
                <div class="row">
                    <div class="col-3 filter-col" id="filter-col">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-close">close</button>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Categories
                            </span>
                            <div class="box">
                            <ul class="filter-list" category-list="" id="list-category">
                                <?php
                                    $categories = Category::find_all($con);
                                    foreach ($categories as $key => $value) {
                                ?>
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="<?=$value->id?>" value="<?=$value->id?>" class="category-search">
                                            <label for="<?=$value->id?>">
                                                <?=$value->title?>
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                <?php
                                    }
                                ?>
                            </ul>
                        <div class="box">
                            <span class="filter-header">
                                Price
                            </span>
                            <div class="price-range">
                                <input type="text">
                                <span>-</span>
                                <input type="text">
                            </div>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Brands
                            </span>
                            <ul class="filter-list">
                                <?php
                                    $brands = Brand::find_all($con);
                                    foreach ($brands as $key => $value) {
                                        ?>
                                        <li><a href="?brand-id=<?=$value->id?>"> <?=$value->title?></a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-9 col-md-12">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                        </div>
                        <!-- L -->
                        <script>
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function() {
                                        if (this.readyState==4 && this.status==200) {
                                            document.getElementById("products").innerHTML=this.responseText;
                                        }
                                    }
                            xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product/categoryPro.php",true);
                            xmlhttp.send();
                        </script>
                        <div class="box">
                            <div class="row" id="products">
                            </div> 
                        </div>  
                        <div class="box">
                            <ul class="pagination">
                                <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products content -->

    <?php
        include_once("footer.php");
    ?>
    <!-- app js -->
    <!-- <script src="./js/app.js"></script> -->
    <script src="./js/searchCategory.js"></script>
    <!-- <script src="./js/sortPriceProduct.js"></script> -->
</body>

</html>
