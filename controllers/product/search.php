<?php

namespace Models;

include_once("../../models/index.php");
include_once("../../db/connectdb.php");
include_once "../formatCurrency.php";
sleep(1.5);

[
    'keywords' => $keywords,
    'page' => $page,
    'limit' => $limit
] = $_POST;

$start = ($page - 1) * $limit;

$products = Product::find_all_and_count($con, [
    'where' => "product_title LIKE '%$keywords%'",
    'offset' => $start,
    'limit' => $limit
]);

[
    'rows' => $productList,
    'count' => $productCount
] = $products;

$totalPage = ceil($productCount / $limit);

$result = '';

foreach ($productList as $item) {
    $result .= "
        <div class='col-3 col-md-6 col-sm-12 cards' data-id='$item->id'>
            <div class='product-card'>
                <div class='product-discount'>-$item->getDiscount()%</div>
                <a href='product-detail?pro_id=$item->id'>
                    <div class='product-card-img'>
                        <img src='images/{$item->get_images($con)[0]->link}' alt='$item->title'>
                        <img src='images/{$item->get_images($con)[0]->link}' alt='$item->title'>
                    </div>
                </a>
                <div class='product-card-info'>
                    <div class='product-btn'>
                        <a href='products' class='btn-flat btn-hover btn-shop-now'>Mua ngay</a>
                        <button class='btn-flat btn-hover btn-cart-add' onclick='addToCart($item->id)'>
                            <i class='bx bxs-cart-add'></i>
                        </button>
                    </div>
                    <a href='product-detail?pro_id=$item->id' class='product-card-name'>
                        $item->title
                    </a>
                    <div class='product-card-price'>
                        <span><del>" . currency_format($item->price) . "</del></span>
                        <span class='curr-price'>" . currency_format($item->priceDiscount()) . "</span>
                    </div>
                </div>
            </div>
        </div>
    ";
}

echo json_encode([
    'data' => $result,
    'totalPage' => $totalPage
]);