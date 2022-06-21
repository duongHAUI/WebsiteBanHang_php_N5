<?php

namespace Models;

include_once "../../models/index.php";
include_once "../../db/connectdb.php";
include_once "../../helpers/common.php";

if (isset($_POST['order-again-submit'])) {
    ['order_id' => $orderId] = $_POST;

    if (!isset($_SESSION['c_user'])) {
        header("Location: ../../login");
        return;
    }

    $oldOrder = Order::find_by_pk($con, $orderId);
    $oldOrder->populated($con, 'detail');

    $cartData = array_reduce($oldOrder->detail, function ($acc, $cur) use ($con, $oldOrder) {
        $cart = Cart::find_one($con, [
            "where" => "cus_id='$oldOrder->cus_id' and pro_id = '$cur->pro_id'"
        ]);

        $acc[] = is_null($cart) ? [
            'cart_qty' => $cur->quantity,
            'cus_id' => $oldOrder->cus_id,
            'pro_id' => $cur->pro_id
        ] : [];
        return $acc;
    }, []);

    Cart::create_many($con, array_filter($cartData));

    header("Location: ../../cart");
} else {
    http_response_code(404);
}