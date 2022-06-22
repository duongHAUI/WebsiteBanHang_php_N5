<?php

namespace Models;

include_once "./middleware/notAuth.php";
include "models/index.php";
include "db/connectdb.php";
include_once("header.php");
include_once "./controllers/formatCurrency.php";

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
        <i class='bx bx-chevron-left'></i> SẢN PHẨM
      </a>
      <a href="/WebsiteBanHang_php_N5/"><i class='bx bx-x bx-rotate-90'></i></a>
    </div>
    <h1>GIỎ HÀNG</h1>
    <div class="list">

      <?php
      if (count($carts) == 0) {
        echo '<p class="no-product">Không có sản phẩm nào trong giỏ hàng.</p>';
      } else {
        $total = 0;
      ?>
        <div class="item-header">
          <p style="width: calc(100px + 35%);">Sản phẩm</p>
          <p style="flex: 1; text-align: center;">Đơn giá</p>
          <p style="flex: 1; text-align: center;">Số lượng</p>
          <p style="flex: 1; text-align: center;">Tổng tiền</p>
          <p>Thao tác</p>
        </div>
        <?php
        $isDisabled = false;
        foreach ($carts as $index => $cart) {
          $last_item = $index == count($carts) - 1 ? "last-item" : "";
          $product = $cart->product;

          $thumb = $product->get_images($con)[0]->link;
          $name = $product->title;
          $quantity = $cart->qty;
          $notify = "";
          if ($product->quantity <= 0) {
            $notify = "Thông báo: Đã hết hàng";
            $isDisabled = true;
          } else if ($quantity > $product->quantity) {
            $notify = "Thông báo: Số sản phẩm còn lại không đủ (còn " . $product->quantity . " sản phẩm).";
            $isDisabled = true;
          }

          $price = $product->price;
          $price_discount = $product->get_price_discount();
          $item_total = $product->price * $quantity * (100 - $product->discount) / 100;
          $total += $item_total;
        ?>
          <div class="item <?= $last_item ?>">
            <div class="item_img">
              <a href="product-detail?pro_id=<?= $product->id ?>"><img src="images/<?= $thumb ?>" alt=""></a>
            </div>
            <p class="item_name"><?= $name ?></p>
            <div class="item-price">
              <span class="price-not-discount"><?= currency_format($price) ?></span>
              <span class="price-discount"><?= currency_format($price_discount) ?></span>
            </div>
            <div class="item_qty">
              <button>
                <a href="update-cart?cart_id=<?= $cart->id ?>&cart_qty=<?= $quantity - 1 ?>"><i class='bx bx-minus'></i></a>
              </button>
              <input type="text" oninput="handleInput(event)" onchange="handleChange(event, <?= $cart->id ?>, <?= $product->quantity ?>, <?= $quantity ?>)" value="<?= $quantity ?>" />
              <button onclick="handleIncreQty('<?= $cart->id ?>', '<?= $quantity + 1 ?>', '<?= $product->quantity ?>')">
                <i class='bx bx-plus'></i>
              </button>
            </div>
            <div class="item-total"><?= currency_format($item_total) ?></div>
            <a href="update-cart?cart_id=<?= $cart->id ?>&cart_qty=0"><i class='bx bx-x bx-rotate-90'></i> Xóa</a>
            <p class="item-notify"><?= $notify ?></p>
          </div>
        <?php
        }
        ?>
        <div class="checkout">
          <button class="btn-checkout" <?= $isDisabled ? "disabled" : "" ?> onclick="window.open('checkout', '_self')">
            <?= currency_format($total) ?> <span></span>Thanh toán
          </button>
        </div>
    </div>
  </div>

  <script type="text/javascript">
    function handleIncreQty(cart_id, cart_qty, product_qty) {
      if (cart_qty > product_qty) {
        alert(`Sản phẩm còn lại không đủ(còn ${product_qty}).`);
      } else {
        window.open("update-cart?cart_id=<?= $cart->id ?>&cart_qty=<?= $quantity + 1 ?>", "_self");
      }
    }

    function handleInput(event) {
      let value = event.target.value;
      console.log(event.target.value);
      event.target.value = value.replace(/[^0-9]/g, '');
    }

    function handleChange(event, cart_id, product_qty, cart_qty) {
      let quantity = event.target.value;
      if (quantity > product_qty) {
        alert("Nhập số lượng vừa với số sản phẩm còn lại.");
        event.target.value = cart_qty;
      } else {
        window.open(`update-cart?cart_id=${cart_id}&cart_qty=${quantity}`, "_self")
      }
    }
  </script>
<?php
      }
      include_once("footer.php");
?>
</body>

</html>