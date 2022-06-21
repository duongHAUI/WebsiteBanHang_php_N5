<?php

include "../db/connectdb.php";
include "../helpers/config.php";

sleep(1.5);

[
    'status' => $status,
    'order_id' => $order_id,
    'cancel_reason' => $cancel_reason,
] = $_POST;

mysqli_query($con, "UPDATE orders SET order_status = $status, order_cancel_reason = '$cancel_reason' WHERE order_id = $order_id");

echo json_encode([
    'status' => 200,
    'message' => 'Cập nhật trạng thái đơn hàng thành công',
    'data' => $orderStatus[$status]
]);