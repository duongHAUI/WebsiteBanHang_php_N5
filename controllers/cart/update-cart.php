<?php

namespace Models;

include "db/connectdb.php";
include "models/index.php";

$user_id = $_SESSION["user_id"];
$cart_id = $_GET["cart_id"];
$cart_qty = $_GET["cart_qty"];

if ($cart_qty > 0) {
  $cart = Cart::find_by_pk($con, $cart_id);
  $cart->populated($con, "Product");
  if ($cart_qty > $cart->product->quantity) {
    return header("Location: cart");
  }
  Cart::update_by_pk($con, $cart_id, array("cart_qty" => $cart_qty));
} else if ($cart_qty == 0) {
  Cart::delete_by_pk($con, $cart_id);
}

header("Location: cart");
