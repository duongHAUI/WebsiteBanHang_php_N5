<?php
namespace Models;

include_once("models/index.php");
include_once("./db/connectdb.php");

$keywords = htmlspecialchars(trim($_GET['keywords'] ?? ''), ENT_COMPAT);

$recordPerPage = 8;

$data = Product::find_all_and_count($con, [
    'where' => "product_title LIKE '%$keywords%'",
    'limit' => $recordPerPage
]);

[
    'rows' => $productList,
    'count' => $productCount
] = $data;

$totalPage = ceil($productCount / $recordPerPage);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

<?php
include_once("header.php");
?>

<!-- products content -->
<div class="bg-main">
    <div class="container">
        <div class="box row" >
            <div class="breadcumb">
                <a href="./">Trang chủ</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="products" style="text-transform: none;">Tất cả sản phẩm</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <span style="text-transform: none;">Tìm kiếm với từ khóa "<?= $keywords ?>"</span>
            </div>
        </div>
        <div class="box">
            <?php if ($productCount > 0): ?>

                <div class="row" id="search-container">
                    <?php foreach ($productList as $item): ?>
                        <div class="col-3 col-md-6 col-sm-12 cards" data-id="<?= $item->id ?>">
                            <div class="product-card">
                                <div class="product-discount"><?= $item->discount ?>%</div>
                                <a href="product-detail?pro_id=<?= $item->id ?>">
                                    <div class="product-card-img">
                                        <img src="images/<?= $item->get_images($con)[0]->link ?>" alt="<?= $item->title ?>">
                                        <img src="images/<?= $item->get_images($con)[0]->link ?>" alt="<?= $item->title ?>">
                                    </div>
                                </a>
                                <div class="product-card-info">
                                    <div class="product-btn">
                                        <a href="products" class="btn-flat btn-hover btn-shop-now">Mua ngay</a>
                                        <button class="btn-flat btn-hover btn-cart-add" onclick="addToCart(<?= $item->id ?>)">
                                            <i class='bx bxs-cart-add' value="<?=$item->id?>"></i>
                                        </button>
                                    </div>
                                    <a href="product-detail?pro_id=<?= $item->id ?>" class="product-card-name">
                                        <?= $item->title ?>
                                    </a>
                                    <div class="product-card-price">
                                        <span><del>$<?= $item->price ?></del></span>
                                        <span class="curr-price">$<?= $item->priceDiscount() ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($totalPage > 1): ?>
                    <div style="text-align: center;">
                        <button class="btn-flat mt-5" type="button" id="btn-view-more">
                            <i class="fa fa-spin fa-spinner" style="margin-right: 5px; display: none;"></i>
                            Xem thêm
                        </button>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p class="no-product">Không tìm thấy sản phẩm nào.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- end products content -->

<?php
include_once("footer.php");
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./js/addCartHeader.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        'use strict';

        let currentPage = 1;

        const btnViewMore = $('#btn-view-more');

        btnViewMore.click(function () {
            currentPage++;
            $.ajax({
                url: './controllers/product/search.php',
                method: 'post',
                data: {page: currentPage, limit: <?= $recordPerPage ?>, keywords: '<?= $keywords ?>'},
                beforeSend: function () {
                    btnViewMore.prop('disabled', true).find('.fa-spinner').show();
                }
            }).done(response => {
                response = JSON.parse(response);
                $('#search-container').append(response.data);
                if (currentPage === response.totalPage) {
                    btnViewMore.hide();
                }
            }).fail(error => {
                console.log(error)
            }).always(() => {
                btnViewMore.prop('disabled', false).find('.fa-spinner').hide();
            })
        })
    });
</script>
</body>
</html>
