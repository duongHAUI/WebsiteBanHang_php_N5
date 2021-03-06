<?php

include_once "helpers/loadenv.php";

if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}

$request = str_replace("/WebsiteBanHang_php_N5", "", $_SERVER['REQUEST_URI']);
$request = strstr($request, '?', true) ?: $request;
//$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case '':
    case '/':
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
    case "/login":
        require __DIR__ . '/views/login.php';
        break;
    case "/register":
        require __DIR__ . '/views/register.php';
        break;
    case "/update-cart":
        require __DIR__ . '/controllers/cart/update-cart.php';
        break;
    case "/orders":
        require __DIR__ . '/views/orders.php';
        break;
    case "/order-detail":
        require __DIR__ . '/views/order-detail.php';
        break;
    case "/profile":
        require __DIR__ . '/views/profile.php';
        break;
    case "/search":
        require __DIR__ . '/views/search.php';
        break;
    case "/blog":
        require __DIR__ . '/views/blog.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
