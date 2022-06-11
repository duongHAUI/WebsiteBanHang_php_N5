<?php

namespace App\Controllers\auth;

include "../../db/connectdb.php";
include "../../models/index.php";
include "../../helpers/common.php";

use Models\Customer;

if (isset($_POST['register'])) {
    set_old_value($_POST);

    [$email, $name, $password, $retypePassword] = array_values($_POST);

    if (empty($email) || empty($name) || empty($password)) {
        set_flash_message('error', 'Missing input data', ERROR);
        header("Location: ../../register");
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_flash_message('error', 'The email is invalid.', ERROR);
        header("Location: ../../register");
        return;
    }

    if (trim($password) !== trim($retypePassword)) {
        set_flash_message('error', 'Password is not match', ERROR);
        header("Location: ../../register");
        return;
    }

    $account = Customer::find_one($con, ["where" => "customer_email = '$email'"]);

    if (!empty($account)) {
        set_flash_message('error', 'Email already exists', ERROR);
        header("Location: ../../register");
        return;
    }

    $customer = Customer::redister($con, [$email, $name, md5($password)]);
    if (!$customer) {
        set_flash_message('error', 'Internal server error', ERROR);
        header("Location: ../../register");
        return;
    }

    set_flash_message('success', 'Register successfully', SUCCESS);
    remove_old_value();
    header("Location: ../../login");
} else {
    http_response_code(404);
}