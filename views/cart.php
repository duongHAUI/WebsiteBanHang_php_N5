<?php

namespace Models;

include_once "./middleware/notAuth.php";
include "models/index.php";
include "db/connectdb.php";
include_once("header.php");


$user_id = $_SESSION['c_user']['id'];
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
<<<<<<< HEAD
        <i class='bx bx-chevron-left'></i> CỬA HÀNG
=======
        <i class='bx bx-chevron-left'></i> SẢN PHẨM
>>>>>>> 48df48a92e219ed317284d382a36852763a4bffd
      </a>
      <a href="/WebsiteBanHang_php_N5/"><i class='bx bx-x bx-rotate-90'></i></a>
    </div>
    <h1>GIỎ HÀNG</h1>
    <div class="list">
      <?php
      if (count($carts) == 0) {
        echo '<p class="no-product">Không có sản phẩm nào trong giỏ hàng.</p>';
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
                    <img src="images/<?= $thumb ?>" alt="">
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
              <a href="checkout" class="btn-checkout">$<?= number_format($total, 2) ?> <span></span>Thanh toán</a>
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

