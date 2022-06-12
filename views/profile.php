<?php
    namespace Models;

    include_once "models/index.php";
    include_once "./db/connectdb.php";
    include_once "helpers/common.php";
    include_once "header.php";

    $user_id = $_SESSION['c_user']['id'];
    $customer = Customer::find_by_pk($con, $user_id);

    function is_phone($str) {
        return (!preg_match("/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/", $str)) ? false : true;
    }

    function form_error($label_field) {
        global $error;
        if (isset($error[$label_field])) {
            echo "<div class=\"form-text text-danger\">{$error[$label_field]}</div><br/>";
        }
    }

    $error = array();
    $fullname = $phone = $city = $country = $address = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fullname"])) {
            $error["fullname"] = "Họ tên là bắt buộc";
        } else {
            $fullname = $_POST["fullname"];
        }

        if (empty($_POST["phone"])) {
            $error["phone"] = "Số điện thoại là bắt buộc";
        } else {
            if(!is_phone($_POST["phone"])){
                $error["phone"] =  "Số điện thoại không đúng";
            } else {
                $phone = $_POST["phone"];
            }
        }
        $city = $_POST["city"];
        $country = $_POST["country"];
        $address = $_POST["address"];
    }

    if($fullname && $phone && $city && $country && $address) {
        $data = Customer::update_by_pk($con, $user_id, array(
            "customer_name" => $fullname,
            "customer_country" => $country,
            "customer_city" => $city,
            "customer_phone" => $phone,
            "customer_address" => $address
        ));
        echo "<script type='text/javascript'>alert('Cập nhật thông tin thành công.')</script>";
        echo "<script type='text/javascript'>window.open('profile', '_self')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
          integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/orders.css">
</head>
<body>
    <div class="bg-main my-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <?php include_once("sidebar.php"); ?>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="padding: 20px 0 0 20px; font-weight: 600">Profile</h4>
                            <form style="padding: 0 20px" method="POST" action=""> 
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Họ tên</label>
                                        <input type="text" class="form-control" name="fullname" value="<?= $customer->name?>">
                                        <div class="form-text text-danger"><?php form_error('fullname'); ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="profile-item">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $customer->email?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="profile-item">
                                            <label for="" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" value="<?= $customer->phone?>">
                                            <div class="form-text text-danger"><?php form_error('phone'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="profile-item">
                                            <label for="" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address" value="<?= $customer->address?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="profile-item">
                                            <label for="" class="form-label">Thành phố</label>
                                            <input type="text" class="form-control" name="city" value="<?= $customer->city?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="profile-item">
                                            <label for="" class="form-label">Quốc gia</label>
                                            <input type="text" class="form-control" name="country" value="<?= $customer->country?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("footer.php"); ?>
</body>
</html>