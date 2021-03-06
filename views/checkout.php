<?php

namespace Models;

include_once "./middleware/notAuth.php";
include "models/index.php";
include "db/connectdb.php";
include("header.php");
include_once "./controllers/formatCurrency.php";
include "helpers/common.php";

$user_id = $_SESSION['c_user']['id'];
$carts = Cart::find_all($con, array("where" => "cus_id = $user_id", "order" => "createdAt DESC"));
$customer = Customer::find_by_pk($con, $user_id);

for ($i = 0; $i < count($carts); $i++) {
    $carts[$i]->populated($con, "product");
    if ($carts[$i]->qty > $carts[$i]->product->quantity) {
        return header("Location: cart");
    }
}
function is_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
}

function is_phone($str)
{
    return (!preg_match("/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/", $str)) ? false : true;
}

function form_error($label_field)
{
    global $error;
    if (isset($error[$label_field])) {
        echo "<span style=\"color: red; font-size: 12px\">{$error[$label_field]}</span><br/>";
    }
}

$error = array();
$fullname = $addressDetail = $phone = $email = $notes = "";
$payment_methods = "Thanh toán khi nhận hàng";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    set_old_value($_POST);

    if (empty($_POST["fullname"])) {
        $error["fullname"] = "Họ tên là bắt buộc";
    } else {
        $fullname = $_POST["fullname"];
    }

    if (empty($_POST["addressDetail"])) {
        $error["addressDetail"] = "Địa chỉ là bắt buộc";
    } else {
        $addressDetail = $_POST["addressDetail"];
    }

    if (empty($_POST["email"])) {
        $error["email"] = "Email là bắt buộc";
    } else {
        if (!is_email($_POST["email"])) {
            $error["email"] =  "Email không đúng";
        } else {
            $email = $_POST["email"];
        }
    }

    if (empty($_POST["phone"])) {
        $error["phone"] = "Số điện thoại là bắt buộc";
    } else {
        if (!is_phone($_POST["phone"])) {
            $error["phone"] =  "Số điện thoại không đúng";
        } else {
            $phone = $_POST["phone"];
        }
    }

    $notes = $_POST["notes"];
}

// total cart;
$amount = 0;
$amountQuery = "SELECT cart_qty FROM cart where cus_id = $user_id";
$amountResult = mysqli_query($con, $amountQuery);
$amountArr = [];
while ($row = mysqli_fetch_array($amountResult)) {
    $amountArr[] = $row;
}

foreach ($amountArr as $item) {
    $amount += $item["cart_qty"];
}

if ($fullname && $addressDetail && $phone && $email) {
    for ($i = 0; $i < count($carts); $i++) {
        $cartId = $carts[$i]->id;
    }

    $query = "SELECT * from cart where cus_id = $user_id";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        $listCart[] = $row;
    }

    $totalAmount = 0;
    foreach ($listCart as $item) {
        $productId = $item["pro_id"];
        $cart_qty_item = $item["cart_qty"];

        $product = Product::find_by_pk($con, $productId);
        Product::update_by_pk($con, $productId, array(
            "product_sold" => $product->sold + $cart_qty_item,
            "product_quantity" => $product->quantity - $cart_qty_item
        ));

        $totalAmount += $product->priceDiscount() * $cart_qty_item;
    }
    // add order table
    $order = Order::create($con, array(
        "order_receiver" => "$fullname",
        "order_address" => "$addressDetail",
        "order_payment_methods" => "$payment_methods",
        "order_amount" => "$totalAmount",
        "order_phone" => "$phone",
        "order_note" => "$notes",
        "cus_id" => "$user_id",
    ));

    // add order detail
    foreach ($listCart as $item) {
        $productId = $item["pro_id"];
        $cart_qty_item = $item["cart_qty"];

        $product = Product::find_by_pk($con, $productId);

        Detail::create($con, array(
            "quantity" => $cart_qty_item,
            "price" => $product->price,
            "pro_id" => $productId,
            "order_id" => $order->id
        ));
    }

    mysqli_query($con, "DELETE FROM cart  where cus_id=$user_id");

    echo "<script type='text/javascript'>alert('Đặt hàng thành công.')</script>";
    echo "<script type='text/javascript'>window.open('order-detail?id=$order->id', '_self')</script>";
} else {
    echo "<span style='color: red'></span>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonShop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/checkout.css">
</head>

<body>
    <div class="checkout container">
        <h1>Thanh toán</h1>
        <form action="" method="POST" mutip>
            <div class="row">
                <div class="col-7 col-sm-12">
                    <p class="checkout-title">Chi tiết hóa đơn</p>
                    <div class="checkout-content">
                        <div class="field-item">
                            <label for="">Họ tên <span class="star-red">*</span></label>
                            <input type="text" require placeholder="Họ tên" name="fullname" value="<?= $customer->name ?>">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('fullname'); ?></p>
                        <div class="field-item">
                            <label for="">Địa chỉ<span class="star-red">*</span></label>
                            <input type="text" placeholder="Địa chỉ" name="addressDetail" value="<?= $customer->address ?>">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('addressDetail'); ?></p>
                        <div class="field-item">
                            <label for="">Điện thoại<span class="star-red">*</span></label>
                            <input type="number" require placeholder="Số điện thoại" name="phone" value="<?= $customer->phone ?>">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('phone'); ?></p>
                        <div class="field-item">
                            <label for="">Email<span class="star-red">*</span></label>
                            <input type="email" require placeholder="Email" name="email" value="<?= $customer->email ?>">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('email'); ?></p>
                        <div class="field-item">
                            <label for="">Ghi chú</label>
                            <textarea rows="4" placeholder="Ghi chú..." name="notes"><?= old('notes') ?></textarea>
                        </div>
                        <div class="cash">
                            <div class="group-checkbox">
                                <input type="checkbox" id="cash" name="cashOnDelivert" checked>
                                <label for="cash">
                                    Thanh toán khi nhận hàng
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-btn">
                        <button class="back-to-cart checkout-btn-item" type="button"><a href="cart">Giỏ hàng</a></button>
                        <button class="place-order checkout-btn-item" type="submit" name="checkoutForm">Thanh toán</button>
                    </div>
                </div>
                <div class="col-5 col-sm-12">
                    <p class="checkout-title">Đơn mua</p>
                    <div class="order-total">
                        <div class="order-list">
                            <?php
                            $total = 0;
                            foreach ($carts as $index => $item) {
                                $product = $item->product;
                                $title = $product->title;
                                $quantity = $item->qty;
                                $price = $product->priceDiscount();
                                $total += $price * $quantity;
                            ?>
                                <div class="order-item">
                                    <p class="order-item__name"><?= $title ?></p>
                                    <p class="count">x <?= $quantity ?></p>
                                    <p class="order-price"><?= currency_format($price) ?></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="line">
                            <p class="order-total__title">Tổng tiền</p>
                            <p class="price"><?= currency_format($total) ?></p>
                        </div>
                        <div class="line">
                            <p class="order-total__title">Phí vận chuyển</p>
                            <div class="group-checkbox">
                                <input type="checkbox" id="shipping" checked>
                                <label for="shipping">
                                    Miễn phí vận chuyển
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                        <div class="total-detail line">
                            <p class="order-total__title">Thanh toán</p>
                            <p class="total-money"><?= currency_format($total) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>