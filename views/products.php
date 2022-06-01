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
    include_once("header.php");
    include_once("./db/connectdb.php");

    ?>

    <!-- products content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="./">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./products.php">all products</a>
                </div>
                <!-- <div>
                    <select name="category" onchange="showProductCategory(this.value)">
                        <option value="">Select a Category:</option>
                    </select>
                </div> -->
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
                            <script>
                                function showProductCategory(cat_id) {
                                    var xmlhttp=new XMLHttpRequest();
                                    xmlhttp.onreadystatechange=function() {
                                        if (this.readyState==4 && this.status==200) {
                                            document.getElementById("products").innerHTML=this.responseText;
                                        }
                                    }
                                    xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product.php?cat_id="+cat_id,true);
                                    xmlhttp.send();
                                }
                            </script>
                            <select name="category" onchange="showProductCategory(this.value)">
                                <option value="">Select a Category:</option>
                                <?php
                                    $categories =  Category::find_all($con);
                                    foreach($categories as $key => $value){
                                        echo "<option value='$value->id'>$value->title</option>";
                                    }
                                ?>
                            </select>
                            
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox" style="display: flex; flex-direction: column;">
                                        
                                        <?php 
                                            $categories =  Category::find_all($con);
                                            foreach($categories as $key => $value){
                                                echo "
                                                <input type='checkbox' id='$value->title'>
                                                <label for='$value->title' style='margin: 12px'>$value->title
                                                <i class='bx bx-check'></i>
                                                </label>";
                                            }
                                        ?>
                                    </div>
                                </li>
                            </ul>
                            
                            
                        </div>
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
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status1">
                                        <label for="status1">
                                            On sale
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status2">
                                        <label for="status2">
                                            In stock
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="status3">
                                        <label for="status3">
                                            Featured
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Brands
                            </span>
                            <ul class="filter-list">
                                <?php
                                    $brand = Brand::find_all($con);
                                ?>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                Colors
                            </span>
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            Red
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember2">
                                        <label for="remember2">
                                            Blue
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember3">
                                        <label for="remember3">
                                            White
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember4">
                                        <label for="remember4">
                                            Pink
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember5">
                                        <label for="remember5">
                                            Yellow
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <span class="filter-header">
                                rating
                            </span>
                            <ul class="filter-list">
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="group-checkbox">
                                        <input type="checkbox" id="remember1">
                                        <label for="remember1">
                                            <span class="rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </span>
                                            <i class='bx bx-check'></i>
                                        </label>
                                    </div>
                                </li>
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
                            xmlhttp.open("GET","/WebsiteBanHang_php_N5/controllers/product.php",true);
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
    <script src="./js/app.js"></script>
<!-- <script src="./js/products.js"></script> -->
</body>

</html>
