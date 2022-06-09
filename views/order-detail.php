<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "helpers/common.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/orders.css">
</head>

<body>

<?php include_once "header.php"; ?>
<div class="bg-main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php include_once "sidebar.php" ?>
            </div>
            <div class="col-9">
                <h3>
                    <i class="bx bxs-cart-alt text-danger"></i>
                    Order detail
                </h3>

                <div class="order-detail-content mt-3">
                    <div class="order-detail-header">
                        <div>
                            <div class="order-detail-header-title">Order ID:</div>
                            <div>9001997718074513</div>
                        </div>
                        <div>
                            <div class="order-detail-header-title">Placed on:</div>
                            <div>10 Jun, 2022</div>
                        </div>
                    </div>
                    <div class="order-detail-body">
                        <div class="order-detail-item d-flex gap-5 align-items-center my-3">
                            <div class="order-detail-item-avatar">
                                <img src="https://bonik-react.vercel.app/assets/images/products/Groceries/2.PremiumGroceryCollection.png" alt="avatar" />
                            </div>
                            <div>
                                <h6>Premium Grocery Collection</h6>
                                <div class="order-detail-item-price">$250 x 1</div>
                            </div>
                            <div>
                                <div>Product properties: Black, L</div>
                            </div>
                        </div>

                        <div class="order-detail-item d-flex gap-5 align-items-center my-3">
                            <div class="order-detail-item-avatar">
                                <img src="https://bonik-react.vercel.app/assets/images/products/Groceries/2.PremiumGroceryCollection.png" alt="avatar" />
                            </div>
                            <div>
                                <h6>Premium Grocery Collection</h6>
                                <div class="order-detail-item-price">$250 x 1</div>
                            </div>
                            <div>
                                <div>Product properties: Black, L</div>
                            </div>
                        </div>

                        <div class="order-detail-item d-flex gap-5 align-items-center my-3">
                            <div class="order-detail-item-avatar">
                                <img src="https://bonik-react.vercel.app/assets/images/products/Groceries/2.PremiumGroceryCollection.png" alt="avatar" />
                            </div>
                            <div>
                                <h6>Premium Grocery Collection</h6>
                                <div class="order-detail-item-price">$250 x 1</div>
                            </div>
                            <div>
                                <div>Product properties: Black, L</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card order-detail-address">
                            <div class="card-body">
                                <h5>Shipping Address</h5>
                                <p>Kelly Williams 777 Brockton Avenue, Abington MA 2351</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card order-detail-amount">
                            <div class="card-body">
                                <h5>Total Summary</h5>
                                <div>
                                    <div class="order-detail-amount-title">Subtotal:</div>
                                    <h6>$335</h6>
                                </div>
                                <div>
                                    <div class="order-detail-amount-title">Shipping fee:</div>
                                    <h6>$10</h6>
                                </div>
                                <div>
                                    <div class="order-detail-amount-title">Discount:</div>
                                    <h6>-$30</h6>
                                </div>
                                <div class="divider"></div>
                                <div>
                                    <h6>Total</h6>
                                    <h6>$315</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
