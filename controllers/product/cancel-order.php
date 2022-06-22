<?php

namespace Models;

include_once "../../models/index.php";
include_once "../../db/connectdb.php";
include_once "../../helpers/common.php";

if (isset($_POST['submit-cancel-order'])) {
    [
        'order_id' => $orderId,
        'cancel_reason' => $cancelReason,
        'cancel_reason _text' => $cancelReasonText
    ] = $_POST;

    if (empty($cancelReason) || ($cancelReason === 'other' && empty($cancelReasonText))) {
        set_flash_message('error', 'Thiếu dữ liệu truyền vào.', ERROR);
        header("Location: ../../order-detail?id=$orderId");
        return;
    }

    if ($cancelReason === 'other') {
        $cancelReason = $cancelReasonText;
    }

    Order::update_cancel_reason($con, $orderId, $cancelReason);

    echo "<script type='text/javascript'>alert('Đơn hàng đã bị hủy')</script>";
    echo "<script type='text/javascript'>window.open('../../order-detail?id=$orderId', '_self')</script>";
} else {
    http_response_code(404);
}