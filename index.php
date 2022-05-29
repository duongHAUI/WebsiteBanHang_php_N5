<?php

$request = str_replace("/WebsiteBanHang_php_N5", "", $_SERVER['REQUEST_URI']);
$request = preg_replace('/\?[a-zA-Z]+\_*[a-zA-Z]*\=[a-zA-z0-9]+(&[a-zA-Z]+\_*[a-zA-Z]*=[a-zA-Z0-9])*/', "", $request);
//$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case '/':
        require __DIR__ . '/views/index.php';
        break;
    case '':
        require __DIR__ . '/views/index.php';
        break;
    case '/products':
        require __DIR__ . '/views/products.php';
        break;
    case '/product-detail':
        require __DIR__ . '/views/product-detail.php';
        break;
    case '/checkout':
        require __DIR__ . '/views/checkout.php';
        break;
    case '/cart':
        require __DIR__ . '/views/cart.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
