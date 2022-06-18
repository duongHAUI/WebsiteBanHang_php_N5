<?php

namespace Models;

include "db/connectdb.php";
include "models/index.php";

$user_id = $_SESSION["user_id"];
$cart_id = $_GET["cart_id"];

Cart::delete_by_pk($con, $cart_id);
header("Location: cart");
