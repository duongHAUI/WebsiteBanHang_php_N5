<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "helpers/common.php";

$recordPerPage = 5;
$currentPage = $_GET['page'] ?? 1;

$start = ($currentPage - 1) * $recordPerPage;

$orderListAndCount = Order::find_all_and_count($con, [
    'offset' => $start,
    'limit' => $recordPerPage
]);

[
    'rows' => $orderList,
    'count' => $orderCount
] = $orderListAndCount;

foreach ($orderList as $item) {
    $item->populated($con, 'customer');
}

$totalPage = ceil($orderCount / $recordPerPage);
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
                    Đơn hàng
                </h3>

                <?php if (count($orderList) == 0): ?>
                    <p class="no-orders">Bạn chưa có đơn hàng nào.</p>
                <?php else: ?>
                    <div class="table-head mt-4">
                        <h5>#</h5>
                        <h5>Trạng thái</h5>
                        <h5>Tổng tiền</h5>
                        <h5>Ngày mua</h5>
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
                            <div><?= date('d/m/Y', strtotime($item->createdAt)) ?></div>
                            <div class="text-end">
                                <a href="order-detail?id=<?= $item->id ?>">
                                    Chi tiết
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if ($totalPage > 1): ?>
                        <div class="pagination-container mt-5">
                            <ul class="pagination">
                                <li class="previous <?= $currentPage == 1 ? 'disabled' : '' ?>">
                                    <a href="?page=<?= $currentPage - 1 ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-chevron-left injected-svg"
                                             data-src="/assets/images/icons/chevron-left.svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                                    <li class="<?= $currentPage == $i ? 'active disabled' : '' ?>">
                                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="next <?= $currentPage == $totalPage ? 'disabled' : '' ?>">
                                    <a href="?page=<?= $currentPage + 1 ?>">
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>
</body>
</html>
