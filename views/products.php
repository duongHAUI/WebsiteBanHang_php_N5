<?php
    namespace Models;
?>

<!DOCTYPE html>
<html lang="en">

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
    ?>
    <!-- products content -->
    <div class="bg-main">
        <div class="container">
            <div class="box row bw"  >
                <div class="breadcumb">
                    <a href="./">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="products">Tất cả sản phẩm</a>
                </div>
                <div class="sort-price-right">
                    <select name="sort-price" id="sort-product">
                        <option value="ALL">-----Giá-----</option>
                        <option value="ASC">Thấp đến cao</option>
                        <option value="DESC">Cao đến thấp</option>
                    </select>
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
                                Danh mục sản phẩm
                            </span>
                            <ul class="filter-list">
                            <ul class="filter-list"  id="list-category">
                                <?php
                                    $categories = Category::find_all($con);
                                    foreach ($categories as $key => $value) {
                                        ?>
                                        <li>
                                            <div class="group-checkbox">
                                                <input type="checkbox" id="<?=$value->id?>" value="<?=$value->id?>" class="category-search" >
                                                <label for="<?=$value->id?>" >
                                                    <?=$value->title?>
                                                    <i class='bx bx-check'></i>
                                                </label>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>

                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Khoảng Giá
                            </span>
                            <div class="price-range">
                                <input type="number" placeholder="₫ TỪ" id="price-range-min">
                                <span>-</span>
                                <input type="number" placeholder="₫ ĐẾN" id="price-range-max">
                            </div>
                            <div >
                                <button id="price-range">Áp dụng</button>
                            </div>
                            <div>
                                <button id="un-price-range">Hủy bỏ</button>
                            </div>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Thương hiệu
                            </span>
                            <ul class="filter-list" id="list-brand">
                                <?php
                                    $categories = Brand::find_all($con);
                                    foreach ($categories as $key => $value) {
                                        ?>
                                        <li>
                                            <div class="group-checkbox">
                                                <input type="checkbox" id="<?=$value->id?>" value="<?=$value->id?>" class="brand-search" >
                                                <label for="<?=$value->id?>" >
                                                    <?=$value->title?>
                                                    <i class='bx bx-check'></i>
                                                </label>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-9 col-md-12">
                        <div class="box filter-toggle-box">
                            <button class="btn-flat btn-hover" id="filter-toggle">Lọc</button>
                        </div>
                        <!-- L -->
                        <div class="box">
                            <div class="row" id="products">
                            </div> 
                        </div>  
                        <div class="box">
                            <ul class="pagination">
                                <li><a class="page-pro-left"><i class='bx bxs-chevron-left'></i></a></li>
                                <li><a class="page-pro active">1</a></li>
                                <li><a class="page-pro">2</a></li>
                                <li><a class="page-pro">3</a></li>
                                <li><a class="page-pro-right"><i class='bx bxs-chevron-right'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products content -->
    <form id="form-request" method = "POST" >
        <input type="hidden" id="categories" name="categories" value="">
        <input type="hidden" id="brands" name="brands" value="">              
        <input type="hidden"  id="sortPrice" name="sortPrice" value="">
        <input type="hidden" id="maxPrice" name="maxPrice" value="">   
        <input type="hidden" id="minPrice" name="minPrice" value="">               
        <input type="hidden" id="offset" name="offset" value="1">             
    </form>
    <?php
        include_once("footer.php");
    ?>
    <!-- app js -->
    <!-- <script src="./js/app.js"></script> -->
    <script src="./js/filterProduct.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./admin_panel/js/notify.min.js"></script>
    <script src="./js/addCartHeader.js"></script>
</body>

</html>
