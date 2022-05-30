<?php

namespace Models;

include "models/index.php";
include "db/connectdb.php";
include_once("header.php");
// $user = Customer::create($con, array(
//   "customer_name" => "Đông",
//   "customer_email" => "nguyenbadong01@gmail.com",
//   "customer_password" => "123456",
//   "customer_country" => "Việt Nam",
//   "customer_city" => "Hà Nam",
//   "customer_phone" => "0123456789",
//   "customer_address" => "Nguyên Xá Bắc Từ Liêm Hà Nội",
//   "customer_image" => "tuat.jpg"
// ));

// $category = Category::create($con, array(
//   "cat_title" => "Không dây - True Wireless",
//   "cat_desc" => null
// ));

// $brand = Brand::create($con, array(
//   "brand_title" => "Apple",
//   "brand_desc" => null,
// ));

// $product = Product::create($con, array(
//   "product_title" => "Tai nghe Bluetooth AirPods 2 Wireless",
//   "product_price" => 5590000,
//   "product_discount" => 37,
//   "product_desc" => "Thiết kế màu trắng tinh tế, hiện đại cùng kích thước nhỏ gọn dễ mang theo mọi nơi. Tích hợp công nghệ chip H1 mới mẻ, cho tốc độ cho tốc độ kết nối giữa các thiết bị nhanh chóng, ổn định và khả năng đáp ứng độ trễ âm thanh tốt.",
//   "cat_id" => 11,
//   "brand_id" => 9,
// ));

// $cart = Cart::create($con, array(
//   "cart_qty" => 1,
//   "cart_size" => "M",
//   "cus_id" => 13,
//   "pro_id" => 9,
// ));
// $image = Image::create($con, array(
//   "pro_id" => 9,
//   "image_link" => "images/JBL_TUNE220TWS_ProductImage_Pink_Back.png"
// ));

// return;


//session_start();
$user_id = 13;
$carts = Cart::find_all($con, array("where" => "cus_id = $user_id", "order" => "createdAt DESC"));

for ($i = 0; $i < count($carts); $i++) {
  $carts[$i]->populated($con, "product");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/cart.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
  <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

  <div class="container">
    <div class="header">
      <a href="products">
        <i class='bx bx-chevron-left'></i> SHOP
      </a>
      <a href="/WebsiteBanHang_php_N5/"><i class='bx bx-x bx-rotate-90'></i></a>
    </div>
    <h1>SHOPPING CART</h1>
    <div class="list">
      <?php
      if (count($carts) == 0) {
        echo '<p class="no-product">No products in your cart.</p>';
      }else{
            $total = 0;
            foreach ($carts as $index => $cart) {
                $last_item = $index == count($carts) - 1 ? "last-item" : "";
                $product = $cart->product;

                $thumb = $product->get_images($con)[0]->link;
                $name = $product->title;
                $quantity = $cart->qty;
                $total += $product->price * $quantity * (100 - $product->discount) / 100;
                $price = number_format($product->price * (100 - $product->discount) / 100, 2);
              ?>
                <div class="item <?= $last_item ?>">
                  <div class="item_img">
                    <img src="<?= $thumb ?>" alt="">
                  </div>
                  <p class="item_name"><?= $name ?></p>
                  <div class="item_qty">
                    <a href="update-cart?cart_id=<?= $cart->id ?>&cart_qty=<?= $quantity - 1 ?>"><i class='bx bx-minus'></i></a>
                    <input type="text" oninput="handleInput(event)" onchange="handleChange(event, <?= $cart->id ?>)" value="<?= $quantity ?>" />
                    <a href="update-cart?cart_id=<?= $cart->id ?>&cart_qty=<?= $quantity + 1 ?>"><i class='bx bx-plus'></i></a>
                  </div>
                  <div class="item_price">$<?= $price ?></div>
                  <a href="update-cart?cart_id=<?= $cart->id ?>&cart_qty=0"><i class='bx bx-x bx-rotate-90'></i></a>
                </div>
              <?php
            }
            ?>
            <div class="checkout">
              <a href="checkout" class="btn-checkout">$<?= number_format($total, 2) ?> <span></span>Checkout</a>
            </div>
          </div>
        </div>
          <script>
            function handleInput(event) {
              let value = event.target.value;
              console.log(event.target.value);
              event.target.value = value.replace(/[^0-9]/g, '');
            }

            function handleChange(event, cart_id) {
              let quantity = event.target.value;
              window.open(`update-cart?cart_id=${cart_id}&cart_qty=${quantity}`, "_self")
            }
          </script>
    <?php
      }
    include_once("footer.php");
    ?>
</body>
</html>

