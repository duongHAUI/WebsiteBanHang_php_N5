<?php

namespace App\Controllers\auth;

include "../../db/connectdb.php";
include "../../models/index.php";
include "../../helpers/common.php";

use Models\Customer;

if (isset($_POST['login'])) {
    set_old_value($_POST);

    [$email, $password] = array_values($_POST);

    if (empty($email) || empty($password)) {
        set_flash_message('error', 'Thiếu dữ liệu truyền vào.', ERROR);
        header("Location: ../../login");
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_flash_message('error', 'Email không đúng định dạng.', ERROR);
        header("Location: ../../login");
        return;
    }

    $user = Customer::find_one($con, [
        "select" => "customer_id, customer_name, customer_email, customer_country, customer_city, customer_phone, customer_address, customer_image, createdAt, updatedAt",
        "where" => "customer_email = '$email' and customer_password = '" . md5($password) . "'"
    ]);

    if (empty($user)) {
        set_flash_message('error', 'Người dùng không tồn tại.', ERROR);
        header("Location: ../../login");
        return;
    }

    $_SESSION['isLoggedIn'] = true;
    $_SESSION['c_user'] = (array)$user;

    set_flash_message('succcess', 'Đăng nhập thành công', SUCCESS);
    remove_old_value();
    header("Location: ../../");
} else {
    http_response_code(404);
}

