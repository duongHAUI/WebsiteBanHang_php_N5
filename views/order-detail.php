<?php
namespace Models;

include_once "models/index.php";
include_once "./db/connectdb.php";
include_once "helpers/common.php";
include_once "./controllers/formatCurrency.php";
include_once "helpers/config.php";

$id = $_GET['id'] ?? 0;
$order = Order::find_by_pk($con, $id);

if (empty($order)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}

$order->populated($con, 'customer');
$order->detail = $order->get_details($con);
foreach ($order->detail as $item) {
    $item->populated($con, 'product');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonShop</title>
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
<div class="bg-main my-5">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?php include_once "sidebar.php" ?>
            </div>
            <div class="col-9">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h3>
                            <i class="bx bxs-cart-alt text-danger"></i>
                            Chi tiết đơn hàng
                        </h3>
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="./controllers/product/order-again.php" method="post">
                            <input type="hidden" name="order_id" value="<?= $_GET['id'] ?? 0 ?>" />
                            <button type="submit" class="btn-custom" name="order-again-submit">Đặt hàng lại</button>
                        </form>
                    </div>
                </div>

                <?php include "order-detail-tabbar.php"; ?>

                <?php if ($order->status == 0): ?>
                    <div class="text-end">
                        <button class="btn-custom" data-bs-toggle="modal" data-bs-target="#cancel-order-modal">Hủy đơn hàng</button>
                    </div>

                    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="cancel-order-modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="./controllers/product/cancel-order.php" method="post" data-validate="true">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hủy đơn hàng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="cancel_reason" class="form-label">Vui lòng chọn lý do hủy</label>

                                            <?php foreach ($cancelReason as $key => $item): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="cancel_reason" id="cancel_reason_<?= $key ?>" value="<?= $item ?>" data-rule-required="true" data-msg-required="Vui lòng chọn 1 lý do">
                                                    <label class="form-check-label" for="cancel_reason_<?= $key ?>">
                                                        <?= $item ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="cancel_reason_other" name="cancel_reason" value="other" data-rule-required="true" data-msg-required="Vui lòng chọn 1 lý do">
                                                <label class="form-check-label" for="cancel_reason_other">
                                                    Khác
                                                </label>
                                            </div>

                                            <div class="form-group mt-2" id="cancel_reason_input" style="display: none;">
                                                <input type="text" name="cancel_reason_text" placeholder="Vui lòng cho biết lý do" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập lý do hủy" />
                                            </div>

                                            <input type="hidden" value="<?= $_GET['id'] ?? 0 ?>" name="order_id" />

                                            <label for="cancel_reason" class="error"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                                        <button type="submit" class="btn btn-danger" name="submit-cancel-order">Đồng ý</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $subtotal = 0; ?>
                <div class="order-detail-content card mt-3">
                    <div class="order-detail-header">
                        <div>
                            <div class="order-detail-header-title">Mã đơn hàng:</div>
                            <div>#<?= $order->id ?></div>
                        </div>
                        <div>
                            <div class="order-detail-header-title">Thời gian đặt:</div>
                            <div><?= $order->createdAt ?></div>
                        </div>
                    </div>
                    <div class="order-detail-body">
                        <?php foreach ($order->detail as $item): ?>
                            <div class="order-detail-item row align-items-center">
                                <div class="col-9">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="order-detail-item-discount">-<?= $item->product->getDiscount() ?>%</div>
                                        <img src="images/<?= $item->product->get_images($con)[0]->link ?>" alt="avatar" class="order-detail-item-avatar" />
                                        <div>
                                            <h6><?= $item->product->title ?></h6>
                                            <div class="order-detail-item-price"><?= currency_format($item->product->price) ?> x <?= $item->quantity ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 order-detail-item-total" style="text-align: right">
                                    Tổng tiền:
                                    <?php
                                        $price = $item->product->price * $item->quantity;
                                        $subtotal += $price;
                                        echo currency_format($price)
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card order-detail-address">
                            <div class="card-body">
                                <h5>Địa chỉ giao hàng</h5>
                                <p><strong>Người nhận:</strong> <?= $order->receiver ?></p>
                                <p><strong>Số điện thoại:</strong> <?= $order->phone ?></p>
                                <p><strong>Địa chỉ:</strong> <?= $order->address ?></p>
                                <p><strong>Ghi chú:</strong> <?= $order->note ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card order-detail-amount">
                            <div class="card-body">
                                <h5>Tổng thanh toán</h5>
                                <div>
                                    <div class="order-detail-amount-title">Tạm tính:</div>
                                    <h6> <span style = "text-decoration: line-through; font-size: 12px"> <?= currency_format($subtotal) ?> </span>  <?= currency_format($order->amount) ?> </h6>
                                </div>
                                <div>
                                    <div class="order-detail-amount-title">Phí vận chuyển:</div>
                                    <h6>0₫</h6>
                                </div>
                                <div class="divider"></div>
                                <div>
                                    <h6>Thành tiền:</h6>
                                    <h6><?= currency_format($order->amount) ?></h6>
                                </div>
                                <div style="font-size: 14px;" class="mt-3"><?= $order->payment_methods ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="./js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        'use strict';

        $("form[data-validate='true']").validate();

        $("#cancel-order-modal input[name='cancel_reason']").change(function () {
            const _this = $(this);

            const value = _this.val();
            if (value === 'other') {
                _this.parents('form').find('#cancel_reason_input').show();
            } else {
                _this.parents('form').find('#cancel_reason_input').hide();
            }
        });
    });
</script>
</body>
</html>
