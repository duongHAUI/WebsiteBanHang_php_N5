<?php

include_once "constants.php";

$orderStatus = [
    WAIT_CONFIRM_STATUS => [
        'label' => 'Chờ xác nhận',
        'variant' => 'secondary'
    ],
    WAIT_DELIVERY_STATUS => [
        'label' => 'Chờ giao hàng',
        'variant' => 'warning'
    ],
    DELIVERING_STATUS => [
        'label' => 'Đang giao',
        'variant' => 'primary'
    ],
    COMPLETED_STATUS => [
        'label' => 'Đã hoàn thành',
        'variant' => 'success'
    ],
    CANCELLED_STATUS => [
        'label' => 'Đã hủy',
        'variant' => 'danger'
    ],
];

$cancelReason = [
    0 => 'Thay đổi thông tin giao hàng',
    1 => 'Người bán không trả lời thắc mắc / yêu cầu của tôi',
    2 => 'Đổi ý không muốn mua nữa'
];