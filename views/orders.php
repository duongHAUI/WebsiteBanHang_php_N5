<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "helpers/common.php";

$orderList = Order::find_all($con);
foreach ($orderList as $item) {
    $item->populated($con, 'customer');
}
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
          integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/orders.css">
</head>

<body>
<?php include_once "header.php"; ?>

<div class="bg-main my-5">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php include_once "sidebar.php" ?>
            </div>
            <div class="col-9">
                <h3>
                    <i class="bx bxs-cart-alt text-danger"></i>
                    My orders
                </h3>

                <?php
                    if (count($orderList) == 0):
                        echo '<p class="no-orders">No orders found.</p>';
                    else:
                ?>
                <div class="table-head mt-4">
                    <h5>#</h5>
                    <h5>Status</h5>
                    <h5>Amount</h5>
                    <h5>Note</h5>
                    <h5>Date purchased</h5>
                    <h5></h5>
                </div>

                <?php foreach ($orderList as $item): ?>
                    <div class="table-row">
                        <h5>#<?= $item->id ?></h5>
                        <div>
                            <span class="badge bg-secondary rounded-pill fw-normal">
                                <?= ucfirst($item->status) ?>
                            </span>
                        </div>
                        <div>$<?= $item->amount ?></div>
                        <div><?= $item->note ?></div>
                        <div><?= date('d/m/Y', strtotime($item->createdAt)) ?></div>
                        <div>
                            <a href="order-detail?id=<?= $item->id ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                     fill="none" class="injected-svg" data-src="/assets/images/icons/arrow-right.svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.58333 11C3.58333 10.4477 4.03104 10 4.58333 10H17.4167C17.9689 10 18.4167 10.4477 18.4167 11C18.4167 11.5523 17.9689 12 17.4167 12H4.58333C4.03104 12 3.58333 11.5523 3.58333 11Z"
                                          fill="#0F3260"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M10.2929 3.87615C10.6834 3.48562 11.3166 3.48562 11.7071 3.87615L18.1238 10.2928C18.3113 10.4803 18.4167 10.7347 18.4167 10.9999C18.4167 11.2651 18.3113 11.5195 18.1238 11.707L11.7071 18.1237C11.3166 18.5142 10.6834 18.5142 10.2929 18.1237C9.90237 17.7332 9.90237 17.1 10.2929 16.7095L16.0025 10.9999L10.2929 5.29036C9.90237 4.89983 9.90237 4.26667 10.2929 3.87615Z"
                                          fill="#0F3260"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="pagination-container mt-5">
                    <ul class="pagination">
                        <li class="previous disabled">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-left injected-svg"
                                     data-src="/assets/images/icons/chevron-left.svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </a>
                        </li>
                        <li class="active">
                            <a href="">1</a>
                        </li>
                        <li>
                            <a href="">2</a>
                        </li>
                        <li class="next">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-right injected-svg"
                                     data-src="/assets/images/icons/chevron-right.svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
</body>
</html>
