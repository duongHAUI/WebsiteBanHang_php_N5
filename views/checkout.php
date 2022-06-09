<?php
    namespace Models;

    include_once "./middleware/notAuth.php";
    include_once("models/index.php");
    include_once("./db/connectdb.php");
    include("header.php");

    $customer_id=$_SESSION['c_user']['id'];
    $carts = Cart::find_all($con, array("where" => "cus_id = $customer_id", "order" => "createdAt DESC"));

    foreach ($carts as $item) {
        $item->populated($con, "product");
    }

    function is_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
    }

    function is_phone($str) {
        return (!preg_match("/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/", $str)) ? false : true;
    }

    function form_error($label_field) {
        global $error;
        if (isset($error[$label_field])) {
            echo "<span style=\"color: red; font-size: 12px\">{$error[$label_field]}</span><br/>";
        }
    }

    $error = array();
    $fullname = $addressDetail = $phone = $email = $notes = "";
    $status = "cash on delivery";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fullname"])) {
            $error["fullname"] = "Fullname is required";
        } else {
            $fullname = $_POST["fullname"];
        }

        if (empty($_POST["addressDetail"])) {
            $error["addressDetail"] = "Address is required";
        } else {
            $addressDetail = $_POST["addressDetail"];
        }
        
        if (empty($_POST["email"])) {
            $error["email"] = "Email is required";
        } else {
            if(!is_email($_POST["email"])){
                $error["email"] =  "Invalid email.";
            } else {
                $email = $_POST["email"];
            }
        }

        if (empty($_POST["phone"])) {
            $error["phone"] = "Phone is required";
        } else {
            if(!is_phone($_POST["phone"])){
                $error["phone"] =  "Invalid phone number.";
            } else {
                $phone = $_POST["phone"];
            }
        }
        
        $notes = $_POST["notes"];

        // total cart;
        $amount = 0;
        $amountQuery = "SELECT cart_qty FROM cart where cus_id = $customer_id";
        $amountResult = mysqli_query($con, $amountQuery);
        $amountArr = [];
        while($row = mysqli_fetch_array($amountResult)) {
            $amountArr[]=$row;
        }

        foreach($amountArr as $item) {
            $amount += $item["cart_qty"];
        }

        if($fullname && $addressDetail && $phone && $email){
            $query = "SELECT * from cart where cus_id = $customer_id";
            $result = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($result)) {
                $listCart[]=$row;
            }

            $totalAmount = 0;
            foreach ($listCart as $item) {
                $productId = $item["pro_id"];
                $cart_qty_item = $item["cart_qty"];

                $product = Product::find_by_pk($con, $productId);
                Product::update_by_pk($con, $productId, array(
                    "product_sold"=>$product->sold + $cart_qty_item,
                    "product_quantity"=>$product->quantity - $cart_qty_item
                ));

                $totalAmount += $product->price * $cart_qty_item * (100 - $product->discount) / 100;
            }

            // add order table
            $order = Order::create($con, array(
                "order_receiver" => "$fullname",
                "order_address" => "$addressDetail",
                "order_status" => "$status",
                "order_amount" => "$totalAmount",
                "order_phone" => "$phone",
                "order_note" => "$notes",
                "cus_id" => "$customer_id",
            ));

            // add order detail
            foreach ($listCart as $item) {
                $productId = $item["pro_id"];
                $cart_qty_item = $item["cart_qty"];

                $product = Product::find_by_pk($con, $productId);

                Detail::create($con, array(
                    "quantity" => $cart_qty_item,
                    "price" => $product->priceDiscount(),
                    "pro_id" => $productId,
                    "order_id" => $order->id
                ));
            }

            mysqli_query($con, "DELETE FROM cart  where cus_id=$customer_id");

            header("Location: order-detail");

            // delete cart
        } else {
            echo "<span style='color: red;'>Error!</span>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
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
        <h1>Checkout</h1>
        <form action="" method="POST" mutip>
            <div class="row">
                <div class="col-7 col-sm-12">
                    <p class="checkout-title">billing details</p>
                    <div class="checkout-content">
                        <div class="field-item">
                            <label for="">Name <span class="star-red">*</span></label>
                            <input type="text" require placeholder="Fullname" name="fullname">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('fullname'); ?></p>
                        <div class="field-item">
                            <label for="">Address Detail<span class="star-red">*</span></label>
                            <input type="text" placeholder="Address" name="addressDetail">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('addressDetail'); ?></p>
                        <div class="field-item">
                            <label for="">Phone<span class="star-red">*</span></label>
                            <input type="number" require placeholder="Phone" name="phone">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('phone'); ?></p>
                        <div class="field-item">
                            <label for="">Email<span class="star-red">*</span></label>
                            <input type="email" require placeholder="Email" name="email">
                        </div>
                        <p style="margin-left: 220px"><?php form_error('email'); ?></p>
                        <div class="field-item">
                            <label for="">Order notes (optional)</label>
                            <textarea rows="4" placeholder="Note..." name="notes"></textarea>
                        </div>
                        <div class="cash">
                            <div class="group-checkbox">
                                <input type="checkbox" id="cash" name="cashOnDelivert" checked>
                                <label for="cash">
                                    Cash on delivery
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-btn">
                        <button class="back-to-cart checkout-btn-item" type="button" onclick="location.href = 'cart'">Back to Cart</button>
                        <button class="place-order checkout-btn-item" type="submit" name="checkoutForm">Place order</button>
                    </div>
                </div>
                <div class="col-5 col-sm-12">
                    <p class="checkout-title">your order</p>
                    <div class="order-total">
                        <div class="order-list">
                            <?php
                                $total = 0;
                                foreach($carts as $index => $item) {
                                    $product = $item->product;
                                    $title = $product->title;
                                    $quantity = $item->qty;
                                    $total += $product->price * $quantity * (100 - $product->discount) / 100;
                                    $price = number_format($product->price * (100 - $product->discount) / 100, 2);
                            ?>
                                <div class="order-item">
                                    <p class="order-item__name"><?= $title?></p>
                                    <p class="count">x <?= $quantity?></p>
                                    <p class="order-price">$<?= $price?></p>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="line">
                            <p class="order-total__title">subtotal</p>
                            <p class="price">$<?= number_format($total, 2)?></p>
                        </div>
                        <div class="line">
                            <p class="order-total__title">shipping</p>
                            <div class="group-checkbox">
                                <input type="checkbox" id="shipping" checked>
                                <label for="shipping">
                                    Free Shipping
                                    <i class='bx bx-check'></i>
                                </label>
                            </div>
                        </div>
                        <div class="total-detail line">
                            <p class="order-total__title">total</p>
                            <p class="total-money">$<?= number_format($total, 2)?></p>
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